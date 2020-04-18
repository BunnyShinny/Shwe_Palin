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
        return view('menus.read',compact('menus'));
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
        return view('menus.create',compact('menus','categories'));
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
            "price"=>'required',
            "description"=>'required',
            "category"=>'required',
            "image"=>'required',
            
        ]);

        $save = new Menu;
        $save->name = request('name');
        $save->price = request('price');
        $save->description = request('description');
        $save->category_id = request('category');

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
        return redirect()->route('menus.index');
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
        
        return view('menus.detail',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $categories=Category::all();
        $menu = DB::table('menus')
        ->join('categories', 'categories.id', '=', 'menus.category_id')
        ->select('menus.*', 'Categories.name as category_name')
        ->where('menus.id', '=' , $id)
        ->first();
        
        return view('menus.edit',compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu=Menu::find($id);
        $request->validate([
            "name"=>'required',
            "price"=>'required',
            "description"=>'required',
            "category"=>'required',
            "image"=>'required',
            
        ]);
        $menu->name = request('name');
        $menu->price = request('price');
        $menu->description = request('description');
        $menu->category_id = request('category');

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
            $menu->image =$path;
        }else{
            $menu->$image=$path;
        }

        $menu->save();
        return redirect()->route('menus.index');
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
        return redirect()->route('menus.index');
    }
}
