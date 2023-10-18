@extends('layouts.admin')
@section('content')

<title>View Cart</title>

<div class="row">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr class="thead-dark">
                    <th colspan="6">{{$order->orderID}}</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Price(RM per unit)</th>
                    <th>Addon</th>
                    <th>Subtotal(RM)</th>
                </tr>
            </thead>
            <tbody>
            @foreach($carts -> where('orderID', $order -> orderID) as $cart)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cart -> name}}</td>
                    <td>{{$cart -> quantity}}</th>
                    <td>{{number_format($cart -> price,2)}}</td>
                    <td>@php
                                $originalPrice = $cart->price * $cart->quantity;
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
                <td colspan="4" class="text-right">Total :</td>
                <td><b><span id="total"></span></b></td>
            </tr>
            </tbody>
        </table>
    </div>
    
    <div class="col-md-5"></div>
    <div class="col-md-2">
        <button class="btn btn-primary btn-block" onclick="window.history.back()"><i class="fas fa-arrow-left"></i> Go Back</button>
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