<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
</head>

<body>
    <div class="receipt">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="logo text-center">
                        <a href="/">
                            <img src="frontend/img/shwe/logo.png" alt="">
                        </a>
                    </div>
                    <div class="receiptform">
                        <div class="second">
                            @if($data->branch_name)
                                <h3>Reservation Receipt</h3>
                            @else
                                <h3>Order Receipt</h3>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Date: <span>{{date("F j, Y",strtotime($data->created_at))}}</span></h4>
                                    <h4>Order ID: <span>{{$data->id}}</span></h4>
                                    <h4>Customer Number: <span>{{$data->phone}}</span></h4>
                                    @if($data->branch_name)
                                        <h4>Branch : <span>{{$data->branch_name}}</span></h4>
                                    @endif

                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        @if($containCart)
                        <div class="third">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->cart->items as $item)
                                    <tr>
                                        <td>{{$item['item']['name']}}</td>
                                        <td>{{$item['item']['price']}} Ks</td>
                                        <td>{{$item['qty']}}</td>
                                        <td>{{$item['item']['price'] * $item['qty']}} Ks</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Subtotal</td>
                                        <td>{{$data->cart->totalPrice}} Ks</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Discount</td>
                                        <td>{{$data->cart->totalPrice - 500 >= 3000 ? 500 : 0 }} Ks</td>
                                    </tr>
                                    @if(!$data->branch_name)
                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Delivery Fee</td>
                                        <td>500 Ks</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Total</td>
                                        <?php 
                                            $final_total = $data->cart->totalPrice;
                                            if(!$data->branch_name){
                                                $final_total += 500;
                                            }
                                            if($data->cart->totalPrice>=3000){
                                                $final_total -= 500;
                                            }
                                        ?>
                                        <td>{{$final_total}} Ks</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">Thank You!</h3>
                                <hr>
                            </div>
                        </div>
                        
                    </div>
                    

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


    </div>
</body>

</html>