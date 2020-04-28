@extends('layouts.frontend')
<link rel="stylesheet" href="frontend/css/account.css">

    <!-- slider_area_start -->
    @section('slider_area')
        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_setting">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Setting</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->
    @endsection
        

    @section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="setting">
            <div class="row">
              <div class="col-md-4">
                <div class="accnav text-center">
                  <img src="frontend/img/comment/comment_2.png" alt="">
                  <h2 class="text-center">Terry</h2>
                </div>
                <div class="accnav2">
                  <h3>account setting</h3>
                  <div>
                    <h4>Profile</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="data">
                  <h1>Account Setting</h1>
                  <div>
                    <input type="text" placeholder="First Name" class="textbox" />
                    <input type="text" placeholder="Last Name" class="textbox" />
                    <input type="text" placeholder="Email Address" class="textbox" />
                    <input type="text" placeholder="Email Address" class="textbox" />

                    <input type="button" value="Next" class="button" />
                  </div>
                  
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    @endsection