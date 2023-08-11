@extends('layouts.waiter')
@section('content')
<title>Work</title>

<style>
    .card, #table {
        padding: 0;
        margin: 0;
        border-width: 2px !important; /* Adjust the value to set the desired border thickness */
    }
</style>

<h3 class="mb-2">Work 工作</h3>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="table-responsive border border-info" id="table">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Call Waiter 呼叫服务员</th>
                    </tr>
                    <tr>
                        <th class="text-center">Table ID 桌子编号</th>
                        <th class="text-center">Response 回应</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($works -> where('waiter', null) as $work)
                        <tr>
                            <td class="text-center">{{$work -> table_id}}</td>
                            <td class="text-center"><a href="{{ url('waiter/acceptWork',['id' => $work -> id])}}" class="btn btn-success">Accept接受</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <form action="{{ url('waiter/takeOrder') }}" method="POST">
        @csrf
        <div class="card border border-success">
            <div class="card-header">
                <h5 class="text-center text-uppercase card-title">Done Preparing Order 已完成订单</h5>
            </div>
            <div class="card-body row">
                @foreach($orders -> where('waiter', null)->sortByDesc('done_prepare_at') as $order)
                    <div class="col-md-4 mb-2">
                        <div class="card border border-dark order-card">
                            <div class="card-header d-flex justify-content-between p-1 m-1">
                                <h5 class="card-title">Table {{$order->table_id}}</h5>
                                <div class="d-flex justify-content-center card-text">
                                    <p class="mr-2">Waiter 服务员 :</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="orderID[]" value="{{ $order->orderID }}" id="orderCheckbox{{ $order->orderID }}" style="width: 16px; height: 16px;">
                                        <label class="form-check-label" for="orderCheckbox{{ $order->orderID }}"></label>
                                    </div>
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
            <div class="card-footer text-center" id="submitRow" style="display: none;">
                <button type="submit" class="btn btn-success">Take Order 拿取订单</button>
            </div>
        </div>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border border-dark">
            <div class="card-header">
                <h5 class="text-center text-uppercase card-title">Served Order 已送达订单</h5>
            </div>
            <div class="card-body row">
                @php
                    $borderColors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#00ffff'];
                    $index = 0;
                @endphp
                
                @foreach($orders->where('waiter', '!=', null)->sortByDesc('done_prepare_at')->take(6) as $order)
                    @php
                        $borderColor = $borderColors[$index % count($borderColors)];
                        $index++;
                    @endphp
                    <div class="col-md-4 mb-2">
                        <div class="card" style="border-color: {{$borderColor}}">
                            <div class="card-header d-flex justify-content-between p-1 m-1">
                                <h5 class="card-title">Table {{$order->table_id}}</h5>
                                <div class="d-flex justify-content-center card-text">
                                    <p class="mr-2">Waiter 服务员 : {{$order -> waiter}}</p>
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
        </div>
    </div>
</div>

<script>
    // Function to show or hide the submit button based on checkbox selection
    function toggleSubmitButton() {
        var checkboxes = document.querySelectorAll('input[name="orderID[]"]');
        var submitRow = document.getElementById('submitRow');

        var checked = Array.from(checkboxes).some(function (checkbox) {
            return checkbox.checked;
        });

        submitRow.style.display = checked ? '' : 'none';
    }

    // Attach event listener to checkboxes
    var checkboxes = document.querySelectorAll('input[name="orderID[]"]');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', toggleSubmitButton);
    });
</script>

<script>
    $(document).ready(function () {
        // Handle checkbox click event
        $('.form-check-input').on('change', function () {
            // Find the closest .order-card element to the clicked checkbox
            var card = $(this).closest('.order-card');

            // If the checkbox is checked, remove border-dark class and add border-success class
            // If the checkbox is unchecked, remove border-success class and add border-dark class
            if ($(this).prop('checked')) {
                card.removeClass('border-dark').addClass('border-success');
            } else {
                card.removeClass('border-success').addClass('border-dark');
            }
        });
    });
</script>


@endsection