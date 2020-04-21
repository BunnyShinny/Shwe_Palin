<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches=Branch::all();
        return view('branches.read',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
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
            "phone"=>'required',
            "address"=>'required|unique:branches',
            "phone"=>'required',
            "open_hour"=>'required',
            "image"=>'required',
        ]);
        $save = new Branch;
        $save->name = request('name');
        $save->address = request('address');
        $save->phone = request('phone');
        $save->open_hour = request('open_hour');

        $image=$request->file('image');
        $path='';
        if($image !== null){
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $public_path=public_path().'/assets/img/branch/';
            $image->move($public_path, $fileNameToStore);
            $path = '/assets/img/branch/'.$fileNameToStore;
            $save->image =$path;
        }else{
            $save->$image=$path;
        }

        $save->save();
        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('branches.edit',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch=Branch::find($id);
        $request->validate([
            "name"=>'required',
            "address"=>'required',
            "phone"=>'required',
            "open_hour"=>'required',
            "image"=>'required',
        ]);
        
        $branch->name = request('name');
        $branch->address = request('address');
        $branch->phone = request('phone');
        $branch->open_hour = request('open_hour');

        $image=$request->file('image');
        $path='';
        if($image !== null){
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $public_path=public_path().'/assets/img/branch/';
            $image->move($public_path, $fileNameToStore);
            $path = '/assets/img/branch/'.$fileNameToStore;
            $branch->image =$path;
        }else{
            $branch->$image=$path;
        }

        $branch->save();
        return redirect()->route('branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $branch=Branch::find($id);
        $branch->delete();
        return redirect()->route('branches.index');
    }
}
