<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Branch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->serverKey = config('app.firebase_server_key');
    }
    
    public function index()
    {
        $new_reservations = DB::table('reservations')
        ->join('branches', 'branches.id', '=', 'reservations.branch_id')
        ->select('reservations.*', 'branches.name as branch_name')
        ->where('confirm','new')->get();
        $accepted_reservations = DB::table('reservations')
        ->join('branches', 'branches.id', '=', 'reservations.branch_id')
        ->select('reservations.*', 'branches.name as branch_name')
        ->where('confirm','accepted')->get();
        $declined_reservations = DB::table('reservations')
        ->join('branches', 'branches.id', '=', 'reservations.branch_id')
        ->select('reservations.*', 'branches.name as branch_name')
        ->where('confirm','declined')->get();
        return view('reservations.read',compact(['new_reservations','accepted_reservations','declined_reservations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>'required',
            "phone"=>'required',
            "date"=>'required',
            "no_of_people"=>'required',
            "branch"=>'required',
            
        ]);
        $save = new Reservation;
        $save->name = request('name');
        $save->phone = request('phone');
        $save->date = request('date');
        $save->branch_id = request('branch');
        $save->no_of_people = request('no_of_people');

        $save->save();
        return view('thankyou')->with('Success', 'Successfully purchased products!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $reservations=Reservation::all();
        return view('reservationlist',compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches=Branch::all();
        $reservations = DB::table('reservations')
        ->join('branches', 'branches.id', '=', 'reservations.branch_id')
        ->select('reservations.*', 'branches.name as branch_name')
        ->where('reservations.id', '=' , $id)
        ->first();
        return view('reservations.edit',compact('reservations','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>'required',
            "phone"=>'required',
            "date"=>'required',
            "no_of_people"=>'required',
            "branch"=>'required',
            
        ]);
        $reservation=Reservation::find($id);
        
        $reservation->name = request('name');
        $reservation->phone = request('phone');
        $reservation->date = request('date');
        $reservation->branch_id = request('branch');
        $reservation->no_of_people = request('no_of_people');

        $reservation->save();
        return redirect()->route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation=Reservation::find($id);
        $reservation->delete();
        return redirect()->route('reservations.index');
    }

    public function Confirm($id)
    {
        $reservation = Reservation::find($id);
        $reservation->confirm = 'accepted';
        $reservation->save();
        if($reservation->user_id){
            $user = User::find($reservation->user_id);
            $data = [
                "to" => $user->device_token,
                "notification" =>
                    [
                        "title" => 'Reserve',
                        "body" => "Your reservation had been confirmed!",
                        "icon" => url('/logo.png'),
                        "click_action"=> '/receipt?reservation='.$reservation->id,
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
        }
        return redirect()->route('reservations.index');
    }
    public function Declined($id)
    {
        $reservation = Reservation::find($id);
        $reservation->confirm = 'declined';
        $reservation->save();
        if($reservation->user_id){
            $user = User::find($reservation->user_id);
            $data = [
                "to" => $user->device_token,
                "notification" =>
                    [
                        "title" => 'Reserve',
                        "body" => "Your reservation had been declined!",
                        "icon" => url('/logo.png'),
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
        }
        return redirect()->route('reservations.index');
    }
}
