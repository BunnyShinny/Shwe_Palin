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
            <h4 class="card-title">Add New Menu</h4>
          </div>
          <div class="card-body">
          <form class="form-inline" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
          @csrf
          
            <div class="form-row">
                <div class="col">
                <input type="text" class="" placeholder="Name" id="name" name="name">
                </div>
                <div class="col">
                <input type="text" class="" placeholder="Price" id="price" name="price">
                </div>
                <div class="col">
                    
                    <select class="" id="category" name="category_id">
                      <option>Choose Category</option>

                    @foreach($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>
                        
                    @endforeach
                    
                    </select>
                </div>
                <div class="col">
                    <textarea   rows="1" cols="50" placeholder="Description" id="description" name="description"></textarea>
                </div>
                <div class="col">
                    <input type="file"  name="image" >
                </div>
                <button type="add" class="btn btn-primary mb-2">Add</button>
            </div>
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