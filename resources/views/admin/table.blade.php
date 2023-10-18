@extends('layouts.admin')
@section('content')

<style>
      .tableFixHead {
        overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
        height: 200px; /* gives an initial height of 200px to the table */
      }
      .tableFixHead thead th {
        position: sticky; /* make the table heads sticky */
        top: 0px; /* table head will be placed from the top of the table and sticks to it */
      }
      table {
        border-collapse: collapse; /* make the table borders collapse to each other */
        width: 100%;
      }
</style>

<title>Table</title>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Table 桌子</h1>
    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white" data-toggle="modal" data-target="#addTable">Create Table 添加桌子</a>
    <div class="modal fade" id="addTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('admin/addTable') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Create Table</h4>
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-inline @error('table_id') is_invalid @enderror" min="1" placeholder="Enter Table ID" name="table_id">
                            @error('table_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if($errors -> has('table_id'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addTable').modal('toggle');
        });
    </script>
@endif

<div class="row">
    @foreach($tables as $table)
    <div class="col-sm-3 mb-4">
        <div class="card border border-dark">
            <div class="card-content">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h4 class="text-center">Table {{str_pad($table -> table_id,3,"0",STR_PAD_LEFT)}}</h4>
                    <div>
                        <a href="#" data-toggle="modal" data-target="#tableQR{{$table->table_id}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-qrcode text-white" aria-hidden="true" style="color:black;"></i></a>
                        <a href="{{ url('admin/deleteTable', ['id' => $table -> table_id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this table?')"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tableQR{{$table -> table_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    {{QrCode::size(250)->generate('https://foodorderapp.ctosweb.com/home/'.$table->table_id);}}
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">Print</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Old Version -->
<!--<div class="row">-->
<!--    @foreach($tables->sortBy('table_id') as $table)-->
<!--        <div class="col-md-3 tableFixHead" style="margin-bottom: 20px;">-->
<!--            <div class="card border-dark">-->
<!--                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">-->
<!--                    <h5 class="card-title">Table {{$table -> table_id}}</h5>-->
<!--                    <div>-->
<!--                        <a href="#" data-toggle="modal" data-target="#tableQR{{$table->table_id}}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-qrcode text-white" aria-hidden="true" style="color:black;"></i></a>-->
<!--                        <a href="{{ url('admin/deleteTable', ['id' => $table -> table_id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this table?')"><i class="fas fa-trash"></i></a>-->
<!--                    </div>-->
                    
<!--                </div>-->
<!--                <div class="modal fade" id="tableQR{{$table -> table_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--                    <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--                        <div class="modal-content">-->
<!--                            <div class="modal-body text-center">-->
<!--                                {{QrCode::size(250)->generate('https://foodorderapp.ctosweb.com/method/'.$table->table_id);}}-->
<!--                            </div>-->
<!--                            <div class="modal-footer justify-content-center">-->
<!--                                <button type="button" class="btn btn-primary btn-sm btn-rounded">Print</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <table class="table table-hover">-->
<!--                        <thead>-->
<!--                            <tr>-->
<!--                                <th>No.</th>-->
<!--                                <th>Order ID 订单编号</th>-->
<!--                                <th>Responsible 负责人</th>-->
<!--                                <th>Amount 共计</th>-->
<!--                            </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                            @foreach($orders->where('table_id',$table -> table_id)->where('status',"0") as $order)   -->
<!--                                <tr>-->
<!--                                    <td>{{$loop -> iteration}}.</td>-->
<!--                                    <td><a href="" data-toggle="modal" data-target="#order{{$order->orderID}}" style="text-decoration: none;">{{$order -> orderID}}</a></td>-->
<!--                                    @if($order -> waiter == null)-->
<!--                                        <td><span class="text-danger">No person in charge</span></td>-->
<!--                                    @else-->
<!--                                        <td>{{$order -> waiter}}</td>-->
<!--                                    @endif-->
<!--                                    <td>RM {{number_format($order -> amount,2)}}</td>-->
<!--                                </tr>-->
<!--                            @endforeach-->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    @endforeach-->
<!--</div>-->

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