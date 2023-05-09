@extends('layouts.waiter')
@section('content')
<title>Show Work</title>

<h3>Show Work 显示工作</h3>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Clean Table</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($works -> where('work_number',1))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Wash Toilet</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($works -> where('work_number',2))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Help Customer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($works -> where('work_number',3))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="table-responsive m-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Table ID</td>
                    <td>Clean Table</td>
                    <td>Wash Toilet</td>
                    <td>Help Customer</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tables as $table)
                    <tr>
                        <td>{{$table -> table_id}}</td>
                        <td>{{count($works ->where('table_id',$table -> table_id) -> where('work_number',1))}}</td>
                        <td>{{count($works ->where('table_id',$table -> table_id) -> where('work_number',2))}}</td>
                        <td>{{count($works ->where('table_id',$table -> table_id) -> where('work_number',3))}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="text-right">Total:</td>
                    <td>{{count($works -> where('work_number',1))}}</td>
                    <td>{{count($works -> where('work_number',2))}}</td>
                    <td>{{count($works -> where('work_number',3))}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection