@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'Category',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
<div class="card">
          <div class="card-header">
            <h4 class="card-title">Add New Category</h4>
          </div>
          <div class="card-body">
          <form class="form-inline" method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group mb-2">
                
                <input type="text" readonly class="form-control-plaintext"value="Category Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">

                <input type="label" class="form-control" id="name" name="name" >
            </div>
            <button type="add" class="btn btn-primary mb-2">Add</button>
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