<?php

namespace App\Http\Controllers;

use App\Reservation_with_Order;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationWithOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rwo = DB::table('reservation_with__orders')
        ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
        ->select('reservation_with__orders.*', 'branches.name as branch_name')
        ->get();
        $rwo->transform(function($rwo, $key){
            $rwo->cart = unserialize($rwo->cart);
            return $rwo;
        });
        return view('reservation_with_order.read',compact('rwo'));
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
        $rwo->confirm = 1;
        $rwo->save();
        return redirect()->route('reservationwithorders.index');
    }
}
