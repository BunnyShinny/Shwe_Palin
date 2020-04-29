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
                          <input type="time" name="open_hour" class="form-control" value="{{ old('open_hour') }}">
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
              <div class="col-md-12">
                  <input id="lat" type="hidden" name="latitude" class="form-control" value="{{ old('latitude') }}" />
                  <input id="lng" type="hidden" name="longtitude" class="form-control" value="{{ old('longtitude') }}" />
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
    <div class="col-md-7">
      <div id="map" style="width: 100%; height: 60vh"></div>
      @include('alerts.feedback', ['field' => 'longtitude'])
      @include('alerts.feedback', ['field' => 'latitude'])
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

  // Creating map options

  var mapOptions = {
        center: [16.8661, 96.1951],
        zoom: 12
    }
    // Creating a map object
    var map = new L.map('map', mapOptions);
    // Creating a Layer object
    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.control.scale().addTo(map);
    // var searchControl = new L.esri.Controls.Geosearch().addTo(map);
    // Adding layer to the map
    map.addLayer(layer);
    var marker = {};
    map.on('click', function (e) {
      console.log('arr')
      console.log(e)
        if (marker != undefined) {
            map.removeLayer(marker);
        }
        marker = new L.marker(e.latlng).addTo(map);
        $("#lat").val(e.latlng.lat);
        $("#lng").val(e.latlng.lng);
    });

    $('.leaflet-container').css('cursor','pointer');
</script>
@endpush