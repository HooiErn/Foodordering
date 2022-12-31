@extends('layouts.admin')
@section('content')
<title>View Cart</title>

<table>
    <thead>
        <tr>
            {{$order->orderID}}
            <th>#</th>
            <th>Food Name</th>
            <th>Quantity</th>
            <th>Price(per unit)</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carts as $cart)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cart -> fName}}</td>
            <td>{{$cart -> quantity}}</th>
            <td>{{$cart -> fPrice}}</td>
            <td>{{$cart -> quantity * $cart -> fPrice}}</td>
        @endforeach
            <td>Total: </td>
            <td>{{$order->amount}}</td>
        </tr>
        
    </tbody>
</table>
@endsection