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
                     <h5>{{$table -> table_id}} </h5>
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
                     @foreach($tables as $table) 
                @foreach($carts -> where('table_id',$table->table_id) -> where('is_paid','0') -> where('orderID','!=',null) as $cart)   
                    <tr>
                        <td></td>
                        <td>{{$cart -> name}}</td>
                        <td>{{$cart -> quantity}}</td>
                        <td>{{number_format($cart -> quantity * $cart -> price,2)}}</td>
                        <td>{{$cart -> status}}</td>
                    </tr>
                </tbody>
                @endforeach  
                @endforeach
            </table>
  
    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection