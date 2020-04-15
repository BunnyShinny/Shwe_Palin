<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = DB::table('menus')
        ->join('categories', 'categories.id', '=', 'menus.category_id')
        ->select('menus.*', 'Categories.name as category_name')
        ->get();
        return view('menu.read',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $menus=Menu::all();
        $categories=Category::all();
        return view('menu.create',compact('menus','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = new Menu;
        $save->name = request('name');
        $save->price = request('price');
        $save->description = request('description');
        $save->category_id = request('category_id');

        $image=$request->file('image');
        $path='';
        if($image !== null){
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $public_path=public_path().'/assets/img/';
            $image->move($public_path, $fileNameToStore);
            $path = '/assets/img/'.$fileNameToStore;
            $save->image =$path;
        }else{
            $save->$image=$path;
        }

        $save->save();
        return redirect()->route('showmenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::table('menus')
        ->join('categories', 'categories.id', '=', 'menus.category_id')
        ->select('menus.*', 'Categories.name as category_name')
        ->where('menus.id', '=' , $id)
        ->first();
        
        return view('menu.detail',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::find($id);
        $menu->delete();
        return redirect()->route('showmenu');
    }
}
