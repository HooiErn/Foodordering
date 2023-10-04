@extends('layouts.admin')
@section('content')
<title>View Order</title>

<style>
    #orderID{
        text-decoration:none;
    }
    .inline{
        display: inline; 
       
    }
    .inline2{
        display:inline;
        float:right;
    }
    .table{
        margin-left: auto;
        width:80% !important;
        height:80% !important;
        font-size:11px !important;

    }
    .table th{
        padding:6px;
    }
    .table td{
        padding:5px !important;
    }
    tr:nth-child(even){
        background-color: #f2f2f2
        }
     

</style>

<form action="{{ url('admin/searchDate') }}" method="POST">
    @csrf
    <br>
    <input type="hidden" class="form-control" value="{{$waiter -> name}}" name="name" id="name">
        <div class="d-flex align-items-center justify-content-center" style="font-size:13px;">
            <label for="date" class="col-form-label">From: </label>
            <div class="col-sm-3">
                <input type="date" class="form-control-sm input-sm" id="from" name="from" value="{{ $fromDate }}" required>
            </div>
            <label for="date" class="col-form-label">To: </label>
            <div class="col-sm-3">
                <input type="date" class="form-control-sm input-sm" id="to" name="to" value="{{ $toDate }}" required>
            </div>
            <div>
                <a href="{{ url('/viewOrder', ['name' => $waiter -> name]) }}" class="btn btn-sm btn-danger" onclick="clearLocalStorage()" style="text-decoration: none;">Default</a>
                <button type="submit" class="btn btn-sm btn-primary" name="search" title="Search"><i class="fas fa-search"></i></button>
            </div>  
        </div>  
</form>

<br>

<div class="row">
    <div class="table-responsive" style="width:80%;height:720px;">
        
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="thead-dark" style="position: sticky; top: 0;">
                        <th colspan="7">
                            <div class="inline">{{$waiter->name}} </div>
                            <div class="inline2">Total : <span id="total"></span></div>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>OrderID</th>
                        <th>Cash</th>
                        <th>Touch 'n Go</th>
                        <th>Created Date</th>
                        <th>Order Time</th>
                        <th>Order Completed</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders ->where("status",1) as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{ url('admin/viewFoodList',['orderID' => $order -> orderID]) }}" id="orderID">{{$order -> orderID}} </a></td>
                        @if($order -> payment_method == 1)
                            <td><span id="amount" name="cashAmount">{{number_format($order -> amount,2)}}</span></td>
                            <td><span>-</span></td>
                        @elseif ($order -> payment_method == 2)
                            <td><span>-</span></td>
                            <td><span id="amount" name="touchAmount">{{number_format($order -> amount,2)}}</span></td>
                        @endif
                        <td>{{$order -> created_at -> format('d/m/Y')}}</td>
                        <td>{{$order -> created_at -> format('H:i:s')}}</td>
                        <td>{{ \Carbon\Carbon::parse($order->serve_time)->format('H:i:s') }}</td>    
                    </tr>
                @endforeach 
                <tr>
                    <td colspan="2"></td>
                    <td><b><span id="cashTotal"></span></b></td>
                    <td><b><span id="touchTotal"></span></b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script scr="text/javascript">
    $(document).ready(function () {
        var cash = document.getElementsByName('cashAmount');
        var touch = document.getElementsByName('touchAmount');
        var cashTot = 0.00;
        var touchTot = 0.00;
        for(var i=0;i<cash.length;i++){
            if(parseFloat(cash[i].innerHTML))
                cashTot += parseFloat(cash[i].innerHTML);
        }
        for(var i=0;i<touch.length;i++){
            if(parseFloat(touch[i].innerHTML))
                touchTot += parseFloat(touch[i].innerHTML);
        }
        document.getElementById('touchTotal').innerHTML = touchTot.toFixed(2);
        document.getElementById('cashTotal').innerHTML = cashTot.toFixed(2);
        var total = parseFloat(document.getElementById('cashTotal').innerHTML) + parseFloat(document.getElementById('touchTotal').innerHTML);
        document.getElementById('total').innerHTML = total.toFixed(2);
    });

</script>
<script>
    function clearLocalStorage() {
        localStorage.removeItem("fromDate");
        localStorage.removeItem("toDate");
    }

    $(document).ready(function() {
        // Get the default dates from localStorage or set them to today's date
        var fromDate = localStorage.getItem("fromDate") || new Date().toISOString().split('T')[0];
        var toDate = localStorage.getItem("toDate") || new Date().toISOString().split('T')[0];
    
        // Set the values of the input fields
        $('input[name=from]').val(fromDate);
        $('input[name=to]').val(toDate);
    
        // Update localStorage when the input values change
        $('input[name=from]').change(function() {
            localStorage.setItem("fromDate", $(this).val());
        });
    
        $('input[name=to]').change(function() {
            localStorage.setItem("toDate", $(this).val());
        });
    });
</script>

@endsection