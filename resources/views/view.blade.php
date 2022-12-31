@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ url('confirmOrder') }}" method="POST">
            @csrf
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table tabl-hover">
                        <thead class="thead-dark">
                            <tr>
                                <input type="hidden" name="tableID" class="form-control" value="{{$table -> table_id}}">
                                <th colspan="7">Table {{$table -> table_id}}</th>
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
                            @foreach($details ->where('orderID','=',null) as $detail)
                            <input type="hidden" name="cartID" id="cartID" value="{{$detail -> id}}">
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
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <button class="btn btn-info" onclick="history.back()">Back</button>
    </div>
</div>

<script>
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