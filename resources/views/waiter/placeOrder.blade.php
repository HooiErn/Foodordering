@extends('layouts.waiter')
@section('content')

<title>Place Order</title>

<select name="tableID" id="tableID">
    @foreach($table as $t)
        <option value="{{$t -> table_id}}">{{$t -> table_id}}</option>
    @endforeach
</select>

@foreach($food as $f)
    <form action="{{ url('/add-to-cart') }}" method="POST">
        @csrf
        <input type="hidden" id="table_id" name="table_id" class="form-control table_id">
        <input type="hidden" name="food_id" class="form-control" value="{{$f -> id}}">
        <div style="display:-webkit-inline-box;">
        <div><img src="{{ asset('images')}}/{{$f->image}}" alt="" width="50px" height="50px"></div>
        <h6>{{$f -> name}}</h6>
        <h6>RM {{number_format($f -> price ,2)}}</h6>
        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".food{{$f -> id}}">Add To Cart</a>
        </div>
        <br>
        <div class="modal fade food{{$f -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="card-title">Select Quantity</h3>
                    </div>
                    <div class="input-group quantity">
                        <div class="input-group-prepend decrement-btn changeQuantity">
                            <span class="input-group-text">-</span>
                        </div>
                        <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" value="1">
                        <div class="input-group-append increment-btn changeQuantity">
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
@endforeach


{{-- for viewing items added to cart --}}
<form action="{{ url('confirmOrder') }}" method="POST">
    @csrf
<table class="table tabl-hover">
                        <thead class="thead-dark">
                            <tr>
                                
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td class="text-center">Quantity</td>
                                <td>Grand Price</td>
                                <td>Addon</td>
                                <td>Remove</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                            <input type="hidden" name="cartID" id="cartID" value="{{$detail -> id}}">
                            <input type="hidden" name="quantity" id="quantity" value="{{$detail -> quantity}}">
                            <tr>
                                <td><img src="{{ asset('images')}}/{{$detail->image}}" alt="" width="50px" height="50px"></td>
                                <td>{{$detail -> name}}</td>
                                <td>{{number_format($detail -> price,2)}}</td>
                                <td>{{$detail -> quantity}}</td>
                                <td>
                                    <input type="text" name="grandprice" id="grandprice" readonly class="grandprice-input form-control-plaintext" value="{{number_format($detail -> quantity * $detail -> price,2)}}"/>
                                </td>
                                <td><textarea name="addon" id="addon" class="form-control" cols="20" rows="1"></textarea></td>
                                <td><a href="{{ url('deleteCart',['id' =>$detail -> id])}}" class="btn btn-sm btn-danger">Remove</a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-end" colspan="4">Sub Total :</td>
                                <td colspan="2"><input type="number" name="total" id="total" readonly class="form-control-plaintext"></td>
                                <td><button class="btn btn-primary" type="submit">Confirm Order</button></td>
                            </tr>
                        </tbody>
                    </table>
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

        var table_id = $('#tableID').find(":selected").val();
        $('.table_id').each(function (){
            $(this).val(table_id)
        })
    });

    $(document).ready(function () {
        var arr = document.getElementsByName('grandprice');
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].value))
                tot += parseFloat(arr[i].value);
        }
        document.getElementById('total').value = tot;
        

        document.getElementById('table').innerHTML = localStorage.getItem("table");
    });

</script>
@endsection