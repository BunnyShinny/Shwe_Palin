@extends('layouts.app', [
'namePage' => 'Dashboard',
'class' => 'login-page sidebar-mini ',
'activePage' => 'Branch',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New Branch</h3>
        </div>
        <div class="card-body">
        <form class="" method="POST" action="{{route('branches.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
          <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Name</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                          @include('alerts.feedback', ['field' => 'name'])
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Address</label>
                          <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                          @include('alerts.feedback', ['field' => 'address'])
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Phone</label>
                          <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                          @include('alerts.feedback', ['field' => 'phone'])
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Open Hours</label>
                          <input type="text" name="open_hour" class="form-control" value="{{ old('open_hour') }}">
                          @include('alerts.feedback', ['field' => 'open_hour'])
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Image</label>
                          <input type="file" name="image" class="form-control" style="position:static;opacity:1">
                          @include('alerts.feedback', ['field' => 'image'])
                  </div>
              </div>
          </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-round ">Save</button>
                <a
                  href="{{route('menus.index')}}"
                  class="btn btn-default btn-round"
                  >Cancel</a
              >
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function () {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>
@endpush