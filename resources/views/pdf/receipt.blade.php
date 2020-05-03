<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
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
        <div class="row">
            <div class="col">
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
                            <td colspan="2">Total</td>
                            <td>{{$data->cart->totalPrice}} Ks</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>