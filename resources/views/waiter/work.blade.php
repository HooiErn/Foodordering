@extends('layouts.waiter')
@section('content')
<title>Work</title>

<h3 class="mb-2">Work 工作</h3>
<div class="row">
    <div class="table-responsive ml-1 mr-1">
        <table class="table table-hover table-bordered">
           
                <tr style="background-color:blue; color:white;">
                    <th><center>Table ID 桌子编号</center></th>
                    <th><center>Action 行动</center></th>
                </tr>
           
            <tbody>
             @foreach($works -> where('waiter', null) as $work)
            <tr>
                <td><center>{{$work -> table_id}}</center></td>
                <td><center><a href="{{ url('waiter/acceptWork',['id' => $work -> id])}}" class="btn btn-success">Accept接受</a></center></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<h3 class="mt-2 mb-2">Done Preparing Food 已完成食物</h3>

<div class="row">
    @foreach($orders ->where('waiter', null)->sortByDesc('done_prepare_at') as $order)
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between m-1 p-1">
                    <h5 class="card-title">Table {{$order->table_id}}</h5>
                    <a class="btn btn-success btn-sm" href="{{ url('waiter/orderDetail', ['id' => $order -> orderID]) }}"><i class="fas fa-check"></i></a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                    <li class="list-group-item p-1 mb-0 ml-1 mr-0 mt-0 border-0">{{$cart->name}} <span class="badge bg-primary rounded-pill">x{{$cart->quantity}}</span></li>
                    @endforeach
                </ul>
                <div class="card-body p-1 m-1">
                    <p class="card-text p-0 m-0">Order Time: {{ date('g:i A', strtotime($order->created_at)) }}</p>
                    <p class="card-text p-0 m-0">Done Preparing Time: {{ date('g:i A', strtotime($order->done_prepare_at)) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($orders->where('waiter','!=', null)->sortByDesc('serve_time')->take(6) as $order)
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between m-1 p-1">
                    <h5 class="card-title">Table {{$order->table_id}}</h5>
                    <p class="card-text">Waiter : {{$order -> waiter}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                    <li class="list-group-item p-1 mb-0 ml-1 mr-0 mt-0 border-0">{{$cart->name}} <span class="badge bg-primary rounded-pill">x{{$cart->quantity}}</span></li>
                    @endforeach
                </ul>
                <div class="card-body p-1 m-1">
                    <p class="card-text p-0 m-0">Order Time: {{ date('g:i A', strtotime($order->created_at)) }}</p>
                    <p class="card-text p-0 m-0">Done Preparing Time: {{ date('g:i A', strtotime($order->done_prepare_at)) }}</p>
                    <p class="card-text p-0 m-0">Serve Time: {{ date('g:i A', strtotime($order->serve_time)) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection