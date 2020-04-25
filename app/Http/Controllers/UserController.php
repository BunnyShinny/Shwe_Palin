<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    protected $serverKey;
 
    public function __construct()
    {
        $this->serverKey = config('app.firebase_server_key');
    }

    public function index(User $model)
    {
        $users = User::role(['member'])->get();
        return view('users.index', compact('users'));
    }

    public function saveToken (Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->device_token = $request->fcm_token;
        $user->save();

        if($user)
            return response()->json([
                'message' => 'User token updated'
            ]);

        return response()->json([
            'message' => 'Error!'
        ]);
    }

    public function sendPush (Request $request)
    {
        $user = User::find(1);
        $data = [
            "to" => $user->device_token,
            "notification" =>
                [
                    "title" => 'Reserve',
                    "body" => "You Got a new Order From ".auth()->user()->name,
                    "icon" => url('/logo.png'),
                    "click_action"=> 'reservations',
                ],
        ];
        $dataString = json_encode($data);
  
        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json',
        ];
  
        $ch = curl_init();
  
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
  
        curl_exec($ch);

        return redirect('/checkout')->with('message', 'Notification sent!'); 
    }
}
