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
                        <th class="name">Name</th>
                        <th class="price">Price per unit(RM)</th>
                        <th class="price">Subtotal(RM)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="quantity" style="text-align:center;">{{$cart -> quantity}}</td>
                        <td class="name">{{$cart -> fName}}</td>
                        <td class="price">{{number_format($cart -> fPrice,2)}}</td>
                        <td class="price">{{number_format($cart->quantity * $cart->fPrice,2)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Pay By:</td>
                        <td><span id="paymentName"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="quantity"></td>
                        <td class="name"></td>
                        <td class="text-right">Total:</td>
                        <td>{{number_format($order->amount,2)}}</td>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                let number = localStorage.getItem("paymentMethod");
                if(number == 1){
                    $("span[id='paymentName']").html("Cash");
                }
                if(number == 2){
                    $("span[id='paymentName']").html("Touch 'n Go");
                }
            })
        </script>
    </body>
</html>