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
                  <div class="table-responsive">
       
                    <table class="table table-hover">
                <thead class="thead-dark">
  
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                @foreach($carts -> where('table_id',$table->table_id) -> where('is_paid','0') -> where('orderID','!=',null) as $cart)   
                    <tr>
                        <td>{{$loop -> iteration}}.</td>
                        <td>{{$cart -> name}}</td>
                        <td><center>{{$cart -> quantity}}</center></td>
                        <td>{{number_format($cart -> quantity * $cart -> price,2)}}</td>
                        <td><span class="text-danger">Havent Paid</span></td>
                    </tr>
                </tbody>
               
                @endforeach
            </table>
  
    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection