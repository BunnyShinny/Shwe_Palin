<?php

namespace App\Http\Controllers;

use App\Reservation_with_Order;
use App\Branch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationWithOrderController extends Controller
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
        
        $new_rwo = DB::table('reservation_with__orders')
        ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
        ->select('reservation_with__orders.*', 'branches.name as branch_name')
        ->where('confirm','new')->get();
        $new_rwo->transform(function($new_rwo, $key){
            $new_rwo->cart = unserialize($new_rwo->cart);
            return $new_rwo;
        });

        $accepted_rwo = DB::table('reservation_with__orders')
        ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
        ->select('reservation_with__orders.*', 'branches.name as branch_name')
        ->where('confirm','accepted')->get();
        $accepted_rwo->transform(function($accepted_rwo, $key){
            $accepted_rwo->cart = unserialize($accepted_rwo->cart);
            return $accepted_rwo;
        });

        $declined_rwo = DB::table('reservation_with__orders')
        ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
        ->select('reservation_with__orders.*', 'branches.name as branch_name')
        ->where('confirm','declined')->get();
        $declined_rwo->transform(function($declined_rwo, $key){
            $declined_rwo->cart = unserialize($declined_rwo->cart);
            return $declined_rwo;
        });
        return view('reservation_with_order.read',compact(['new_rwo','accepted_rwo','declined_rwo']));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation_with_Order  $reservation_with_Order
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation_with_Order $reservation_with_Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation_with_Order  $reservation_with_Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation_with_Order $reservation_with_Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation_with_Order  $reservation_with_Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation_with_Order $reservation_with_Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation_with_Order  $reservation_with_Order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rwo = Reservation_with_Order::find($id);
        $rwo->delete();
        return redirect()->route('reservationwithorders.index');
    }

    public function Confirm($id)
    {
        $rwo = Reservation_with_Order::find($id);
        $rwo->confirm = 'accepted';
        $rwo->save();
        if($rwo->user_id){
            $user = User::find($rwo->user_id);
            $data = [
                "to" => $user->device_token,
                "notification" =>
                    [
                        "title" => 'Reserve',
                        "body" => "Your reservation had been confirmed!",
                        "icon" => url('/logo.png'),
                        "click_action"=> '/receipt?rwo='.$rwo->id,
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
        return redirect()->route('reservationwithorders.index');
    }
    public function Declined($id)
    {
        $rwo = Reservation_with_Order::find($id);
        $rwo->confirm = 'declined';
        $rwo->save();
        if($rwo->user_id){
            $user = User::find($rwo->user_id);
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
        return redirect()->route('reservationwithorders.index');
    }
}
