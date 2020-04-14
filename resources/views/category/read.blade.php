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
            <h4 class="card-title">Category</h4>
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
                  <th colspan="2">
                    Action
                  </th> 
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($categories as $category)

                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$category->name}}</td>

                        <td>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Update</a>
                        </td>

                        <td>
                            <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Confirm')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach

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