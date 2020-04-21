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
            <div class="col-lg-2"></div>
            
            <div class="col-lg-8">
                <div class="book_Form">
                    <h3>Book a Table</h3>
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Your Name" name="name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Phone no." name="phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field">
                                <input id="datepicker2" placeholder="Date" name="date">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input_field mb_15">
                                <input type="text" placeholder="Person" name="no_of_people">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input_field">
                                <select class="wide">
                                    <option selected disabled name="branch">Select a Branch</option>
                                    @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
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
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
@endsection