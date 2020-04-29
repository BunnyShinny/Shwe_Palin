@extends('layouts.frontend')

@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Book A table</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endsection

@section('content')
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
            

            
                @if(Session::has('cart'))
                <form class="" method="POST" action="{{route('booktablewithordersave')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="book_Form col-md-6">
                            <h3>Book a Table</h3>
                            <div class="row ">
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="text" placeholder="Your Name" name="name" value="{{ old('name') }}"
                                            class="form-control">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="text" placeholder="Phone no." name="phone" value="{{ old('phone') }}"
                                            class="form-control">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field">
                                        <input id="" type="date" placeholder="Date" name="date" value="{{ old('date') }}"
                                            class="form-control">
                                        @include('alerts.feedback', ['field' => 'date'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="number" placeholder="Person" name="no_of_people"
                                            value="{{ old('no_of_people') }}" class="form-control">
                                        @include('alerts.feedback', ['field' => 'no_of_people'])
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input_field">
                                        <select class="wide" name="branch">
                                            @if(app('request')->input('branch'))
                                            @else
                                                <option selected disabled>Select a Branch</option>
                                            @endif
                                            @foreach($branches as $branch)
                                                @if(app('request')->input('branch') == $branch->id)
                                                    <option value="{{$branch->id}}" selected>{{$branch->name}}</option>
                                                @else
                                                    <option value="{{$branch->id}}" >{{$branch->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5 col-md-6">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach($menus as $menu)
                                            <tr>
                                                <td>{{$menu['item']['name']}}<strong class="mx-2">x</strong>{{$menu['qty']}}</td>
                                                <td>
                                                @php
                                                    $item_total = $menu['item']['price'] * $menu['qty'];
                                                @endphp
                                                {{$item_total}} MMK
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td >Delivery</td>
                                                <td >500 MMK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Total</strong></td>
                                                <td class="text-black font-weight-bold"><strong>
                                                @php
                                                    $i = 500;
                                                    $final_total = $totalPrice + $i;
                                                @endphp
                                                {{$final_total}} MMK
                                                </strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class=" p-3 mb-3">

                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">Only available cash on delivery</p>
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        
                            @csrf

                            <input class="btn btn-primary btn-lg py-3 btn-block" type="submit" value="Place Order">
                        
                    </div>
                </form>
                @else
                <form class="" method="POST" action="booktablesave" enctype="multipart/form-data">
                    @csrf
                    <div class="book_Form">
                        <h3>Book a Table</h3>
                        <div class="row ">
                            <div class="col-lg-6">
                                <div class="input_field mb_15">
                                    <input type="text" placeholder="Your Name" name="name" value="{{ old('name') }}"
                                        class="form-control">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input_field mb_15">
                                    <input type="text" placeholder="Phone no." name="phone" value="{{ old('phone') }}"
                                        class="form-control">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input_field">
                                    <input id="" type="date" placeholder="Date" name="date" value="{{ old('date') }}"
                                        class="form-control">
                                    @include('alerts.feedback', ['field' => 'date'])
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input_field mb_15">
                                    <input type="number" placeholder="Person" name="no_of_people"
                                        value="{{ old('no_of_people') }}" class="form-control">
                                    @include('alerts.feedback', ['field' => 'no_of_people'])
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input_field">
                                    <select class="wide" name="branch">
                                        <option selected disabled>Select a Branch</option>
                                        @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xl-12">
                                <a href="bookdisplay"><button class="sumbit_btn" type="submit">Book</button></a>
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
                </form>
                @endif
            
            
        </div>

        
    </div>
</div>
</div>
@endsection