@extends('layouts.frontend')

<!-- slider_area_start -->
@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_checkout">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Checkout</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endsection

@section('content')
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center check">
            <img src="frontend/img/check.png" alt="">
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">You order was successfuly completed.</p>
            <p><a href="foodmenu" class="btn btn-sm btn-primary">Back to shop</a></p>
          </div>
        </div>
      </div>
    </div>

@endsection