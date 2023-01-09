<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>Receipt</title>
    </head>
    <body>
        <div id="invoice-POS">
        <div class="ticket">
            <p class="centered">RECEIPT</p>
               
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="quantity">Qty</th>
                        <th class="description">Description</th>
                        <th class="price">Price per unit(RM)</th>
                        <th class="price">Subtotal(RM)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="quantity" style="text-align:center;">{{$cart -> quantity}}</td>
                        <td class="description">{{$cart -> fName}}</td>
                        <td class="price">{{$cart -> fPrice}}</td>
                        <td class="price">{{$cart->quantity * $cart->fPrice}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td class="quantity"></td>
                        <td class="description"></td>
                        <td>Total</td>
                        <td>RM {{$order->amount}}</td>
                    </tr>   
                </tbody>
            </table>
            <br>
            <center>
        <div>
        {{QrCode::generate($order->orderID)}}
        </div>
        <center>
            <p class="centered">Thanks for your purchase!
        </div>
            <br>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script src="{{ asset('js/script.js') }}"></script>
        </div>
    </body>
</html>