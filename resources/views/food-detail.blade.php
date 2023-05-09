@extends('layouts.app')
<style>
.radio label {
  display: block;
  margin-bottom: 10px;
}

.radio input[type="radio"] {
  margin-right: 10px;
}

</style>
@section('content')

<div class="container" style="max-width: 500px; margin: auto;">
    <form action="{{ url('/add-to-cart') }}" method="POST">
        @csrf
        <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
        <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
        <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
        <br>
        <div class="col-auto" style="margin-bottom:10px;">
            <img src="{{ asset('images/')}}/{{$food -> image}}" width="100px" height="100px">
        </div>
        <div class="header">
            <h3 class="title" style="font-size: 24px; font-weight: bold;">Select Quantity</h3>
            <h3 class="title" style="font-size: 16px;">选择数量</h3>
        </div>
        <div class="input-group quantity">
            <div class="input-group-prepend decrement-btn changeQuantity">
                <span class="input-group-text">-</span>
            </div>
            <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food -> price}}">
            <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" value="1">
            <div class="input-group-append increment-btn changeQuantity">
                <span class="input-group-text">+</span>
            </div>
        </div>

        <input type="hidden" value="" name="select">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <b><label class="control-label" style="font-size: 16px;">Sugar Level:</label></b>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="no_sugar"> No sugar
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="less_sugar"> Less sugar
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="standard"> Standard
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <b><label class="control-label" style="font-size: 16px;">Ice Level:</label></b>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="ice_level" value="no_ice"> No ice
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="ice_level" value="ice"> Ice
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block m-1" style="font-size: 16px;">Confirm 确定</button>
    </form>
</div>



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
        
        var table = document.getElementById("table_id").value;
        if (window.location.href.indexOf('_token=') !== -1) {
            window.location.href = "/home/" + table;
        }
    });

</script>
<script>
    $(document).ready(function() {
        var table_id = {{$table -> table_id}};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('onUnload') }}',
            type: 'POST',
            data: {table_id: table_id},
            success: function(response) {
                console.log(response);
            }
        });
    });
</script>

@endsection