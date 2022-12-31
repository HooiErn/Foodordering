@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <div class="row">
        @foreach($foods as $food)
        
            <div class="col-6">
                <div class="box">
                <a href="{{ route('view.food', ['id' => $food->id]) }}"><img src="{{asset('images/'.$food->image )}}" alt="Image" style="width:100px;height:100px;"></a>
                <div class="top-left">
                    <h6>{{$food -> name}}</h6>
                    <h6>{{$food -> description}}</h6>
                    <h6> RM{{number_format((float)$food -> price, 2, '.', '')}}</h6>
                </div>
                
             <form action="{{ url('/add-to-cart') }}" method="POST">
            @csrf
            <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
            <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
            <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".food{{$food -> id}}">Add To Cart</a>

            <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="width:360px;">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="card-title">Select Quantity</h3>
                  </div>
                  <br> 
                 
                  <div class="input-group quantity" style="width:300px;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food -> price}}">
                    <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" placeholder="1">
                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                        <span class="input-group-text">+</span>
                    </div>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                  </div>
                </div>
              </div>
            </div>
          </form>   
                  
              
                
             </div>
             <br>
            </div>
        @endforeach
 </div>
        <br><br>
    </div>
    <div class="col-sm-1"></div>
</div>

@if(count($carts->where('orderID',null)))
<a href="{{ url('viewCart',['id' => $table -> table_id]) }}" class="btn btn-primary align-items-center justify-content-center d-flex">View Cart<span class="text-danger">{{count($carts->where('orderID',null))}}</span></a>
@endif


<script>
    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
    });

</script>

@endsection