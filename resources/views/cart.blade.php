@extends('layouts.frontend')

<!-- slider_area_start -->
@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_cart">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>cart</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endsection

@section('content')
<div class="cart_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_title">your shopping cart</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="cart_bar d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_bar_title_name">Product</div>
                    <div class="cart_bar_title_content ml-auto">
                        <div
                            class="cart_bar_title_content_inner d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_bar_title_price">Price</div>
                            <div class="cart_bar_title_quantity">Quantity</div>
                            <div class="cart_bar_title_total">Total</div>
                            <div class="cart_bar_title_button"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('cart'))
        <div class="row">
            <div class="col">
                <div class="cart_products">
                    <ul>
                        @foreach($menus as $menu)
                        <li class=" cart_product d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
                            <!-- Product Image -->
                            <div class="cart_product_image"><img src="{{$menu['item']['image']}}" alt=""></div>
                            <!-- Product Name -->
                            <div class="cart_product_name">{{$menu['item']['name']}}</div>
                            <div class="cart_product_info ml-auto">
                                <div
                                    class="cart_product_info_inner d-flex flex-row align-items-center justify-content-md-end justify-content-start">
                                    <!-- Product Price -->
                                    <div class="cart_product_price">{{$menu['item']['price']}} MMK</div>
                                    <!-- Product Quantity -->
                                    <div class="product_quantity_container">
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            
                                            <div class="form-control text-center">
                                                {{$menu['qty']}}
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <!-- Products Total Price -->
                                    <div class="cart_product_total">
                                    
                                    @php
                                       $item_total = $menu['item']['price'] * $menu['qty'];
                                    @endphp
                                        {{$item_total}} MMK
                                    </div>
                                    <!-- Product Cart Trash Button -->
                                    <div class="cart_product_button">
                                        <a class="cart_product_remove" href="{{ route('deleteitemfromcart',$menu['item']['id']) }}"><i class="flaticon-delete"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach 
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="cart_control_bar d-flex flex-md-row flex-column align-items-start justify-content-start">
                    <a class="button_clear cart_button" href="{{ route('deletecart') }}">clear cart</a>
                    <a class="button_clear cart_button" href="foodmenu">Add More Food</a>
                    <!-- <a href="foodmenu"><button class="button_update cart_button_2 ml-md-auto">Add More Food</button></a> -->
                </div>
            </div>
        </div>
        <div class="row cart_extra">
            <!-- Cart Coupon -->
            <div class="col-lg-6">
                <div class="cart_coupon">
                    <div class="cart_title">Reservation</div>
                    <form action="" class="cart_coupon_form d-flex flex-row align-items-start justify-content-start"
                        id="cart_coupon_form">
                        
                        <a href="booktable" class="button_clear cart_button_2">RESERVE</a>
                    </form>
                </div>
            </div>
            <!-- Cart Total -->
            <div class="col-lg-5 offset-lg-1">
                <div class="cart_total">
                    <div class="cart_title">cart total</div>
                    <ul>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Subtotal</div>
                            <div class="cart_total_price ml-auto">{{$totalPrice}} MMK</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Shipping</div>
                            <div class="cart_total_price ml-auto">500 kyats</div>
                        </li>
                        @auth
                            @if($totalPrice>=3000)
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Promotion</div>
                                    <div class="cart_total_price ml-auto">500 kyats</div>
                                </li>
                            @endif
                        @endauth
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Total</div>
                            <div class="cart_total_price ml-auto">
                            @php
                                $i = 500;
                                if(Auth::check() && $totalPrice>=3000){
                                    $i-=500;
                                }
                                $final_total = $totalPrice + $i;
                            @endphp
                        {{$final_total}} Kyats
                            </div>
                        </li>
                    </ul>
                    @auth
                        @if($totalPrice<3000)
                        <div class="text-center">
                            <span class="invalid-feedback" role="alert" style="display: block;{{-- This fixes a bootstrap known-issue --}}">
                                <strong>Order 3000 MMK to get 500 discount !</strong>
                            </span>
                        </div>
                        @endif
                    @endauth
                    <a href="{{ route('checkout') }}"><button class="cart_total_button">proceed to checkout</button></a>
                </div>
            </div>
            
        </div>


        @else
        
        <div class="row cart_extra">
            <!-- Cart Coupon -->
            <div class="col-lg-6">
                <div class="cart_coupon">
                    <div class="cart_title">Reservation</div>
                    <form action="" class="cart_coupon_form d-flex flex-row align-items-start justify-content-start"
                        id="cart_coupon_form">
                        
                        <a href="booktable" class="button_clear cart_button_2">RESERVE</a>
                    </form>
                </div>
            </div>
            <!-- Cart Total -->
            
            
        </div> 
        @endif
    </div>
</div>
@endsection