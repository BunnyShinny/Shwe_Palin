<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use App\Branch;
use App\Reservation;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    public function foodmenu()
    {
        $categories = Category::all();
        $menus = DB::table('menus')
        ->join('categories', 'categories.id', '=', 'menus.category_id')
        ->select('menus.*', 'categories.name as category_name')
        ->get();
        return view('foodmenu',compact('menus','categories'));
    }

    public function branch()
    {
        $branches=Branch::all();
        return view('branch',compact('branches'));
    }

    public function reservation()
    {
        $branches=Branch::all();
        return view('booktable',compact('branches'));
    }

    public function save_reservation(Request $request)
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

    
}
