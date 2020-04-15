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
      <div class="col-md-12">
        <div class="card">
        
          <div class="card-header">
        
            <h4 class="card-title">{{$menu->name}}'s Detail Information</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Creation Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Creation Date</th>
                </tr>
              </tfoot>
              <tbody>
                                  <tr>
                    <td>
                      <span class="avatar avatar-sm rounded-circle">
                        <a href="{{asset($menu->image)}}"><img src="{{asset($menu->image)}}" alt="" style="max-width: 80px; border-radiu: 100px"></a>
                      </span>
                    </td>
                    <td>{{$menu->name}}</td>
                    <td>{{$menu->price}} Kyats</td>
                    <td>{{$menu->description}}</td>
                    <td>{{$menu->created_at}}</td>
                  </tr>
                              </tbody>
            </table>
          </div>
          <!-- end content-->
        
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    
    <!-- end row -->
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