@extends('layouts.app')
@section('content')

<title>View Cart查看购物车</title>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('472896e216249f1fefdb', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('refresh-channel');
    channel.bind('refresh', function(data) {
        var table = document.getElementById("table_id").value;
        if(data.table == table){
            window.location.reload();
        }
        else{
            console.log(data.table, table);
        }
    });
    
    var channel2 = pusher.subscribe('placeOrder-channel');
    channel2.bind('place-order', function(data) {
        var table = document.getElementById("table_id").value;
        if(data.table == table){
            window.location.href = "/viewReceipt/" + data.orderID;
        }
        else{
            console.log(data.table, table);
        }
    });
</script>
 <br>
 <center><h4><b> <  MyCart 我的购物单  > </b></h4></center>

<div class="row">
    <div class="col-md-12">
    <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <form action="{{ url('confirmOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="tableID" id="tableID" value="{{$table -> table_id}}">
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table tabl-hover">
                        <thead>
                            <tr>
                                <td>Image 图片</td>
                                <td>Name 名字</td>
                                <td>Quantity 数量</td>
                                <td>Grand Price 共计</td>
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
                                <td><a href="{{ url('deleteCart',['id' =>$detail -> id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this food? 您确定要删除该食物吗?')"><i class="fa fa-trash"></i></a></td>
                               
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="3"><b>Sub Total 共计 :</b></td>
                                <td><b><span name="total2" id="total2"></span></b></td>
                               <input type="hidden" name="total" id="total" readonly class="form-control-plaintext">
                            </tr>
                            <tr>
                                <td class="text-left" colspan="3">Pay By 付款 :
                                <span id="paymentName"></span>
                                <input type="hidden" name="payment_method" id="paymentMethod" class="form-control" value="{{$table -> payment}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @if(count($details -> where('orderID',null)) > 0)
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-success" type="submit" onclick="return confirm('Are you sure to place order now? 您确定要现在下单吗?')">Confirm Order 确定下单 &nbsp; &#10003;</button>
            </div>
            @endif
        </form>
    </div>
</div>
<script>
    Echo.channel('orders')
    .listen('OrderSubmitted', (e) => {
        window.location.replace("{{ route('method',['id' =>$table -> id]) }}");
    });
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
        
        if(document.getElementById('grandprice').value !== ""){
            document.getElementById('grandprice2').innerHTML = document.getElementById('grandprice').value;   
        }
        else{
            document.getElementById('grandprice2').innerHTML = 0.00;
        }
        
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