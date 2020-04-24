@extends('layouts.frontend')

<!-- slider_area_start -->
@section('slider_area')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Fresh and Delicious Food
                                For your Health</h3>
                            <a href="cart" class="boxed-btn3">Book a Table</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9 col-md-9 col-md-12">
                        <div class="slider_text text-center">
                            <h3>Fresh and Delicious Food
                                For your Health</h3>
                            <a href="cart" class="boxed-btn3">Book a Table</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- slider_area_end -->

@section('content')
<!-- about_area_start -->
<div class="about_area">
    <div class="icon_1 d-none d-md-block">
        <img src="frontend/img/icon/1.png" alt="">
    </div>
    <div class="icon_2 d-none d-md-block">
        <img src="frontend/img/icon/2.png" alt="">
    </div>
    <div class="icon_3 d-none d-md-block">
        <img src="frontend/img/icon/3.png" alt="">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about_info_wrap">
                    <h3>ေရႊပလႅင္ - Shwepalin</h3>
                    <span class="long_dash"></span>
                    <p>The best Myanmar traditional teashop in Myanmar. We serve a range of paos and puffs, as well as
                        various traditional rice and noodle dishes. We strive to serve you the best traditional Myanmar
                        tea.</p>
                    <ul class="food_list">
                        <li>
                            <img src="frontend/img/svg_icon/salad.svg" alt="">
                            <span>Fresh Ingredients</span>
                        </li>
                        <li>
                            <img src="frontend/img/svg_icon/tray.svg" alt="">
                            <span>Expert cooker</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_img">
                    <div class="img_1">
                        <img src="frontend/img/shwe/about.jpg" alt="">
                    </div>
                    <div class="small_img">
                        <img src="frontend/img/about/small.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about_area_end -->

<!-- Delicious area start  -->
<div class="Delicious_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-50">
                    <h3>Delicious Food For You</h3>
                </div>
            </div>
        </div>
        <div class="tablist_menu">
            <div class="row">
                <div class="col-xl-12">
                    <ul class="nav justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <div class="single_menu text-center">
                                    <div class="icon">
                                        <i class="flaticon-lunch"></i>
                                    </div>
                                    <h4>Popular</h4>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <div class="single_menu text-center">
                                    <div class="icon">
                                        <i class="flaticon-food"></i>
                                    </div>
                                    <h4>Best Seller</h4>
                                </div>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                                        <div class="single_menu text-center">
                                                                <div class="icon">
                                                                    <i class="flaticon-kitchen"></i>
                                                                </div>
                                                                <h4>Lunch</h4>
                                                            </div>
                                                    </a>
                                                </li> -->
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/noodle/01.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/3.png" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/5.png" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/2.png" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/4.png" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>

                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>

                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/6.png" alt="">
                            </div>
                            <div class="info">
                                <h3>Coconut Noodle</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>1000 MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus"
                                            type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus"
                                            type="button">&plus;</button>
                                    </div>
                                </div>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Add To Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/1.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#12. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/3.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#10. Fried Rice</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/5.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#02. Burger Cury</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/2.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#16. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/4.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#08. Vegetable fry</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/6.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#01. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/1.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#12. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/3.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#10. Fried Rice</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/5.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#02. Burger Cury</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/2.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#16. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/4.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#08. Vegetable fry</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/delicious/6.png" alt="">
                            </div>
                            <div class="info">
                                <h3>#01. Chicken Chilis</h3>
                                <p>Craft beer elit seitan exercitation photo booth et 8-bit kale chips.</p>
                                <span>$20</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--/ Delicious area start  -->
<!-- testimonial_area  -->
<div class="testimonial_area overlay ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-50">
                    <p>Testimonials</p>
                    <h3>Our Customer’s Say</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="single_testmonial ">
                            <div class="author_opinion">
                                <p>Had dinner with girl friends. Menu is perfect, something for everyone. Service
                                    was awesome and Jason was very accommodating. Will be back definitely!</p>
                            </div>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="frontend/img/testimonial/author.png" alt="">
                                </div>
                                <div class="name">
                                    <h3>Thiha</h3>
                                    <div class="icon">
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial ">
                            <div class="author_opinion">
                                <p>
                                    We had lunch here a few times while on the island visiting family and friends.
                                    The servers here are just wonderful and have great memories it seems. Must try!
                                </p>
                            </div>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="frontend/img/testimonial/author2.png" alt="">
                                </div>
                                <div class="name">
                                    <h3>Ma Aye</h3>
                                    <div class="icon">
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial ">
                            <div class="author_opinion">
                                <p>I had lunch with some of my colleagues at Echo on Day 1. I had the wedge salad.
                                    On Night 2, I enjoyed a drink at the bar. I had a Margarita. The service was
                                    excellent.</p>
                            </div>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="frontend/img/testimonial/author2.png" alt="">
                                </div>
                                <div class="name">
                                    <h3>Ma Su</h3>
                                    <div class="icon">
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial ">
                            <div class="author_opinion">
                                <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed
                                    neque.</p>
                            </div>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="frontend/img/testimonial/author.png" alt="">
                                </div>
                                <div class="name">
                                    <h3>Robert Thomson</h3>
                                    <div class="icon">
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="single_testmonial ">
                            <div class="author_opinion">
                                <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                    sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed
                                    neque.</p>
                            </div>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="frontend/img/testimonial/author2.png" alt="">
                                </div>
                                <div class="name">
                                    <h3>Kristiana Chouhan</h3>
                                    <div class="icon">
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                        <a href="#"><i class="fa fa-star"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->
<!-- Resevation Area  -->
<div class="Reservation_area">
    <div class="rev_icon_1 d-none d-md-block">
        <img src="img/icon/4.png" alt="">
    </div>
    <div class="rev_icon_2 d-none d-md-block">
        <img src="img/icon/5.png" alt="">
    </div>
    <div class="rev_icon_3 d-none d-md-block">
        <img src="img/icon/6.png" alt="">
    </div>
    <div class="container p-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-75">
                    <h3>Reservation</h3>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-xl-6 col-lg-6">
                <div class="map_area">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;"> </div>
                    <script>
                        function initMap() {
                            var uluru = {
                                lat: -25.363,
                                lng: 131.044
                            };
                            var grayStyles = [{
                                featureType: "all",
                                stylers: [{
                                    saturation: -90
                                },
                                {
                                    lightness: 50
                                }
                                ]
                            },
                            {
                                elementType: 'labels.text.fill',
                                stylers: [{
                                    color: '#ccdee9'
                                }]
                            }
                            ];
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: -31.197,
                                    lng: 150.744
                                },
                                zoom: 9,
                                styles: grayStyles,
                                scrollwheel: false
                            });
                        }
                    </script>
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
                        </script>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="book_Form">
                    <h3>Book a Table</h3>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Phone no.">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field">
                                <input id="datepicker2" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Person">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input_field">
                                <select class="wide">
                                    <option data-display="Branch">Branch</option>
                                    <option value="1">Branch</option>
                                    <option value="1">Branch</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <button class="sumbit_btn" type="submit">Book</button>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_add d-flex">
                                <div class="icon">
                                    <img src="img/svg_icon/address.svg" alt="">
                                </div>
                                <div class="ifno">
                                    <h4>Address</h4>
                                    <p>20/D, Kings road, Green lane</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_add d-flex">
                                <div class="icon">
                                    <img src="img/svg_icon/head.svg" alt="">
                                </div>
                                <div class="ifno">
                                    <h4>Reservation</h4>
                                    <p>+10 673 567 367</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection