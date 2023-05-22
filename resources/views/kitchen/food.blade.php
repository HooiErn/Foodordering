@extends('layouts.kitchen')
@section('content')

<title>Food</title>

<style>
    .card {
        position: relative;
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
</style>

<div class="row">
    @foreach($foods as $food)
        <div class="col-md-4 p-2" onclick="window.location.href='{{ url('kitchen/changeStatus',['id' => $food->id]) }}'" style="cursor: pointer;">
            <div class="card border border-dark">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="text-center text-dark">{{$food->name}}</h4>
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
