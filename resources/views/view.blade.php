@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ url('confirmOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="tableID" value="{{$table -> table_id}}">
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table tabl-hover">
                        <tbody>
                            @foreach($details ->where('orderID','=',null) as $detail)
                            <input type="hidden" name="cartID" id="cartID" value="{{$detail -> id}}">
                            <tr>
                                <td><img src="{{ asset('images')}}/{{$detail->image}}" alt="" width="50px" height="50px"></td>
                                <td>{{$detail -> name}}</td>
                                <td>{{number_format($detail -> price,2)}}</td>
                                <td>x{{$detail -> quantity}}</td>
                                <td><a href="{{ url('deleteCart',['id' =>$detail -> id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this food?')">Remove</a></td>
                                 <td><textarea name="addon" id="addon" class="form-control" cols="20" rows="1"></textarea></td>
                                 
                                    
                                <td>
                                    <input type="text" name="grandprice" id="grandprice" readonly class="grandprice-input form-control-plaintext" value="{{number_format($detail -> quantity * $detail -> price,2)}}"/>
                                </td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="2">Sub Total :</td>
                                <td colspan="2"><input type="number" name="total" id="total" readonly class="form-control-plaintext"></td>
                                <td><button class="btn btn-success" type="submit" onclick="return confirm('Are you sure to place order now?')">Confirm Order &nbsp; &#10003;</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
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
        document.getElementById('total').value = tot.toFixed(2);
        
    });

</script>


@endsection