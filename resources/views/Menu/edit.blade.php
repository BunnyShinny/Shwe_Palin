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
            <h4 class="card-title">Add New Menu</h4>
          </div>
          <div class="card-body">
          <form class="form-inline" method="POST" action="{{route('menu.update',$menu->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="form-row">
                <div class="col">
                <input type="text" class="" value="{{$menu->name}}" id="name" name="name">
                </div>
                <div class="col">
                <input type="text" class="" value="{{$menu->price}}" id="price" name="price">
                </div>
                <div class="col">
                    
                    <select class="" id="category" name="category_id">
                      <option>Choose Category</option>

                    @foreach($categories as $category)
                
                        <option value="{{$category->id}}"
                        @php
                        if($category->id==$menu->category_id)
                        echo 'selected'
                        @endphp
                        >{{$category->name}}</option>
                        
                    @endforeach
                    
                    </select>
                </div>
                <div class="col">
                    <textarea   rows="1" cols="50" placeholder="" id="description" name="description">{{$menu->description}}</textarea>
                </div>
                <div class="col">
                    <input type="file"  name="image" >
                </div>
                <button type="add" class="btn btn-primary mb-2">Update</button>
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