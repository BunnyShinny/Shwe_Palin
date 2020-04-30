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
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#new" data-toggle="tab">New</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#accepted" data-toggle="tab">Accepted</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#declined" data-toggle="tab">Declined</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content text-center">
                        <div class="tab-pane active" id="new">
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
                                                dicount
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
                                        @foreach($new_orders as $key => $order)

                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->phone}}</td>

                                            <td>
                                                <!-- {{$order->cart->totalQty}} -->
                                                @foreach ($order->cart->items as $item)
                                                    {{$item['item']['name']}} <strong>x</strong> {{$item['qty']}}  Units<br>
                                                @endforeach
                                            </td>
                                            
                                            <td>{{$order->discount}} MMK</td>
                                            <td>{{$order->cart->totalPrice - $order->discount +500}} MMK</td>
                                            <td>
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
                                                    action="{{route('orders_declined',$order->id)}}"
                                                    style="display: inline-block;"
                                                >
                                                    @csrf @method('PUT')
            
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="accepted">
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
                                                dicount
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accepted_orders as $key => $order)

                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->phone}}</td>

                                            <td>
                                                <!-- {{$order->cart->totalQty}} -->
                                                @foreach ($order->cart->items as $item)
                                                    {{$item['item']['name']}} <strong>x</strong> {{$item['qty']}}  Units<br>
                                                @endforeach
                                            </td>

                                            <td>{{$order->discount}} MMK</td>
                                            <td>{{$order->cart->totalPrice - $order->discount +500}} MMK</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="declined">
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
                                                dicount
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($declined_orders as $key => $order)

                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->phone}}</td>

                                            <td>
                                                <!-- {{$order->cart->totalQty}} -->
                                                @foreach ($order->cart->items as $item)
                                                    {{$item['item']['name']}} <strong>x</strong> {{$item['qty']}}  Units<br>
                                                @endforeach
                                            </td>

                                            <td>{{$order->discount}} MMK</td>
                                            <td>{{$order->cart->totalPrice - $order->discount +500}} MMK</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
