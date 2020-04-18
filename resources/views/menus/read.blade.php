@extends('layouts.app', [ 'namePage' => 'Dashboard', 'class' => 'login-page
sidebar-mini ', 'activePage' => 'Menu', 'backgroundImage' => asset('now') .
"/img/bg14.jpg", ]) @section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">Menu</h4>
                    </div>
                    <div class="col-md-6">
                      <a
                          href="{{ route('menus.create') }}"
                          class="btn btn-info col-2 float-right"
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
                                        Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp @foreach($menus as
                                $menu)

                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->category_name}}</td>
                                    <td>{{$menu->price}}</td>
                                    <td>
                                        <a
                                            href="{{route('menus.show',$menu->id)}}"
                                            class="btn btn-info btn-sm btn-icon"
                                            ><i class="now-ui-icons travel_info"></i></a
                                        >
                                        <a
                                            href="{{route('menus.edit',$menu->id)}}"
                                            class="btn btn-success btn-sm btn-icon"
                                            ><i class="now-ui-icons ui-2_settings-90"></i></a
                                        >
                                        <form
                                            method="POST"
                                            action="{{route('menus.destroy',$menu->id)}}"
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
