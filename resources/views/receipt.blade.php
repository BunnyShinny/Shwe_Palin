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
    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/css/themify-icons.css">
    <link rel="stylesheet" href="frontend/css/gijgo.css">
    <link rel="stylesheet" href="frontend/css/nice-select.css">
    <link rel="stylesheet" href="frontend/css/flaticon.css">
    <link rel="stylesheet" href="frontend/css/slicknav.css">

    <link rel="stylesheet" href="frontend/css/style.css">
    <link rel="stylesheet" href="frontend/css/custom.css">
    <!-- <link rel="stylesheet" href="frontend/css/responsive.css"> -->
</head>

<body>
    <div class="receipt">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <div class="receiptform">
                        <div class="first">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">Thank You!</h3>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="second">
                            <h3>Order Receipt</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Date: <span>{{date("F j, Y, g:i a",strtotime($order->created_at))}}</span></h4>
                                    <h4>Order ID: <span>{{$order->id}}</span></h4>
                                    <h4>Customer Number: <span>{{$order->phone}}</span></h4>

                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="third">
                            <!-- <div class="row">
                                <div class="col-md-4">
                                    <h4 class="font-weight-bold">Description</h4>
                                    <h5>Bayar Kyaw</h5>
                                    <h5>Samu zar</h5>
                                    <h5>Samu zar</h5>
                                    <h5>Samu zar</h5>
                                    <h4 class="font-weight-bold">Total</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="font-weight-bold">Price</h4>
                                    <h5>250 Ks</h5>
                                    <h5>250 Ks</h5>
                                    <h5>250 Ks</h5>
                                    <h5>250 Ks</h5>
                                    <h4 class="font-weight-bold">100000 Ks</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 class="font-weight-bold">Qty</h4>
                                    <h5>3</h5>
                                    <h5>3</h5>
                                    <h5>3</h5>
                                    <h5>3</h5>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="font-weight-bold">Total</h4>
                                    <h5>750 Ks</h5>
                                    <h5>750 Ks</h5>
                                    <h5>750 Ks</h5>
                                    <h5>750 Ks</h5>
                                </div>
                            </div> -->
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
                                    @foreach($order->cart->items as $item)
                                    <tr>
                                        <td>{{$item['item']['name']}}</td>
                                        <td>{{$item['item']['price']}} Ks</td>
                                        <td>{{$item['qty']}}</td>
                                        <td>{{$item['item']['price'] * $item['qty']}} Ks</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row"></th>
                                        <td colspan="2">Total</td>
                                        <td>{{$order->cart->totalPrice}} Ks</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="text-center"><a href="foodmenu" class="btn btn-sm btn-primary">Back to Home</a></p>
                        
                    </div>
                    

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


    </div>
</body>

</html>