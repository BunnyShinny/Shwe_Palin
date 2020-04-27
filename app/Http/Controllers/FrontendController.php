<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use App\Branch;
use App\Reservation;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Session;

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

    public function getAddToCart(Request $request, $id)
    {

        $menu = Menu::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->add($menu, $menu->id);
        
        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));    
        return redirect()->route('foodmenu');
 
        
    }

    public function getCart()
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        // dd($cart =  new Cart($oldcart));
        return view('cart',['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getCartToCheckout()
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        // dd($cart =  new Cart($oldcart));
        return view('checkout',['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function postCartToCheckout(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('foodmenu');
            // return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        // dd($cart =  new Cart($oldcart));
        $order = new Order();
        $order->cart=serialize($cart);
        $order->name=request("name");
        $order->address=request('address');

        $order->phone=request('phone');
        $order->save();
        Session::forget('cart');
        return redirect()->route('welcome')->with('Success', 'Successfully purchased products!');
    }
}
