@extends('layouts.frontend')
<link rel="stylesheet" href="frontend/css/account.css" />

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
@endsection @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="setting">
                <div class="data">
                    <h1 class="text-center">Edit Profile</h1>
                    <form
                        method="post"
                        action="{{ route('profile.update') }}"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('put') @include('alerts.success')
                        <div class="row"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __(" Name") }}</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name', auth()->user()->name) }}"
                                    />
                                    @include('alerts.feedback', ['field' =>
                                    'name'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{
                                        __(" Email address")
                                    }}</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                    />
                                    @include('alerts.feedback', ['field' =>
                                    'email'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary btn-round">
                                    {{ __("Save") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="setting">
                <div class="data">
                    <h1 class="text-center">Password</h1>
                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                        @csrf
                        @method('put')
                        @include('alerts.success', ['key' => 'password_status'])
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                              <label>{{__(" Current Password")}}</label>
                              <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Current Password') }}" type="password"  required>
                              @include('alerts.feedback', ['field' => 'old_password'])
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                              <label>{{__(" New password")}}</label>
                              <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" type="password" name="password" required>
                              @include('alerts.feedback', ['field' => 'password'])
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{__(" Confirm New Password")}}</label>
                            <input class="form-control" placeholder="{{ __('Confirm New Password') }}" type="password" name="password_confirmation" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col text-center">
                              <button type="submit" class="btn btn-primary btn-round text-center">{{__('Change Password')}}</button>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
