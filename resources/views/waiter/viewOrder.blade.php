@extends('layouts.waiter')
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
        /* width */
</style>
<form action="{{ url('waiter/searchDate') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <label for="date" class="col-form-label">From :</label>
            <input type="date" class="form-control form-control-line" id="from" name="from" required>
        </div>
        <div class="col-sm-12">
            <label for="date" class="col-form-label">To :  </label>
            <input type="date" class="form-control form-control-line" id="to" name="to" required>
        </div>
        <div class="col-sm-12 d-flex mt-2">
           <a href="{{ route('waiter.order') }}" onclick="window.location.href = '{{ route('waiter.order') }}';" class="btn-sm btn-danger">Display All</a>
            &nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn-sm btn-primary "><i class="fas fa-search"></i></button>
        </div>
    </div>  
</form>

<br>

<div class="row">
    <div class="table-responsive m-1">
        
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="thead-dark" style="position: sticky; top: 0;">
                        <th colspan="5">
                            <div class="inline">{{$waiter->name}} </div>
                            <div class="inline2">Total共计 : <span id="total"></span></div>
                        </th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>OrderID 订单编号</th>
                        <th>Cash 现金</th>
                        <th>Touch 'n Go 线上付款</th>
                        <th>Created Date 添加时间</th>
                    </tr>
                </thead>
                <tbody>
               @foreach($orders ->where("status",1) as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{ url('waiter/viewFoodList',['orderID' => $order -> orderID]) }}" id="orderID">{{$order -> orderID}} </a></td>
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
                    <td><b>Total共计 : <span id="cashTotal"></span></b></td>
                    <td><b>Total共计 : <span id="touchTotal"></span></b></td>
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