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
    <h3 class="card-title">Add New Menu</h3>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <form class="" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" name="name">
              @error('name')
                <div class="alert text-danger">{{$message}}</div>
              @enderror 
            </div>
            <button type="add" class="btn btn-primary mb-2">Add</button>
            </form>
      </div>
      <div class="col-md-5">

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