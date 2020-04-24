@extends('layouts.frontend')

<!-- slider_area_start -->
@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>contact</h3>
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
        <div class="row">
            <div class="col">
                <div class="cart_products">
                    <ul>
                        <li
                            class=" cart_product d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
                            <!-- Product Image -->
                            <div class="cart_product_image"><img src="frontend/img/menu/drinks/drink3.jpg" alt=""></div>
                            <!-- Product Name -->
                            <div class="cart_product_name"><a href="product.html">Strawberry Juice</a></div>
                            <div class="cart_product_info ml-auto">
                                <div
                                    class="cart_product_info_inner d-flex flex-row align-items-center justify-content-md-end justify-content-start">
                                    <!-- Product Price -->
                                    <div class="cart_product_price">1000 MMKS</div>
                                    <!-- Product Quantity -->
                                    <div class="product_quantity_container">
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus"
                                                    type="button">&minus;</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                                aria-label="Example text with button addon"
                                                aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus"
                                                    type="button">&plus;</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Products Total Price -->
                                    <div class="cart_product_total">1000 MMKS</div>
                                    <!-- Product Cart Trash Button -->
                                    <div class="cart_product_button">
                                        <button class="cart_product_remove"><i class="flaticon-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="cart_control_bar d-flex flex-md-row flex-column align-items-start justify-content-start">
                    <button class="button_clear cart_button">clear cart</button>
                    <button class="button_update cart_button">update cart</button>
                    <a href="foodmenu"><button class="button_update cart_button_2 ml-md-auto">Add More Food</button></a>
                </div>
            </div>
        </div>
        <div class="row cart_extra">
            <!-- Cart Coupon -->
            <div class="col-lg-6">
                <div class="cart_coupon">
                    <div class="cart_title">Reservation</div>
                    <form action="#" class="cart_coupon_form d-flex flex-row align-items-start justify-content-start"
                        id="cart_coupon_form">
                        
                        <button class="button_clear cart_button_2">RESERVE</button>
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
                            <div class="cart_total_price ml-auto">$35.00</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Shipping</div>
                            <div class="cart_total_price ml-auto">$5.00</div>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_total_title">Total</div>
                            <div class="cart_total_price ml-auto">$40.00</div>
                        </li>
                    </ul>
                    <a href="checkout"><button class="cart_total_button">proceed to checkout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection