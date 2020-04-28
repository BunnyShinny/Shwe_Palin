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
use App\Reservation_with_Order;

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
        if (!Session::has('cart')){
            $branches=Branch::all();
            return view('booktable',compact('branches'),['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        $branches=Branch::all();
        return view('booktable',compact('branches'), ['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
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

    public function booktable_with_ordersave(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('foodmenu');
            // return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        // dd($cart =  new Cart($oldcart));
        
        $request->validate([
            "name"=>'required',
            "phone"=>'required',
            "date"=>'required',
            "no_of_people"=>'required',
            "branch"=>'required',
            
        ]);
        
        

        $rwo = new Reservation_with_Order;
        $rwo->name = request('name');
        $rwo->phone = request('phone');
        $rwo->date = request('date');
        $rwo->branch_id = request('branch');
        $rwo->no_of_people = request('no_of_people'); 
        $rwo->cart=serialize($cart);
        $rwo->save();
        

        Session::forget('cart');
        return view('thankyou')->with('Success', 'Successfully purchased products!');
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
            return view('cart',['menus'=>null, 'totalPrice'=>0]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        // dd($cart =  new Cart($oldcart));
        return view('cart',['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function deleteCart()
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        Session::forget('cart');
        // dd($cart =  new Cart($oldcart));
        return view('cart');
    }

    public function deleteItemFromCart(Request $request,$id)
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $get_item = $oldcart->items[$id];
        $oldcart->totalQty = $oldcart->totalQty - $get_item['qty'];
        $oldcart->totalPrice = $oldcart->totalPrice - ($get_item['qty'] * $get_item['price']);

        unset($oldcart->items[$id]);
        $request->session()->put('cart',$oldcart);
        
        return redirect()->back();
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
        $request->validate([
            "name"=>'required',
            "address"=>'required',
            "phone"=>'required',
            "phone"=>'required',
            
        ]);
        $order->cart=serialize($cart);
        $order->name=request("name");
        $order->address=request('address');

        $order->phone=request('phone');
        $order->save();
        Session::forget('cart');
        return view('thankyou')->with('Success', 'Successfully purchased products!');
    }
}
