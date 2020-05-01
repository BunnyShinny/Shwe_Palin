@extends('layouts.frontend')

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
        
        <form class="" method="POST" action="{{route('postcheckout')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="text-black">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            
                        </div>

                        

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="" value="{{ old('address') }}">
                                    @include('alerts.feedback', ['field' => 'address'])
                            </div>
                        </div>

                        

                        

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="" value="{{ old('phone') }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                            </div>
                        </div>

                        

                    </div>
                </div>
                <div class="col-md-6">

                    
                    @if(Session::has('cart'))
                    <div class="row mb-5">
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
                                        @auth
                                            @if($totalPrice>=3000)
                                                <td >Promotion</td>
                                                <td >500 MMK</td>
                                            @endif
                                        @endauth
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong>
                                            @php
                                                $i = 500;
                                                if(Auth::check() && $totalPrice>=3000){
                                                    $i-=500;
                                                }
                                                $final_total = $totalPrice + $i;
                                            @endphp
                                            {{$final_total}} MMK
                                            </strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class=" p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank"
                                            role="button" aria-expanded="false" aria-controls="collapsebank">Cash On Delivery<span class="text-danger">*</span></a></h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2">
                                            <p class="mb-0">Only available cash on delivery</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque"
                                            role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque
                                            Payment</a></h3>

                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use
                                                your Order ID as the payment reference. Your order won’t be shipped until
                                                the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3 mb-5">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal"
                                            role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a>
                                    </h3>

                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use
                                                your Order ID as the payment reference. Your order won’t be shipped until
                                                the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                <form action="{{ route('send-push') }}" method="POST">
                                    @csrf

                                    <input class="btn btn-primary btn-lg py-3 btn-block" type="submit" value="Place Order">
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </form>
        <!-- </form> -->
    </div>
</div>

@endsection

@push('scripts')

@endpush