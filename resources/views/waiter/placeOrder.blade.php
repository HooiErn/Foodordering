@extends('layouts.waiter')
@section('content')

<h3>Place Order 下单</h3>
<div class="row">
    @foreach($tables as $table)
    <div class="col-sm-3 card m-4">
        <div class="card-content">
            <div class="card-body">
                <h4 class="text-center"><a href="{{ url('waiter/add-to-cart',['id' => $table -> table_id]) }}" style="text-decoration: none;">Table {{str_pad($table -> table_id,3,"0",STR_PAD_LEFT)}}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection