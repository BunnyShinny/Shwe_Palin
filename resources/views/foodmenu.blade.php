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
                        <a class="nav-link" id="{{$category->name}}-tab" data-toggle="pill" onclick="filterSelection('{{$category->name}}')" href="#{{$category->name}}"
                            role="tab" aria-controls="pills-home" aria-selected="true">
                            <div class="single_menu text-center">
                                <div class="icon">
                                    
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
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">
                    @foreach($menus as $menu)
                    <div class="col-xl-6 col-md-6 col-lg-6 {{$menu->category_name}}">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                
                                <a href="{{asset($menu->image)}}"><img src="{{asset($menu->image)}}" alt="" style="max-width: 232px; border-radiu: 232px"></a>
                            </div>
                            <div class="info">
                                <h3 name="name">{{$menu->name}}</h3>
                                <p>{{$menu->description}}</p>
                                <span name="price">{{$menu->price}} MMKS</span>
                                <h4>Available<span class="available"></span></h4>
                                <p><a href="{{ route('addtocart', ['id'=> $menu->id]) }}" class="add-to-cart-btn">Add To Cart</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @foreach($categories as $category)
                <div class="tab-pane fade" id="{{$category->name}}" role="tabpanel" aria-labelledby="{{$category->name}}-tab">
                    <div class="row">
                @if(count($category->menus)>0)
                        @foreach($category->menus as $menu)
                            <div class="col-xl-6 col-md-6 col-lg-6 {{$menu->category_name}}">
                                <div class="single_delicious d-flex align-items-center">
                                    <div class="thumb">
                                        <a href="{{asset($menu->image)}}"><img src="{{asset($menu->image)}}" alt="" style="max-width: 232px; border-radiu: 232px"></a>
                                    </div>
                                    <div class="info">
                                        <h3 name="name">{{$menu->name}}</h3>
                                        <p>{{$menu->description}}</p>
                                        <span name="price">{{$menu->price}} MMKS</span>
                                        <h4>Available<span class="available"></span></h4>
                                        <p><a href="{{ route('addtocart', ['id'=> $menu->id]) }}" class="add-to-cart-btn">Add To Cart</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col text-center">
                            <span class="invalid-feedback" role="alert" style="display: block;{{-- This fixes a bootstrap known-issue --}}">
                                <strong>There's no foods for this category !</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        



    </div>
</div>
<!--/ Delicious area start  -->
@endsection