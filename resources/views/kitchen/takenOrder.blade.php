@extends('layouts.kitchen')
@section('content')

<title>Taken Order</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Confirmed Order</h1>
</div>

<div class="row">
    @foreach($orders->where('status', 0)->sortBy('created_at') as $order)
        <div class="col-md-4 mb-2">
            <div class="card border border-dark">
                <div class="card-header d-flex justify-content-between p-1 m-1">
                    <h5 class="card-title">Table {{$order->table_id}}</h5>
                    <a class="btn btn-success btn-sm" href="{{ url('kitchen/donePreparing', ['id' => $order->id]) }}"><i class="fas fa-check m-0 p-0"></i></a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                    <li class="list-group-item p-1 mb-0 ml-1 mr-0 mt-0 border-0">{{$cart->name}} <span class="badge bg-primary rounded-pill text-white">x{{$cart->quantity}}</span></li>
                    @endforeach
                </ul>
                <div class="card-body p-1 m-1">
                    <p class="card-text p-0 m-0">Order Time: {{ date('g:i A', strtotime($order->created_at)) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection