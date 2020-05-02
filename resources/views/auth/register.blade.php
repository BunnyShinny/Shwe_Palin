@extends('layouts.frontend')

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
<div class="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="logo text-center">
                        <h2>Create Your Account</h2>
                </div>
                <div class="sgform">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <label for="fname">Name</label>
                        <input type="text" id="fname" name="name" placeholder="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <label for="fname">Email Address</label>
                        <input type="text" id="fname" name="email" placeholder="Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                        <label for="lname">Password</label>
                        <input type="password" id="lname" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <label for="lname">Confirm Password</label>
                        <input type="password" id="lname" name="password_confirmation" placeholder="Confirm Password">

                        <input type="submit" value="{{__('Create')}}">
                    </form>
                </div>
                
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
@endsection