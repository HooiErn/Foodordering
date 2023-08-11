@extends('layouts.kitchen')
@section('content')

<title>Taken Order</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Confirmed Order</h1>
</div>

<div class="row">
    <div class="col-12">
        <h2 class="text-center">Orders Yet to be Prepared 未备好的订单列表</h2>
    </div>
    @foreach($orders->where('status', 0)->sortBy('created_at') as $order)
        <div class="col-md-4 mb-2">
            <div class="card border border-dark">
                <div class="card-header d-flex justify-content-between p-1 m-1">
                    <h5 class="card-title">Table {{$order->table_id}} {{$order -> orderID}}</h5>
                    <div>
                        
                    <!--<a class="btn btn-primary btn-sm text-white" href="{{ url('kitchen/printReceipt', ['id' => $order->orderID]) }}" target="_blank">Print</a>-->
                    <a class="btn btn-success btn-sm" href="{{ url('kitchen/donePreparing', ['id' => $order->id]) }}"><i class="fas fa-check m-0 p-0"></i></a>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                        <li class="list-group-item p-1 mb-0 ml-1 mr-0 mt-0 border-0">{{$cart->name}} <span class="badge bg-primary rounded-pill text-white">x{{$cart->quantity}}</span></li>
                        @if(!empty($cart->addon))
                            @php
                                $addons = json_decode($cart->addon, true);
                            @endphp
                            <ul style="list-style-type: disc; margin: 0;">
                                @foreach($addons as $title => $addon)
                                    @if($addon !== null)
                                        <li>{{$title}} - {{$addon}}</li>
                                    @endif
                                @endforeach
                            </ul>   
                        @endif
                    @endforeach
                </ul>
                <div class="card-body p-1 m-1">
                    <p class="card-text p-0 m-o">Selection : {{ $order->selection == 1 ? 'Dive In 堂食' : 'Take Away 外带' }}</p>
                    <p class="card-text p-0 m-0">Order Time: {{$order -> created_at -> format('Y-m-d')}} {{ date('g:i A', strtotime($order->created_at)) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<hr style="border: none; border-top: 2px solid black;">
<hr style="border: none; border-top: 2px solid black;">

<div class="row ">
    <div class="col-12">
        <h2 class="text-center">Orders Already Prepared 已备好的订单列表</h2>
    </div>
    @foreach($orders->where('status', 1)->sortByDesc('done_prepare_at')->take(6) as $order)
        <div class="col-md-4 mb-2">
            <div class="card border border-dark">
                <div class="card-header d-flex justify-content-between p-1 m-1">
                    <h5 class="card-title">Table {{$order->table_id}}</h5>
                    <p class="card-text">Waiter 服务员 :
                        @if($order->waiter != null)
                            {{$order->waiter}}
                        @else
                            <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="No waiter assigned"><i class="fas fa-exclamation-circle"></i></button>
                        @endif
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                        <li class="list-group-item p-1 mb-0 ml-1 mr-0 mt-0 border-0">{{$cart->name}} <span class="badge bg-primary rounded-pill text-white">x{{$cart->quantity}}</span></li>
                        @if(!empty($cart->addon))
                            @php
                                $addons = json_decode($cart->addon, true);
                            @endphp
                            <ul style="list-style-type: disc; margin: 0;">
                                @foreach($addons as $title => $addon)
                                    @if($addon !== null)
                                        <li>{{$title}} - {{$addon}}</li>
                                    @endif
                                @endforeach
                            </ul>   
                        @endif
                    @endforeach
                </ul>
                <div class="card-body p-1 m-1">
                    <p class="card-text p-0 m-o">Selection : {{ $order->selection == 1 ? 'Dive In 堂食' : 'Take Away 外带' }}</p>
                    <p class="card-text p-0 m-0">Order Time: {{$order->created_at->format('Y-m-d')}} {{date('g:i A', strtotime($order->created_at))}}</p>
                    <p class="card-text p-0 m-0">Done Preparing Time: {{Carbon\Carbon::parse($order->done_prepare_at)->format('Y-m-d')}} {{date('g:i A', strtotime($order->done_prepare_at))}}</p>
                    @if($order->waiter != null)
                        <p class="card-text p-0 m-0">Serve Time: {{Carbon\Carbon::parse($order->serve_time)->format('Y-m-d')}} {{date('g:i A', strtotime($order->serve_time))}}</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection