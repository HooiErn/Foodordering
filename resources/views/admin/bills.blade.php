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
    <h1 class="h3 mb-0 text-gray-800">Bills Payment 账单支付</h1>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <input type="text" class="form-control form-control-inline mb-3" name="table_id" id="table_id" value="0" placeHolder="Enter Table ID 输入桌号">
    </div>
    <div class="col-md-3">
        <input type="date" class="form-control form-control-inline mb-3" name="date" id="date" value="{{ date('Y-m-d') }}" placeholder="Enter Date 输入日期">
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
                    </tr>
                </thead>
                <tbody id="ordersBody">
                    @foreach($orders -> where('is_paid', 0) as $order)
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
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Sum Price (RM) </td>
                        <td><span class="sum">RM 0.00</span></td>
                        <td>
                            <button class="btn btn-outline-success btn-sm" onclick="changeOrderStatusToPaid()"><i class="fas fa-fw fa-check"></i></button>
                            <button class="btn btn-outline-danger btn-sm" onclick="changeOrderStatusToUnPaid()"><i class="fas fa-fw fa-times"></i</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function getID(){
        const orderIDs = [];
        $('.order-id-input').each(function() {
            orderIDs.push($(this).val());
        });
        
        return orderIDs
    }
    
    function changeOrderStatusToPaid(){
        const url = "{{ url('admin/bill_check') }}"; // Add quotation marks here
        const data = {
            order_ids: getID(),
        };
    
        $.ajax({
            url: url,
            type: 'POST', // Use POST or GET as needed
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success("Orders has successfully marked as paid");
                
                setTimeout(function() {
                    window.location.reload(); // Reload the page
                }, 2000);
            },
            error: function(xhr) {
                toastr.error('Something went wrong. Please try again');
                
                setTimeout(function() {
                    window.location.reload(); // Reload the page
                }, 2000);
            }
        });
    }
    
    function changeOrderStatusToUnPaid(){
        const url = "{{ url('admin/bill_uncheck') }}"; // Add quotation marks here
        const data = {
            order_ids: getID(),
        };
    
        $.ajax({
            url: url,
            type: 'POST', // Use POST or GET as needed
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success("Orders has successfully marked as unpaid");
                
                setTimeout(function() {
                    window.location.reload(); // Reload the page
                }, 2000);
            },
            error: function(xhr) {
                toastr.error('Something went wrong. Please try again');
                
                setTimeout(function() {
                    window.location.reload(); // Reload the page
                }, 2000);
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        var $ordersBody = $('#ordersBody');
        
        if (localStorage.getItem("table_id") !== null) {
            $('#table_id').val(localStorage.getItem("table_id"));
        }
        if (localStorage.getItem("date") !== null) {
            $('#date').val(localStorage.getItem("date"));
        }

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

        $('#table_id').on('input change', function() {
            localStorage.setItem("table_id", $(this).val());
            applyFilters();
            calculateSum();
        });
        
        $('#date').on('change', function() {
            localStorage.setItem("date", $(this).val());
            applyFilters();
            calculateSum();
        });
    
        // Event listener for clearSearch button
        $('#clearSearch').on('click', function() {
            $('#table_id').val(0);
            $('#date').val('{{ date('Y-m-d') }}');
            applyFilters();
            calculateSum();
            localStorage.clear()
        });
    
        // Event listener for clearDate button
        $('#clearAll').on('click', function() {
            $('#table_id').val('');
            $('#date').val('');
            applyFilters();
            calculateSum();
            localStorage.clear()
        });
        
        function applyFilters() {
            var tableIdInput = $('#table_id').val();
            var dateInput = $('#date').val();
        
            // Clear the orders table body
            $ordersBody.empty();
        
            @foreach($orders -> where('is_paid', 0) as $order)
                @php
                    $orderTableId = $order->table_id;
                    $orderDate = $order->created_at->format('Y-m-d');
                @endphp
        
                // Check if the order's attributes match the user input
                if (
                    ("{{ $orderTableId }}" === tableIdInput || tableIdInput === '') &&
                    ("{{ $orderDate }}" === dateInput || dateInput === '')
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
                        </tr>
                    `);
                }
            @endforeach;
            $ordersBody.append(`
                <tr>
                    <td colspan="3" class="text-right">Sum Price (RM) </td>
                    <td><span class="sum">RM 0.00</span></td>
                    <td>
                        <button class="btn btn-outline-success btn-sm" onclick="changeOrderStatusToPaid()"><i class="fas fa-fw fa-check"></i></button>
                        <button class="btn btn-outline-danger btn-sm" onclick="changeOrderStatusToUnPaid()"><i class="fas fa-fw fa-times"></i</button>
                    </td>
                </tr>
            `);
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