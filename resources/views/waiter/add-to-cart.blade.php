@extends('layouts.waiter')
@section('content')

<link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">
<h3>Place Order 下单</h3>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="search form-control" placeholder="Search Food 搜索食物">
        </div> 
        <div class="table-responsive">
            <table class="table table-border results">
                <thead>
                    <tr>
                        <th>ID 编号</th>
                        <th>Name 名字</th>
                        <th>Available </th>
                    </tr>
                    <tr class="waring no-result">
                        <th colspan="3"><i class="fa fa-warning">No Result</i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($foods as $food)
                        <form action="{{ url('/add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="table_id" value="{{$table -> table_id}}">
                            <tr>
                                <td><input type="text" class="form-control form-control-plaintext" name="food_id" value="{{$food -> id}}"></td>
                                <td>{{$food -> name}}</td>
                                @if($food -> available == 0)
                                    <td><span class="text-danger">Not Available 暂时不可行</span></td>
                                @elseif($food -> available == 1)
                                    <td><a class="btn btn-sm btn-success" style="color: white;" data-toggle="modal" data-target=".food{{$food -> id}}">Add To Cart 加入购物车</a></td>
                                    <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="card-title">Select Quantity 选择数量</h3>
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
                                                    <button type="submit" class="btn btn-primary">Confirm 确定</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </tr>
                        </form>
                        
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="content">
            <form action="{{ url('confirmOrder') }}" method="POST">
                @csrf
                <input type="hidden" name="tableID" value="{{$table -> table_id}}"> 
                <div class="table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Food Name 食物名字</td>
                                <td>Quantity 数量</td>
                                <td>Price 价钱</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts->where('orderID',null) as $cart)
                                <tr>
                                    <td>{{$loop -> iteration}}</td>
                                    <td>{{$cart -> fName}}</td>
                                    <td>{{$cart -> quantity}}</td>
                                    <td><span id="amount" name="amount">{{number_format($cart -> fPrice * $cart -> quantity,2)}}</span></td>
                                    <td><a href="{{ url('deleteCart',['id' =>$cart -> id])}}" style="text-decoration: none;" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="3" class="text-right">Total共计 :</td>
                                    <td><span id="total2" name="total2"></span></td>
                                    <input type="hidden" class="form-control form-control-plaintext" id="total" name="total">
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">Pay By付款 :</td>
                                    <td>
                                        <select class="form-control form-control-line" id="payment" name="payment">
                                            <option value="1">Cash 现金</option>
                                            <option value="2">Tng 线上付款</option>
                                        </select>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure to place order now? 您确定现在要下单吗?')">Confirm Order 确定订单</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var arr = document.getElementsByName('amount');
        var tot=0.00;
        for(var i=0;i<arr.length;i++){
            if(parseFloat(arr[i].innerHTML))
                tot += parseFloat(arr[i].innerHTML);
        }
        document.getElementById('total').value = tot.toFixed(2);
        document.getElementById('total2').innerHTML = tot.toFixed(2);

        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
            
            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
            
            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');

            if(jobCount == '0') {
                $('.no-result').show();
            }
            else {
                $('.no-result').hide();
            }
        });
    });
</script>

<script type="text/javascript">
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