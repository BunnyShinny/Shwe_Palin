@extends('layouts.frontend')

@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Our Menu</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endsection

@section('content')
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
                            <a class="nav-link active" id="all-tab" data-toggle="pill" onclick="filterSelection('all')" href="#all"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <div class="single_menu text-center">
                                    
                                    <h4>All</h4>
                                </div>
                            </a>
                        </li>
                    @foreach($categories as $category)
                    <li class="nav-item">
                    <a class="nav-link " id="{{$category->name}}-tab" data-toggle="pill" onclick="filterSelection('{{$category->name}}')" href="#{{$category->name}}"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <div class="single_menu text-center">
                                    <div class="icon">
                                        <!-- <i class="flaticon-bell"></i> -->
                                    </div>
                                    <h4>{{$category->name}}</h4>
                                </div>
                            </a>
                    </li>
                    @endforeach
                       

                    </ul>
                </div>
            </div>
        </div>
        
        
        <div class="tab-content" id="pills-tabContent">
         
            <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="-tab">
            <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> -->
                <div class="row">
                    @foreach($menus as $menu)
                    <div class="col-xl-6 col-md-6 col-lg-6 {{$menu->category_name}}">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                
                                <a href="{{asset($menu->image)}}"><img src="{{asset($menu->image)}}" alt="" style="max-width: 232px; border-radiu: 232px"></a>
                            </div>
                            <div class="info">
                                <h3>{{$menu->name}}</h3>
                                <p>{{$menu->description}}</p>
                                <span>{{$menu->price}} MMKS</span>
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
                    @endforeach
                    <!-- <div class="col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/drinks/drink2.jpg" alt="">
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
                                <img src="frontend/img/menu/drinks/drink3.jpg" alt="">
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
                                <img src="frontend/img/menu/drinks/drink4.jpg" alt="">
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
                                <img src="frontend/img/menu/drinks/drink5.jpg" alt="">
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
                                <img src="frontend/img/menu/drinks/drink6.jpg" alt="">
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
                    </div> -->
                </div>
            </div>
            <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/bread/bread.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/bread/brownies.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/bread/coconut.jpg" alt="">
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
                                <img src="frontend/img/menu/bread/putin.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/bread/shwepalincake.jpg" alt="">
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
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/trad/chickenonionkyw.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/trad/fishwavekyw.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/trad/friedrice.jpg" alt="">
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
                                <img src="frontend/img/menu/trad/friedrice2.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/trad/htamintoke.jpg" alt="">
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
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/menu/trad/tearice.jpg" alt="">
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
            </div> -->
        </div>
        



    </div>
</div>
<!--/ Delicious area start  -->
@endsection