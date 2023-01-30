@extends('layouts.admin')
@section('content')

<title>Table</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table</h1>
    <a href="{{ url('admin/addTable') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="return confirm('Are you sure to create a new table?')">Create Table</a>
</div>


<div class="row">
    @foreach($tables as $table)
        <div class="col-sm-6 col-md-4" style="margin-bottom: 20px;">
            <div class="card border-dark">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                    <h5 class="card-title">Table {{$loop -> iteration}}</h5>
                    <a href="#" data-toggle="modal" data-target="#tableQR{{$table->table_id}}"><i class="fa fa-qrcode" aria-hidden="true" style="color:black;"></i></a>
                </div>
                <div class="modal fade" id="tableQR{{$table -> table_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                {{QrCode::size(250)->generate('https://foodorder.ctosweb.com/home/'.$table->table_id);}}
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary btn-sm btn-rounded">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Responsible</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders->where('table_id',$table -> table_id)->where('is_paid',"0") as $order)   
                                <tr>
                                    <td>{{$loop -> iteration}}.</td>
                                    <td><a href="" data-toggle="modal" data-target="#order{{$order->orderID}}" style="text-decoration: none;">{{$order -> orderID}}</a></td>
                                    @if($order -> waiter == null)
                                        <td><span class="text-danger">No person in charge</span></td>
                                    @else
                                        <td>{{$order -> waiter}}</td>
                                    @endif
                                    <td>RM {{number_format($order -> amount,2)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>

@foreach($orders as $order) 
    <div class="modal fade" id="order{{$order->orderID}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Included Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            @foreach($carts -> where('orderID', $order -> orderID) as $cart)
                            <tr>
                                <td colspan="2">{{$cart -> name}}</td>
                                <td>{{$cart -> quantity}}</td>
                                <td><span name="amount">{{number_format($cart->quantity * $cart->price,2)}}</span></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-right">Total:</td>
                                <td><span id="total"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
        console.log(tot);
    });

</script>

@endsection