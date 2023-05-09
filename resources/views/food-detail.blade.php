@extends('layouts.app')
@section('content')

<form action="{{ url('/add-to-cart') }}" method="POST">
    @csrf
    <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
    <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
    <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">

    @foreach($food->foodSelect as $foodSelect)
        <input type="hidden" value="{{ $foodSelect -> name }}" name="select">
        <div class="row mt-3">
            <div class="col-md-12">
                <strong>{{ $foodSelect->name }}</strong>
            </div>
            @foreach($foodSelect->foodOption as $foodOption)
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" value="{{$foodOption -> name}}">
                        <label class="form-check-label">
                            {{ $foodOption->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <h3 class="title mt-1">Select Quantity 选择数量</h3>
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
    <button type="submit" class="btn btn-primary btn-block m-1">Confirm 确定</button>
</form>

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
