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
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#waiterModal">
        <i class="fas fa-user fa-sm text-white-50"></i>
        Register注册
    </a>
</div>

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
                    @foreach($waiters as $waiter)
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


<!-- Waiter Modal -->
<form action="{{ url('admin/registerWaiter') }}" method="POST">
    @csrf
    <div class="modal fade" id="waiterModal" tabindex="-1" role="dialog" aria-labelledby="waiterModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="waiterModalTitle">Register Waiter 添加服务员</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="w_name">Waiter Name 服务员名称</label>
                        <input type="text" class="form-control form-control-line" name="w_name" value="{{ old('w_name') }}" required>
                        @error('w_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="w_password">Password 密码</label>
                        <input type="password" class="form-control form-control-line" name="w_password"  value="{{ old('w_password') }}" required>
                        @error('w_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="w_confirm_password">Confirm Password 确认密码</label>
                        <input type="password" class="form-control form-control-line" name="w_confirm_password"  value="{{ old('w_confirm_password') }}" required>
                        @error('w_confirm_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create 添加</button>
                </div>
            </div>
        </div>
    </div>
</form>
@if($errors -> has('w_name') || $errors -> has('w_password') || $errors->has('w_confirm_password'))
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#waiterModal').modal('show');
        });
    </script>
@endif

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

@endsection