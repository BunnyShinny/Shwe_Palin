@extends('layouts.app', [ 'namePage' => 'Dashboard', 'class' => 'login-page
sidebar-mini ', 'activePage' => 'orderlist', 'backgroundImage' => asset('now') .
"/img/bg14.jpg", ]) @section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">Category</h4>
                    </div>
                    <div class="col-md-6 text-right">
                      
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
                                        Address
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Items
                                    </th>
                                    <th>
                                        Total Price
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp @foreach($orders as
                                $order)

                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>

                                    <td>
                                        <!-- {{$order->cart->totalQty}} -->
                                        @foreach ($order->cart->items as $item)
                                            {{$item['item']['name']}} <strong>x</strong> {{$item['qty']}}  Units<br>
                                        @endforeach
                                    </td>

                                    <td>{{$order->cart->totalPrice}} MMK</td>
                                    <td>
                                        <!-- <a
                                            href="{{route('orders.show',$order->id)}}"
                                            class="btn btn-info btn-sm btn-icon"
                                            ><i class="now-ui-icons travel_info"></i></a
                                        > -->
                                        <!-- <a
                                            href="{{route('orders.edit',$order->id)}}"
                                            class="btn btn-success btn-sm btn-icon"
                                            ><i class="now-ui-icons ui-2_settings-90"></i></a
                                        > -->
                                        <form
                                            method="POST"
                                            action="{{route('orders_confirm',$order->id)}}"
                                            style="display: inline-block;"
                                        >
                                            @csrf @method('PUT')
    
                                            <button
                                                type="submit"
                                                rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"
                                                onclick="return confirm('Are You Confirm')"
                                            >
                                            <i class="now-ui-icons ui-1_check"></i>
                                            </button>
                                        </form>
                                        <form
                                            method="POST"
                                            action="{{route('orders.destroy',$order->id)}}"
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
