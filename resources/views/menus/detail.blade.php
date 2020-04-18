@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'Menu',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-user">
        <div class="card-header">
          <h3 class="card-title">Menu Details</h3>
        </div>
        <div class="card-body">
        <div class="author" style="margin-top:0">
          <a href="#">
            <img class="avatar border-gray" src="{{$menu->image}}" style="object-fit: cover;" alt="...">
          </a>
        </div>
        <form class="" method="POST" action="#" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $menu->name }}" disabled>
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                  <div class="form-group">
                      <label>Price</label>
                          <input type="number" name="price" class="form-control" value="{{ $menu->price }}" disabled>
                  </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" id="category" name="category" disabled>
                    <option selected disabled>{{$menu->category_name}}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 pr-4 pl-4">
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" rows="3" name="description" disabled>{{$menu->description}}</textarea>
                </div>
              </div>
          </div>
              <div class="card-footer text-center">
              <a
                  href="{{route('menus.edit',$menu->id)}}"
                  class="btn btn-info btn-round"
                  >Edit</a
              >
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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush