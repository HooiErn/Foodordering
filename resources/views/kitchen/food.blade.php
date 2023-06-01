@extends('layouts.kitchen')
@section('content')

<title>Food Status Control</title>

<style>
    .card {
        position: relative;
        
    }
    
    .card:hover{
        background-color: #f2f2f2;
    }
    
    .overlay {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: red;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .overlay i {
        font-size: 3rem;
    }
    .row{
        margin-bottom: 24px;
    }
</style>

<h1 class="h3 mb-3 text-gray-800">
    <span>Food Status Control</span><br>
    <small class="text-muted">食物状态设置</small>
</h1>

<div class="row">
    @foreach($foods as $food)
        <div class="col-md-2 col-sm-4 col-xs-6 p-1" onclick="window.location.href='{{ url('kitchen/changeStatus',['id' => $food->id]) }}'" style="cursor: pointer;">
            <div class="card border border-dark">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="text-center text-dark" style="font-size: 14px;">{{$food->name}}</h4>
                        @if($food->available == 0)
                            <div class="overlay">
                                <i class="fas fa-times"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



@endsection
