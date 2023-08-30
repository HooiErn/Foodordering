@extends('layouts.admin')
@section('content')

<title>Waiter</title>

<style>
    #name{
        text-decoration:none;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Waiter 服务员</h1>
</div>

<form action="{{ route('admin.waiter.searchDate') }}" method="POST">
    @csrf
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col-sm-1 text-right">
            <label for="from" class="col-form-label">From:</label>
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control form-control-sm" id="from" name="from" required>
        </div>
        <div class="col-sm-1 text-right">
            <label for="to" class="col-form-label">To:</label>
        </div>
        <div class="col-sm-2">
            <input type="date" class="form-control form-control-sm" id="to" name="to" required>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-sm" name="search" title="Search"><i class="fas fa-search"></i></button>
            <a href="{{ url('admin/waiter-report') }}" class="btn btn-danger btn-sm ml-2 text-white" onclick="clearLocalStorage()" style="text-decoration: none;">Default</a>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings 收入 (Cash 现金)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{number_format($orders -> where("status", 1) -> where("payment_method",1) -> sum("amount"),2)}}</div>
                    </div>
                    <div class="col-auto">
                       <img src="https://cdn-icons-png.flaticon.com/128/2704/2704312.png" style="width:50px;height:50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings 收入 (Tng 线上付款)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{number_format($orders -> where("status", 1) -> where("payment_method",2) -> sum("amount"),2)}}</div>
                    </div>
                    <div class="col-auto">
                       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSexKLDtXeIwF9mdCt_befE61MAFvBNyQxH_xLzUdY&s" style="width:50px;height:50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Successful Bill 成功的账单</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($orders -> where("status", 1))}}</div>
                    </div>
                    <div class="col-auto">
                       <img src="https://cdn-icons-png.flaticon.com/128/1052/1052856.png" style="width:50px;height:50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="table-responsive ml-5 mr-5">
            <table class="table table-bodered">
                <thead>
                    <tr>
                        <td>Name 名字</td>
                        <td>Cash 现金 (RM)</td>
                        <td>Tng 线上付款(RM)</td>
                        <td>Total Bills 账单总和</td>
                        <td>Total Work 总工作数量</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($waiters -> where('deleted', 1) as $waiter)
                    <tr>
                        <td><a href="#" onclick="view('{{$waiter -> name}}')" style="text-decoration: none;">{{$waiter -> name}}</a></td>
                        <td><span name="cash">{{number_format($orders -> where("waiter", $waiter -> name) -> where("status", 1) -> where("payment_method",1) -> sum("amount"),2)}}</span></td>
                        <td><span name="tng">{{number_format($orders -> where("waiter", $waiter -> name) -> where("status", 1) -> where("payment_method",2) -> sum("amount"),2)}}</span></td>
                        <td>{{count($orders -> where("waiter", $waiter -> name) -> where("status", 1))}}</td>
                        <td>{{count($works -> where('waiter', $waiter -> name))}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-right"> <b>Total总和 :</b></td>
                        <td><b><span id="t-cash"></span></b></td>
                        <td><b><span id="t-tng"></span></b></td>
                        <td><b>{{count($orders -> where('status',1))}}</b></td>
                        <td><b>{{count($works -> where('waiter','!=',null))}}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var cash = document.getElementsByName("cash");
        var tng = document.getElementsByName("tng");
        var cashTot = 0.00;
        var touchTot = 0.00;
        for(var i=0;i<cash.length;i++){
            if(parseFloat(cash[i].innerHTML))
                cashTot += parseFloat(cash[i].innerHTML);
        }
        for(var i=0;i<tng.length;i++){
            if(parseFloat(tng[i].innerHTML))
                touchTot += parseFloat(tng[i].innerHTML);
        }
        document.getElementById('t-tng').innerHTML = touchTot.toFixed(2);
        document.getElementById('t-cash').innerHTML = cashTot.toFixed(2);
        
    })
</script>
<script scr="text/javascript">
    function view(name){
        console.log(name);
        window.location.href = "/viewOrder/" + name;
    }
</script>
<script>
    $(document).ready(function() {
        $('.close').on('click', function() {
            $(this).closest('.modal').modal('hide');
        });
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