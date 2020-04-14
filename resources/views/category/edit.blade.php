@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
<a href="{{route('category.create')}}" class="btn btn-info col-2 float-right" >Add New</a>
<div class="card">
          <div class="card-header">
            <h4 class="card-title">Update Category</h4>
          </div>
          <div class="card-body">
          <form class="form-inline" method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-group mb-2">
                
                <input type="text" readonly class="form-control-plaintext" value="Category Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">

                <input type="label" class="form-control" id="name" name="name" placeholder="{{$category->name}}">
            </div>
            <button type="add" class="btn btn-primary mb-2">Update</button>
            </form>
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