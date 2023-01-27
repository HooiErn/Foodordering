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
                        <th colspan="4">{{$waiter->name}}</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>OrderID</th>
                        <th>Amount(RM)</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{ url('admin/viewFoodList',['orderID' => $order -> orderID]) }}" id="orderID">{{$order -> orderID}} </a></td>
                        <td><span id="amount" name="amount">{{number_format($order -> amount,2)}}</span></td>
                        <td>{{$order -> created_at -> format('d/m/Y')}}</td>
                    </tr>
                @endforeach 
                <tr>
                    <td colspan="2" class="text-right">Total :</td>
                    <td colspan="2"><span id="total"></span></td>
                </tr>
                </tbody>
            </table>
        
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script scr="text/javascript">
    $(document).ready(function () {
        var arr = document.getElementsByName('amount');
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].innerHTML))
                tot += parseFloat(arr[i].innerHTML);
        }
        document.getElementById('total').innerHTML = tot.toFixed(2);
        
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