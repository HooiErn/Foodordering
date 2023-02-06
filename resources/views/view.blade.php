@extends('layouts.app')
@section('content')

<title>View Cart</title>

 <body onload = "JavaScript:AutoRefresh(10000);">
<div class="row" onload="AutoRefresh(10000)">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ url('confirmOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="tableID" id="tableID" value="{{$table -> table_id}}">
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table tabl-hover">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Quantity</td>
                                <td>Grand Price</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details ->where('orderID','=',null) as $detail)
                            <input type="hidden" name="cartID" id="cartID" value="{{$detail -> id}}">
                            <tr>
                                <td><img src="{{ asset('images')}}/{{$detail->image}}" alt="" width="50px" height="50px"></td>
                                <td>{{$detail -> name}}</td>
                                <td>{{$detail -> quantity}}</td>
                                <td>
                                    <span>{{number_format($detail -> quantity * $detail -> price,2)}}</span>
                                    <input type="hidden" name="grandprice" id="grandprice" readonly class="grandprice-input form-control-plaintext" value="{{number_format($detail -> quantity * $detail -> price,2)}}"/>
                                </td>
                                <td><a href="{{ url('deleteCart',['id' =>$detail -> id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this food?')"><i class="fa fa-trash"></i></a></td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="3"><b>Sub Total :</b></td>
                                <td><b><span name="total2" id="total2"></span></b></td>
                               <input type="hidden" name="total" id="total" readonly class="form-control-plaintext">
                            </tr>
                            <tr>
                                <td class="text-left" colspan="3">Pay By :
                                <span id="paymentName"></span>
                                <input type="hidden" name="paymentMethod" id="paymentMethod" class="form-control" value="{{$table -> payment}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-success" type="submit" onclick="return confirm('Are you sure to place order now?')">Confirm Order &nbsp; &#10003;</button>
            </div>
        </form>
    </div>
</div>
 </body>
 
<script>
    function AutoRefresh(t){
        setTimeout(location.reload(), t);
    }
</script>

<script>
    
    $("document").ready(function () {
        
        var arr = document.getElementsByName('grandprice');
        var number = document.getElementById("paymentMethod").value;
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].value))
                tot += parseFloat(arr[i].value);
        }
        if(number == 1){
            $("span[id='paymentName']").html("Cash");
        }
        if(number == 2){
            $("span[id='paymentName']").html("Touch 'n Go");
        }
        document.getElementById('total').value = tot.toFixed(2);
        document.getElementById('total2').innerHTML = tot.toFixed(2);
        
        document.getElementById('grandprice2').innerHTML = document.getElementById('grandprice').value;
        
    });
</script>

 <script type = "text/JavaScript">
         <!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //-->
      </script>

@endsection