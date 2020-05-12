@extends('layouts.app', [ 'namePage' => 'Dashboard', 'class' => 'login-page
sidebar-mini ', 'activePage' => 'Customer', 'backgroundImage' => asset('now') .
"/img/bg14.jpg", ]) @section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Customer</h3>
                </div>
                <div class="card-body">
                    <form
                        class=""
                        method="POST"
                        action="{{route('user.update',$user->id)}}"
                    >
                        @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name',$user->name) }}"
                                    />
                                    @include('alerts.feedback', ['field' =>
                                    'name'])
                                </div>
                            </div>
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email',$user->email) }}"
                                    />
                                    @include('alerts.feedback', ['field' =>
                                    'email'])
                                </div>
                            </div>
                            <div class="col-md-7 pr-1">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input
                                        type="text"
                                        name="password"
                                        class="form-control"
                                        value=""
                                    />
                                    @include('alerts.feedback', ['field' =>
                                    'password'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                          <button type="submit" class="btn btn-primary btn-round ">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('js')
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
@endpush
