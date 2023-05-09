@extends('layouts.waiter')
@section('content')

<title>View Cart</title>

<div class="row">
    <div class="table-responsive">
        
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th colspan="5">{{$order->orderID}}</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Food Name 食物名字</th>
                        <th>Quantity 数量</th>
                        <th>Price价钱 (RM per unit)</th>
                        <th>Subtotal共计 (RM)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cart -> fName}}</td>
                        <td>{{$cart -> quantity}}</th>
                        <td>{{number_format($cart -> fPrice,2)}}</td>
                        <td><span id="amount" name="amount">{{number_format(($cart -> quantity * $cart -> fPrice),2)}}</span></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Total共计 :</td>
                    <td><span id="total"></span></td>
                </tr>
                </tbody>
            </table>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script scr="text/javascript">
    $(document).ready(function () {
        var arr = document.getElementsByName('amount');
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].innerHTML))
                tot += parseFloat(arr[i].innerHTML);
        }
        document.getElementById('total').innerHTML = tot.toFixed(2);
    
    });

</script>

@endsection