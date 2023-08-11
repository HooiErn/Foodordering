@extends('layouts.waiter')
@section('content')

<style>
    /* Custom CSS to create 3 columns for small screens */
    @media (max-width: 576px) {
        .row.flex-sm {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .col-sm-1 {
            flex: 0 0 calc(33.33% - 20px); /* Three columns with 20px spacing between them */
            margin: 10px;
        }
    }
</style>

<h3>Place Order 下单</h3>
<h4>Table</h4>
<div class="row flex-sm">
    @foreach($tables as $table)
    <div class="col-sm-1 card m-4 border border-dark">
        <div class="card-content">
            <div class="card-body">
                <h4 class="text-center"><a href="{{ url('waiter/add-to-cart',['id' => $table -> table_id]) }}" style="text-decoration: none;">{{str_pad($table -> table_id,2,"0",STR_PAD_LEFT)}}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        sessionStorage.removeItem('onloadExecuted');
    });
</script>

@endsection