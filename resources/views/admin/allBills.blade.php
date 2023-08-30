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
    <h1 class="h3 mb-0 text-gray-800">All Bills 全部账单</h1>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <input type="date" class="form-control form-control-inline mb-3" name="from_date" id="from_date" value="{{ date('Y-m-d') }}" >
    </div>
    <div class="col-md-3">
        <input type="date" class="form-control form-control-inline mb-3" name="to_date" id="to_date" value="{{ date('Y-m-d') }}">
    </div>
    <div class="col-md-1">
        <a href="#" class="btn btn-secondary btn-block" id="clearSearch"><i class="fas fa-undo"></i></a>
    </div>
    <div class="col-md-1">
        <a href="#" class="btn btn-danger btn-block" id="clearAll"><i class="fas fa-times-circle"></i></a>
    </div>
    <div class="col-md-2"></div>
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var $ordersBody = $('#ordersBody');
        
        if (localStorage.getItem("allbill_from_date") !== null) {
            $('#from_date').val(localStorage.getItem("allbill_from_date"));
        }
        if (localStorage.getItem("allbill_to_date") !== null) {
            $('#to_date').val(localStorage.getItem("allbill_to_date"));
        }

        $('#from_date').on('change', function() {
            localStorage.setItem("allbill_from_date", $(this).val());
            applyFilters();
        });
        
        $('#to_date').on('change', function() {
            localStorage.setItem("allbill_to_date", $(this).val());
            applyFilters();
        });
    
        // Event listener for clearSearch button
        $('#clearSearch').on('click', function() {
            $('#from_date').val('{{ date('Y-m-d') }}');
            $('#to_date').val('{{ date('Y-m-d') }}');
            applyFilters();
            localStorage.clear();
        });
    
        // Event listener for clearDate button
        $('#clearAll').on('click', function() {
            $('#from_date').val('');
            $('#to_date').val('');
            applyFilters();
            localStorage.clear();
        });
        
        function applyFilters() {
            var fromDateInput = $('#from_date').val();
            var toDateInput = $('#to_date').val();
        
            // Clear the orders table body
            $ordersBody.empty();
        
            @foreach($orders->sortBy('created_at') as $order)
                @php
                    $orderDate = $order->created_at->format('Y-m-d');
                @endphp
        
                // Check if the order's attributes match the user input
                if (
                    ("{{ $orderDate }}" >= fromDateInput || fromDateInput === '') &&
                    ("{{ $orderDate }}" <= toDateInput || toDateInput === '')
                ) {
                    $ordersBody.append(`
                        <tr class="hoverable-row">
                            <td>
                                {{$order -> table_id}}
                                <input type="hidden" class="order-id-input" id="orderID" name="orderID" value="{{$order -> orderID}}">
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
                    `);
                }
            @endforeach;
        }

        applyFilters();
        calculateSum();
    });
</script>

<script>
    // JavaScript to handle click event and open the modal
    $(document).ready(function() {
        $('.tng-span').on('click', function() {
            $('#tng').modal('show');
        });
    });
</script>

@endsection