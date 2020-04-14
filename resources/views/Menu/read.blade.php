@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'Menu',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
<a href="{{route('menu.create')}}" class="btn btn-info col-2 float-right" >Add New</a>
<div class="card">
          <div class="card-header">
            <h4 class="card-title"></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                 <th>
                    No.
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Category
                  </th>
                  <th>
                    Price
                  </th>
                  <th colspan="3">
                    Action
                  </th> 
                </thead>
                <tbody>
                    
                <tr>
                    <td>1</td>
                    <td>Chicken Puff</td>
                    <td>Puff</td>
                    <td>500ks</td>
                    <td>
                      <a href="" class="btn btn-warning">Detail</a>
                    </td>

                    <td>
                      <a href="" class="btn btn-primary">Update</a>
                    </td>

                    <td>
                      <form method="POST" action="">

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Confirm')">Delete</button>
                      </form>
                    </td>
                  </tr>

                </tbody>
              </table>
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