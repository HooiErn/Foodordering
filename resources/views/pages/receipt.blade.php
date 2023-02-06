<style>
.ticket {
  background-color: lightgrey;
  width: 140px;
  border: 5px solid black;
  padding: 50px;
  margin: 20px;
}


</style>

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
           <br><br><br><br><br><br>
       
        <div id="invoice-POS">
            <div class="ticket">
                @if($order -> payment_method == 2)
                    <div id="extra">
                        <div>
                            &nbsp;&nbsp;&nbsp; 
                            <img src="{{ asset('images/')}}/{{$qrcode -> qrcode}}" style="width:70px; height:70px; float:right;">
                            <p style="color:blue;  float:right;">Pay Here
                        </div>
                    </div>
                @endif
       
           &nbsp;&nbsp;&nbsp; <p class="centered">RECEIPT</p>
              
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
                        <td class="price"> {{number_format($cart -> fPrice,2)}}</td>
                        <td class="price">{{number_format($cart->quantity * $cart->fPrice,2)}}</td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td></td>
                        <td class="quantity"></td>
                        <td class="name"></td>
                        <td class="text-right"><b>Total:</b></td>
                        <td><b>{{number_format($order->amount,2)}}</b></td>
                    </tr>
                    
                    <tr>
                        <td class="text-right"><b>Pay</b></td>
                        <td class="text-right"><b>By:</b></td>
                        @if($order -> payment_method == 1)
                        <td class="text-right" style="width:30%"><b><span>Cash</span></b></td>
                        @elseif($order -> payment_method ==2)
                        <td class="text-right" style="width:30%"><b><span>Touch 'n Go</span></b></td>
                        @endif
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