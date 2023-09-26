@extends('layouts.admin')
@section('content')

<style>
    .hoverable-row:hover {
        background-color: #f0f0f0;
        cursor: pointer; 
    }
</style>

<title>Bill</title>

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">All Bills (Filter by Date) 全部账单 (按日期过滤)</h1>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 mb-2">
        <button class="btn btn-primary btn-block" onclick="history.back();">Back</button>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Table ID</th>
                        <th>Cart</th>
                        <th>Pay By</th>
                        <th>Total Price (RM)</th>
                        <th>Create Date And Time</th>
                        <th>Paid Status</th>
                    </tr>
                </thead>
                <tbody id="ordersBody">
                    @foreach($orders->sortBy('created_at') as $order)
                        <tr class="hoverable-row">
                            <td>
                                {{$order -> table_id}}
                            </td>
                            <td>
                                <ul style="list-style-type: none;" class="m-0 p-0">
                                    @foreach($carts->where('orderID', $order->orderID) as $cart)
                                        <li>
                                            @if(isset($cart->name) && $cart->name)
                                                {{$cart->name}} &nbsp;<span class="text-info"> x{{$cart->quantity}}</span>
                                            @else
                                                <span class="text-danger">Food has been deleted 食物已经被删除</span>
                                            @endif
                                        </li>
                                        
                                        @if(!empty($cart->addon))
                                            @php
                                                $addons = json_decode($cart->addon, true);
                                            @endphp
                                            <ul style="list-style-type: disc; margin: 0;">
                                                @foreach($addons as $title => $addon)
                                                    @if (is_array($addon) && isset($addon['name']) && isset($addon['price']))
                                                        <li>{{$title}} - {{$addon['name']}}</li>
                                                    @endif
                                                @endforeach
                                            </ul>   
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td>@if($order -> payment_method == 1)
                                    Cash 现金
                                @elseif($order -> payment_method == 2)
                                    Touch 'n Go 线上支付
                                @endif
                            </td>
                            <td class="order-amount">RM {{number_format($order -> amount,2)}}</td>
                            <td>{{$order -> created_at->format('Y-m-d')}} &nbsp; {{ $order->created_at->format('h:i A') }}</td>
                            <td>
                                @if($order -> is_paid == 1)
                                    <span class="text-success">Success</span>
                                @else($order -> is_paid == 2)
                                    <span class="text-danger">Fail</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Sum Price (RM) </td>
                        <td colspan="3"><span class="sum">RM 0.00</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var $ordersBody = $('#ordersBody');
        
        function calculateSum() {
            var sum = 0;
    
            // Loop through the rows and sum up the order amounts
            $ordersBody.find('.order-amount').each(function() {
                var amountText = $(this).text().trim(); // Remove leading/trailing spaces
                var amountValue = parseFloat(amountText.replace('RM', '')); // Remove "RM" and parse
                sum += amountValue;
            });
            
            $ordersBody.find('.sum').each(function(){
                $(this).text('RM ' + sum.toFixed(2)); 
            })
        }
        calculateSum();
    });
</script>

@endsection