<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use App\Branch;
use App\Reservation;
use App\Cart;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Session;
use PDF;
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
    public function __construct()
    {
        $this->serverKey = config('app.firebase_server_key');
    }

    public function index()
    {
        $popular = Menu::all()->random(5);
        $bestseller = Menu::all()->random(5);
        
        return view('index',compact('popular','bestseller'));
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
            "no_of_people"=>'required|min:1',
            "branch"=>'required',
            
        ]);
        $save = new Reservation;
        $save->name = request('name');
        $save->phone = request('phone');
        $save->date = request('date');
        $save->branch_id = request('branch');
        $save->no_of_people = request('no_of_people');

        if(auth()->user()){
            $save->user_id = auth()->user()->id;
        }
    
        $save->save();

        //message

        $user = User::find(1);
        if (auth()->user()){
            $orderName = auth()->user()->name;
        }else{
            $orderName = $save->name;
        }
        $data = [
            "to" => $user->device_token,
            "notification" =>
                [
                    "title" => 'Reserve',
                    "body" => "You Got a new reservation From ".$orderName,
                    "icon" => url('/logo.png'),
                    "click_action"=> 'reservations',
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

        
        return redirect()->route('welcome');
    }

    public function booktable_with_ordersave(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('foodmenu');
            // return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        
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
        if(auth()->user()){
            $rwo->user_id = auth()->user()->id;
        }
        $rwo->save();

        //message

        $user = User::find(1);
        if (auth()->user()){
            $orderName = auth()->user()->name;
        }else{
            $orderName = $rwo->name;
        }
        $data = [
            "to" => $user->device_token,
            "notification" =>
                [
                    "title" => 'Reserve',
                    "body" => "You Got a new reservation From ".$orderName,
                    "icon" => url('/logo.png'),
                    "click_action"=> 'reservationwithorders',
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
        return redirect()->back();
 
        
    }

    public function getAddQuantityToCart(Request $request, $id)
    {

        $menu = Menu::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldcart);
        $cart->add($menu, $menu->id);
        
        $request->session()->put('cart',$cart);
        return redirect()->route('getcart');
 
        
    }

    public function getCart()
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null, 'totalPrice'=>0]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
        return view('cart',['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function deleteCart()
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        Session::forget('cart');
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
        $oldcart->totalPrice = $oldcart->totalPrice -  $get_item['price'];

        unset($oldcart->items[$id]);
        if($oldcart->totalQty<=0){
            Session::forget('cart');
        }else{
            $request->session()->put('cart',$oldcart);
        }
        return redirect()->back();
    }

    public function getReduceQuantityToCart(Request $request,$id)
    {
        if (!Session::has('cart')){
            return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        if($oldcart->items[$id]['qty'] > 1){
            $oldcart->items[$id]['qty'] -= 1;
            $oldcart->items[$id]['price'] -= $oldcart->items[$id]['item']->price;
            $oldcart->totalQty = $oldcart->totalQty - 1;
            $oldcart->totalPrice -= $oldcart->items[$id]['item']->price;
            $request->session()->put('cart',$oldcart);
        }
        
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
        return view('checkout', ['menus'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }
    public function receipt(Request $request)
    {
        // $order = Order::find($request->input('order'));
        $containCart = true;
        if($request->input('order')){
            $all = Order::all();
            $queryString = $request->input('order');
        }else if($request->input('rwo')){
            $all = DB::table('reservation_with__orders')
            ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
            ->select('reservation_with__orders.*', 'branches.name as branch_name')
            ->get();
            $queryString = $request->input('rwo');
        }else if($request->input('reservation')){
            $all = DB::table('reservations')
            ->join('branches', 'branches.id', '=', 'reservations.branch_id')
            ->select('reservations.*', 'branches.name as branch_name')
            ->get();
            $containCart = false;
            $queryString = $request->input('reservation');
        }
        if($containCart){
            $all->transform(function($all, $key){
                $all->cart = unserialize($all->cart);
                return $all;
            });
        }
        $data = null;
        foreach($all as $getOrder) {
            if ($queryString == $getOrder->id) {
                $data = $getOrder;
                break;
            }
        }
        return view('receipt',compact(['data','containCart']));
    }

    public function postCartToCheckout(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('foodmenu');
            // return view('cart',['menus'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart =  new Cart($oldcart);
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
        if(auth()->user()){
            $order->user_id = auth()->user()->id;
            $order->discount = $cart->totalPrice >= 3000 ? 500 : 0; 
        }
        $order->save();
        Session::forget('cart');

        //message

        $user = User::find(1);
        if (auth()->user()){
            $orderName = auth()->user()->name;
        }else{
            $orderName = $order->name;
        }
        $data = [
            "to" => $user->device_token,
            "notification" =>
                [
                    "title" => 'Reserve',
                    "body" => "You Got a new Order From ".$orderName,
                    "icon" => url('/logo.png'),
                    "click_action"=> 'orders',
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

        return view('thankyou')->with('Success', 'Successfully purchased products!');
    }

    public function downloadPDF(Request $request) {
        $containCart = true;
        if($request->input('order')){
            $all = Order::all();
            $queryString = $request->input('order');
        }else if($request->input('rwo')){
            $all = DB::table('reservation_with__orders')
            ->join('branches', 'branches.id', '=', 'reservation_with__orders.branch_id')
            ->select('reservation_with__orders.*', 'branches.name as branch_name')
            ->get();
            $queryString = $request->input('rwo');
        }else if($request->input('reservation')){
            $all = DB::table('reservations')
            ->join('branches', 'branches.id', '=', 'reservations.branch_id')
            ->select('reservations.*', 'branches.name as branch_name')
            ->get();
            $containCart = false;
            $queryString = $request->input('reservation');
        }
        if($containCart){
            $all->transform(function($all, $key){
                $all->cart = unserialize($all->cart);
                return $all;
            });
        }
        $data = null;
        foreach($all as $getOrder) {
            if ($queryString == $getOrder->id) {
                $data = $getOrder;
                break;
            }
        }

        $pdf = PDF::loadView('pdf.receipt', compact(['data','containCart']));
        return $pdf->download('order.pdf');
}
}
