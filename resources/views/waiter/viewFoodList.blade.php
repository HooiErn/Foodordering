@extends('layouts.waiter')
@section('content')

<title>View Cart</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">{{ Auth::user()->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $order->orderID }}</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th colspan="6">{{$order->orderID}}</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Food Name 食物名字</th>
                        <th>Quantity 数量</th>
                        <th>Price价钱 (RM per unit)</th>
                        <th>Addon</th>
                        <th>Subtotal共计 (RM)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cart -> fName}}</td>
                        <td>{{$cart -> quantity}}</td>
                        <td>{{number_format($cart -> fPrice,2)}}</td>
                        <td>  @php
                                $originalPrice = $cart->fPrice * $cart->quantity;
                                $addonPrice = 0;
                                if (!empty($cart->addon)) {
                                    $addons = json_decode($cart->addon, true);
                                    foreach ($addons as $title => $addon) {
                                        if (is_array($addon) && isset($addon['name']) && isset($addon['price']) && $addon['price'] > 0) {
                                            $addonPrice += $addon['price'] * $cart->quantity;
                                        }
                                    }
                                }
                                $totalPrice = $originalPrice + $addonPrice;
                            @endphp
                            {{number_format($addonPrice, 2)}}
                        </td>
                        <td><span id="amount" name="amount">{{number_format($totalPrice, 2)}}</span></td>
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