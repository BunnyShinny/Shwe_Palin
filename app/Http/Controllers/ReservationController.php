<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::table('reservations')
        ->join('branches', 'branches.id', '=', 'reservations.branch_id')
        ->select('reservations.*', 'branches.name as branch_name')
        ->get();
        return view('reservations.read',compact('reservations'));
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
        return view('index');
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
}
