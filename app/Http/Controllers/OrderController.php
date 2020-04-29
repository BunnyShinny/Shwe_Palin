<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        $orders = Order::All();
        $orders->transform(function($orders, $key){
            $orders->cart = unserialize($orders->cart);
            return $orders;
        });
        return view('orders.read',compact('orders'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::find($id);
        $orders->transform(function($orders, $key){
            $orders->cart = unserialize($orders->cart);
            return $orders;
        });
        return view('orders.detail',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('orders.index');
    }
    public function Confirm($id)
    {
        $orders = Order::find($id);
        $orders->confirm = 1;
        $orders->save();
        if($orders->user_id){
            $user = User::find($orders->user_id);
            $data = [
                "to" => $user->device_token,
                "notification" =>
                    [
                        "title" => 'Reserve',
                        "body" => "Your order had been confirmed! <br/> Your order will deliver within 45 min !",
                        "icon" => url('/logo.png'),
                        "click_action"=> '/receipt?order='.$orders->id,
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

        return redirect()->route('orders.index');
    }
    
}
