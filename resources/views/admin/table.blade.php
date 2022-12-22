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
                    <h5 class="card-title">{{$table -> name}}</h5>
                    <a href="{{ url('admin/deleteTable',['id' => $table -> id])}}" onclick="return confirm('Are you sure to delete this table?')"><i class="fas fa-trash" style="color: red;"></i></a>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection