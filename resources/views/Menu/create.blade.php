<!-- CSS here -->
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="frontend/css/magnific-popup.css">
<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
<link rel="stylesheet" href="frontend/css/themify-icons.css">
<link rel="stylesheet" href="frontend/css/gijgo.css">
<link rel="stylesheet" href="frontend/css/nice-select.css">
<link rel="stylesheet" href="frontend/css/flaticon.css">
<link rel="stylesheet" href="frontend/css/slicknav.css">

<link rel="stylesheet" href="frontend/css/style.css">
<link rel="stylesheet" href="frontend/css/custom.css">
<!-- <link rel="stylesheet" href="frontend/css/responsive.css"> -->

@extends('layouts.app', [
'namePage' => 'Dashboard',
'class' => 'login-page sidebar-mini ',
'activePage' => 'Menu',
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
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" id="price" name="price">
            @error('price')
              <div class="alert text-danger">{{$message}}</div>
            @enderror 
          </div>
          <div class="form-group">
            <label for="inputState">Choose Category</label>
            <select class="form-control" id="category" name="category_id">
              

              @foreach($categories as $category)

              <option value="{{$category->id}}">{{$category->name}}</option>

              @endforeach
            </select>
          </div>
          <div class="form-group">
            <textarea rows="1" class="form-control @error('description') is-invalid @enderror" cols="50" placeholder="Description" id="description"
              name="description"></textarea>
              @error('description')
              <div class="alert text-danger">{{$message}}</div>
            @enderror 

          </div>
          <div>
            <input type="file" class="@error('image') is-invalid @enderror" name="image">
            @error('image')
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
  $(document).ready(function () {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>
@endpush