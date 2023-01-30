@extends('layouts.admin')
@section('content')
<title>View Order</title>

<style>
    #orderID{
        text-decoration:none;
    }
</style>

<form action="{{ url('admin/searchDate') }}" method="POST">
    @csrf
    <br>
        <div class="d-flex align-items-center justify-content-center">
            <input type="hidden" class="form-control" name="name" value="{{$waiter -> name}}">
            <label for="date" class="col-form-label">From: </label>
            <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="from" name="from" required>
            </div>
            <label for="date" class="col-form-label">To: </label>
            <div class="col-sm-3">
                <input type="date" class="form-control input-sm" id="to" name="to" required>
            </div>
            <button type="submit" class="btn btn-primary" name="search" title="Search"><i class="fas fa-search"></i></button>
        </div>  
</form>

<br>

<div class="row">
    <div class="table-responsive">
        
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="thead-dark">
                        <th colspan="5">{{$waiter->name}}</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>OrderID</th>
                        <th>Cash</th>
                        <th>Touch 'n Go</th>
                        <th rowspan="2">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{ url('admin/viewFoodList',['orderID' => $order -> orderID]) }}" id="orderID">{{$order -> orderID}} </a></td>
                        @if($order -> payment_method == 1)
                            <td><span id="amount" name="cashAmount">{{number_format($order -> amount,2)}}</span></td>
                            <td><span>0.00</span></td>
                        @elseif ($order -> payment_method == 2)
                            <td><span>0.00</span></td>
                            <td><span id="amount" name="touchAmount">{{number_format($order -> amount,2)}}</span></td>
                        @endif
                        <td>{{$order -> created_at -> format('d/m/Y')}}</td>
                    </tr>
                @endforeach 
                <tr>
                    <td colspan="2"></td>
                    <td><span id="cashTotal"></span></td>
                    <td><span id="touchTotal"></span></td>
                    <td>Total : <span id="total"></span></td>
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
        
        $('input[name=from]').change(function() {
            var fromDate = $(this).val();
            localStorage.setItem("fromDate", fromDate);
        });
        
        $('input[name=to]').change(function() {
            var toDate = $(this).val();
            localStorage.setItem("toDate", toDate);
        });
        
        if(localStorage.getItem("fromDate")){
            $('input[name=from]').val(localStorage.getItem("fromDate"));
        }
        
        if(localStorage.getItem("toDate")){
            $('input[name=to]').val(localStorage.getItem("toDate"));
        }
    
    });

</script>

@endsection