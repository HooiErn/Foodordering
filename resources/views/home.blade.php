@extends('layouts.app')

@section('content')

<div class="row">
  @foreach($foods as $food)
    <div class="col-sm-6 col-md-4" style="margin-bottom: 20px;">
      <div class="card border-dark">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="card-title">{{$food -> name}}</h5>
        </div>
        <div class="card-body">
          <label for="">Description :</label>
          <h3>{{$food -> description}}</h3>
          <h3>Price : RM {{$food -> price}}</h3>
          <form action="{{ url('/add-to-cart') }}" method="POST">
            @csrf
            <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
            <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
            <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".food{{$food -> id}}">Add To Cart</a>

            <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="card-title">Select Quantity</h3>
                  </div>
                  <div class="input-group quantity">
                    <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                        <span class="input-group-text">-</span>
                    </div>
                    <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food -> price}}">
                    <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" placeholder="1">
                    <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                        <span class="input-group-text">+</span>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>

@if(count($carts->where('orderID',null)))
<a href="{{ url('viewCart',['id' => $table -> table_id]) }}" class="btn btn-primary align-items-center justify-content-center d-flex">View Cart<span class="text-danger">{{count($carts->where('orderID',null))}}</span></a>
@endif

<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

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