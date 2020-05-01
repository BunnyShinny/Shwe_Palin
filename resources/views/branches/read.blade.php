@extends('layouts.app', [ 'namePage' => 'Dashboard', 'class' => 'login-page
sidebar-mini ', 'activePage' => 'Branch', 'backgroundImage' => asset('now') .
"/img/bg14.jpg", ]) @section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">Branch Offices</h4>
                    </div>
                    <div class="col-md-6 text-right">
                      <a
                          href="{{ route('branches.create') }}"
                          class="btn btn-info"
                          >Add New</a
                      >
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Name
                                    </th>                                  
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Open Hours
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp @foreach($branches as
                                $branch)

                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>
                                        <a href="{{asset($branch->image)}}"><img src="{{asset($branch->image)}}" alt="" style="max-width: 232px; border-radiu: 232px"></a>
                                    </td>
                                    <td>{{$branch->name}}</td>
                                    <td>{{$branch->address}}</td>
                                    <td>{{$branch->phone}}</td>
                                    <td>{{$branch->open_hour}}</td>
                                    <td>
                                        <a
                                            href="{{route('branches.edit',$branch->id)}}"
                                            class="btn btn-success btn-sm btn-icon"
                                            ><i class="now-ui-icons ui-2_settings-90"></i></a
                                        >
                                        <form
                                            method="POST"
                                            action="{{route('branches.destroy',$branch->id)}}"
                                            style="display: inline-block;"
                                        >
                                            @csrf @method('DELETE')
    
                                            <button
                                                type="submit"
                                                rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon"
                                                onclick="return confirm('Are You Confirm')"
                                            >
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php $i++; @endphp @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('js')
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
@endpush
