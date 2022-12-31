@extends('layouts.admin')
@section('content')
<title>View Order</title>

<table>
    <thead>
        <tr>
            {{$waiter->name}}
            <th>#</th>
            <th>OrderID</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="{{ url('viewCart',['orderID' => $order -> orderID]) }}">{{$order -> orderID}} </a></td>
            <td>{{$order -> amount}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection