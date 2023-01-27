@extends('layouts.admin')
@section('content')

<title>Waiter</title>

<style>
    #name{
        text-decoration:none;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Waiter</h1>
    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#waiterModal">
        <i class="fas fa-user fa-sm text-white-50"></i>
        Register
    </a>
</div>

<div class="row">
    <div class="table-responsive">
        
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                         <th>Total Amount(RM)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($waiters as $waiter)    
                    <tr>
                        @if(count($waiter -> order))
                        <td> <a href="{{ url('viewOrder',['name' => $waiter -> name]) }}" id="name">{{$waiter -> name}} </td>
                        @else
                        <td>{{$waiter -> name}}</td>
                        @endif
                        @php
                            $data = DB::table('waiters')->join('orders as total','waiters.name','=','total.waiter')
                            ->select('waiters.*','total.amount as amount')->where('total.waiter','=',$waiter -> name)->sum('amount'); 
                        @endphp
                        <td><span id="amount" name="amount">{{number_format($data,2)}} </span></td>
                    </tr>
                @endforeach
                <tr>
                    <td class="text-right">Total :</td>
                    <td><span id="total"></span></td>
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
                    <h5 class="modal-title" id="waiterModalTitle">Register Waiter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Waiter Name</label>
                        <input type="text" class="form-control form-control-line" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-line" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>

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
    
    });

</script>

@endsection