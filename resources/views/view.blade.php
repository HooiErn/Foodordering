@extends('layouts.app')
@section('content')

<title>View Cart 查看购物车</title>

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
 <center><h4 style="background-color:LightGray;"><b>  MyCart 我的购物单 </b></h4></center>

<div class="row">
    <div class="col-md-12">
    <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <form action="{{ url('confirmOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="tableID" id="tableID" value="{{$table -> table_id}}">
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table tabl-hover">
                        
                        <tbody>
                            @foreach($details ->where('orderID','=',null) as $detail)
                                <input type="hidden" name="cartID" id="cartID" value="{{$detail -> id}}">
                                <tr>
                                    <td><img src="{{ asset('images')}}/{{$detail->image}}" alt="" width="50px" height="50px"></td>
                    
                                   <td style="width:90%">{{$detail -> name}}
                                    <button class="button" style="background-color: yellow; border-radius: 50%;"> x{{$detail -> quantity}}</button>
                                    <br>
                                    <span style="color:red;">RM {{number_format($detail -> quantity * $detail -> price,2)}}</span>
                                    <br>
                                    <b>
                                     @if(!empty($detail->addon))
                                        @php
                                            $addons = json_decode($detail->addon, true);
                                        @endphp
                                    
                                        @foreach($addons as $title => $addon)
                                            @if($addon !== null)
                                                {{$title}} - {{$addon}}
                                                    @else
                                                -
                                            @endif
                                        @endforeach
                                    @endif
                                    @if  (empty($detail->addon))
                                    @endif </b></td>
                                    
                                    <td style="width:10%"><center>
                                        <input type="hidden" name="grandprice" id="grandprice" readonly class="grandprice-input form-control-plaintext" value="{{number_format($detail -> quantity * $detail -> price,2)}}"/>
                                        <center><a href="{{ url('deleteCart',['id' =>$detail -> id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this food? 您确定要删除该食物吗?')"><i class="fa fa-trash"></i></a></center></td>
                                    
                                   
                                </tr>
                            @endforeach
                            
                            <tr>
                                 <td class="text-center" colspan="5"><b>Sub Total 共计 : RM
                                <span name="total2" id="total2"></span></b></td>
                               <input type="hidden" name="total" id="total" readonly class="form-control-plaintext">
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
            @if(count($details -> where('orderID',null)) > 0)
            <div class="d-flex align-items-center justify-content-center">
                
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="border-radius: 2px;">
  <i class="fa fa-info"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Details 详细信息</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <td class="text-left" colspan="5">Pay By 付款 :
                                <span id="paymentName">
                                    @if($table -> payment == 1)
                                        Cash 现金
                                    @elseif($table -> payment == 2)
                                        Touch 'n Go 线上付款
                                    @endif
                                </span>
                                <br>
                                <input type="hidden" name="payment_method" id="paymentMethod" class="form-control" value="{{$table -> payment}}">
                                 
                                    <span id="selection">
                                        @if($table -> selection == 1)
                                            Selection 选择: Dive In 堂食
                                        @elseif($table -> selection == 2)
                                           Selection 选择: Take Away 外带
                                        @endif
                                    </span>
                                    <input type="hidden" name="selection" id="selection" class="form-control" value="{{$table -> selection}}">
                                </td>
      </div>
      
    </div>
  </div>
</div>
    &nbsp;
                <button class="btn btn-success" type="submit" onclick="return confirm('Are you sure to place order now? 您确定要现在下单吗?')">Confirm Order 确定下单</button>
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
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].value))
                tot += parseFloat(arr[i].value);
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