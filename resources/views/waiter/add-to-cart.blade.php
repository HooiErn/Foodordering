@extends('layouts.waiter')
@section('content')

<style>
    table{
        width: 100%;
    }
    
    #cd-cart-trigger {
        position: fixed;
        top: 18%;
        transform: translateY(-50%);
        right: 0; /* Adjust the right margin as needed */
        z-index: 4; /* Ensure it stays above other elements */
        width: 60px; /* Set the width for the semicircle */
        height: 80px; /* Set the height for the semicircle */
        border-top-left-radius: 40px; /* Adjust the border radius to create the semicircle */
        border-bottom-left-radius: 40px; /* Adjust the border radius to create the semicircle */
        background-color: #4e73df; /* Set the background color */
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    
    #cd-cart-trigger a {
        text-decoration: none;
        color: black; /* Set the color for the icon */
        padding-left: 20px; /* Add padding to the left of the icon to center it inside the triangle */
    }
    
    #cd-cart-trigger a i {
        font-size: 1.2rem; /* Adjust the font size as needed */
    }
    
    #cd-cart-trigger a sup {
        color: #ffffff; /* Adjust the color for the badge */
        font-size: 1rem; /* Adjust the font size for the badge */
        margin-left: 0; /* Add some spacing between the icon and badge */
    }
    
    #cd-cart-trigger ul {
        list-style: none;
    }
    
    #cd-cart-trigger.is-not-visible {
        display: none;
    }
    
    #cd-cart {
        position: fixed;
        top: 0;
        height: 100%;
        width: 350px; /* Default width for larger screens */
        /* header height */
        padding-top: 50px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        z-index: 3;
    }
    
    /* For screens with width 768px and larger */
    @media only screen and (min-width: 768px) {
        #cd-cart {
            width: 350px; /* Width for screens larger than 768px */
        }
    }
    
    /* For screens with width 1200px and larger */
    @media only screen and (min-width: 1200px) {
        #cd-cart {
            width: 30%; /* Width for screens larger than 1200px */
            /* header height has changed */
            padding-top: 80px;
        }
    }
    
    /* For screens with width less than 768px (Mobile screens) */
    @media only screen and (max-width: 767px) {
        #cd-cart {
            width: 85%; /* Width for mobile screens (90% of the screen) */
        }
    }
    
    #cd-cart {
        right: -100%;
        background: #FFF;
        -webkit-transition: right 0.3s;
        -moz-transition: right 0.3s;
        transition: right 0.3s;
    }
    
    #cd-cart.speed-in {
        right: 0;
    }
    
    #cd-cart > * {
        padding: 0 1em;
    }
    
    #cd-cart h2 {
        font-size: 14px;
        font-size: 0.875rem;
        font-weight: bold;
        text-transform: uppercase;
        margin: 1em 0;
    }
    
    #cd-cart .cd-cart-items {
        padding: 0;
    }
    
    #cd-cart .cd-cart-items li {
        position: relative;
        padding: 0;
        border-top: 1px solid #e0e6ef;
        list-style-type: none;
        margin: 0;
    }
    
    #cd-cart .cd-cart-items li:last-child {
        border-bottom: 1px solid #e0e6ef;
    }
    
    #cd-cart .cd-qty, #cd-cart .cd-price {
        color: #a5aebc;
    }
    
    #cd-cart .cd-price {
        margin-top: .4em;
    }
    
    #cd-cart .cd-item-remove {
        position: absolute;
        right: 1em;
        top: 50%;
        bottom: auto;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: url("../img/cd-remove-item.svg") no-repeat center center;
    }
    
    .no-touch #cd-cart .cd-item-remove:hover {
        background-color: #e0e6ef;
    }
    
    #cd-cart .cd-cart-total {
        padding-top: 1em;
        padding-bottom: 1em;
    }
    
    #cd-cart .cd-cart-total span {
        float: right;
    }
    
    #cd-cart .cd-cart-total::after {
        /* clearfix */
        content: '';
        display: table;
        clear: both;
    }
    
    /* Styles for the "Pay By" and "Selection" elements */
    .cd-cart-payment,
    .cd-cart-selection {
        margin-top: 1em;
    }
    
    .cd-cart-payment p,
    .cd-cart-selection p {
        font-size: 14px;
        font-size: 0.875rem;
        display: flex; /* Use flexbox to display elements in a row */
        align-items: center; /* Vertically center elements in the flex container */
    }
    
    .cd-cart-payment span,
    .cd-cart-selection span {
        flex-grow: 1; /* Allow the span to take up remaining space */
    }
    
    .cd-cart-payment select,
    .cd-cart-selection select {
        max-width: 200px;
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        font-size: 14px;
        font-size: 0.875rem;
        color: #333;
    }
    
    /* Align the select element to the right */
    .cd-cart-payment select, .cd-cart-selection select {
        float: right;
    }

    #cd-cart .checkout-btn {
        display: block;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: #7dcf85;
        color: #FFF;
        text-align: center;
        border: none;
        padding: 0;
    }
    
    .no-touch #cd-cart .checkout-btn:hover {
        background: #a2dda8;
    }
    
    #cd-cart .cd-go-to-cart {
        text-align: center;
        margin: 1em 0;
    }
    
    #cd-cart .cd-go-to-cart a {
        text-decoration: underline;
    }
    
    @media only screen and (min-width: 1200px) {
        #cd-cart > * {
            padding: 0 2em;
        }
        #cd-cart .cd-cart-items li {
            padding: 1em 2em;
        }
        #cd-cart .cd-item-remove {
            right: 2em;
        }
    }
    
    #cd-shadow-layer {
        position: fixed;
        min-height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background: rgba(67, 87, 121, 0.6);
        cursor: pointer;
        z-index: 2;
        display: none;
    }
    
    
    #cd-shadow-layer.is-visible {
        display: block;
        -webkit-animation: cd-fade-in 0.3s;
        -moz-animation: cd-fade-in 0.3s;
        animation: cd-fade-in 0.3s;
    }
    
    .cd-img-replace {
        white-space: nowrap;
    }
    
    /* Add styles for the close button */
    .cd-close-btn {
        position: absolute;
        top: 1em;
        right: 1em;
        cursor: pointer;
        font-size: 1.5rem;
        color: #26292f;
    }
    
    @-webkit-keyframes cd-fade-in {
        0% {
            opacity: 0;
        }
    
        100% {
            opacity: 1;
        }
    }
    
    @-moz-keyframes cd-fade-in {
        0% {
            opacity: 0;
        }
    
        100% {
            opacity: 1;
        }
    }
    
    @keyframes cd-fade-in {
        0% {
            opacity: 0;
        }
    
        100% {
            opacity: 1;
        }
    }
</style>

<link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">

<h3>Place Order 下单</h3>
<h4>Table {{$table -> table_id}}</h4>

<div id="cd-cart-trigger">
    <a class="cd-img-replace" href="#">
        <i class="fas fa fa-shopping-cart"></i>
        <sup>{{count($carts->where('orderID',null))}}</sup>
    </a>
</div>

<div id="cd-shadow-layer"></div>

<div id="cd-cart">
    <div id="cd-close-btn" class="cd-close-btn p-0 m-0">
        <i class="fas fa fa-times"></i>
    </div>
    <h2>Cart</h2>
    <form action="{{ url('confirmOrder') }}" method="POST">
        @csrf
        <input type="hidden" name="tableID" value="{{$table -> table_id}}">
        <ul class="cd-cart-items">
            @foreach($carts->where('orderID',null) as $cart)
                <li>
                    <span class="cd-qty">{{$cart -> quantity}}x</span> {{$cart -> fName}}
                    <div class="cd-price" name="amount">RM {{number_format($cart -> fPrice * $cart -> quantity,2)}}</div>
                    <a href="{{ url('deleteCart',['id' =>$cart -> id])}}" style="text-decoration: none;" class="cd-item-remove cd-img-replace">Remove</a>
                </li>
            @endforeach
        </ul>
    
        <div class="cd-cart-total">
            <p>Total <span id="total2" name="total2"></span></p>
            <input type="hidden" class="form-control form-control-plaintext" id="total" name="total">
        </div>
    
        <div class="cd-cart-payment">
            <p>Pay By 
                <span>
                    <select class="form-control form-control-inline" name="payment_method" required>
                        <option value="1">Cash 现金</option>
                        <option value="2">Tng 线上付款</option>
                    </select>
                </span>
            </p>
        </div>
        
        <div class="cd-cart-selection">
            <p>Selection 
                <span>
                    <select class="form-control form-control-inline" name="selection" required>
                        <option value="1">Dive In 堂食</option>
                        <option value="2">Take Away 打包</option>
                    </select>
                </span>
            </p>
        </div>
    
        <button type="submit" onclick="return confirm('Are you sure to place order now? 您确定现在要下单吗?')" class="checkout-btn">Confirm Order 确定订单</button>
    </form>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control search-food-id" placeholder="Search Food ID 搜索食物 ID">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="search form-control" placeholder="Search Food 搜索食物">
                </div> 
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-border results">
                <thead>
                    <tr>
                        <th>ID<br>编号</th>
                        <th>Image<br>图片</th>
                        <th>Name<br>名字</th>
                        <th>Price<br>价格(RM)</th>
                        <th></th>
                    </tr>
                    <tr class="waring no-result">
                        <th colspan="3"><i class="fa fa-warning">No Result</i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($foods as $food)
                            <tr class="p-0 m-0">
                                <td>{{$food -> id}}</td>
                                <td><img src="{{ asset('images/')}}/{{$food -> image}}" width="60px" height="60px"></td>
                                <td>{{$food -> name}}</td>
                                <td>{{number_format($food -> price,2)}}</td>
                                @if($food -> available == 0)
                                    <td><a href="#" style="pointer-events: none; cursor: default;" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a></td>
                                @elseif($food -> available == 1)
                                    <td><a class="btn btn-sm btn-success" style="color: white;" data-toggle="modal" data-target=".food{{$food -> id}}"><i class="fas fa-shopping-cart"></i></a></td>
                                @endif
                            </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($foods as $food)
<form action="{{ url('/add-to-cart') }}" method="POST">
    @csrf
    <input type="hidden" class="form-control" name="table_id" value="{{$table -> table_id}}">
    <input type="hidden" class="form-control form-control-plaintext" name="food_id" value="{{$food -> id}}">
    <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="padding:10px;">
                <div class="modal-header">
                    <h3 class="title" style="font-size: 20px; font-weight: bold;">Select Quantity 选择数量</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="input-group quantity">
                    <!--<div class="input-group-prepend decrement-btn changeQuantity">-->
                    <!--    <span class="input-group-text">-</span>-->
                    <!--</div>-->
                    <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food -> price}}">
                    <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" value="1" @if($food->stock !== null) max="{{$food->stock}}"@endif>
                    <!--<div class="input-group-append increment-btn changeQuantity">-->
                    <!--    <span class="input-group-text">+</span>-->
                    <!--</div>-->
                </div>
                
                @if(count($food -> foodSelect))
                    <div class="row text-center pt-3 pl-3">
                        @foreach($food->foodSelect as $foodSelect)
                            <input type="hidden" value="{{ $foodSelect->name }}" name="select[{{$foodSelect->id}}]">
                            <div class="col-md-6" style="width:50%;">
                                <strong>{{ $foodSelect->name }}</strong>
                                @foreach($foodSelect->foodOption as $foodOption)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="option[{{$foodSelect->id}}]" value="{{$foodOption->name}}">
                                        <label class="form-check-label">
                                            {{ $foodOption->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirm 确定</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<script src="{{ asset('js/waiter.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var prices = document.querySelectorAll('.cd-price');
        var total = 0.0;
        
        Array.from(prices).forEach(function(priceElement) {
            var amount = parseFloat(priceElement.textContent.replace('RM ', ''));
            if (!isNaN(amount)) {
                total += amount;
            }
        });
        
        var formattedTotal = total.toFixed(2);
        document.getElementById('total').value = formattedTotal;
        document.getElementById('total2').innerHTML = "RM " + formattedTotal;

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
        
        $(".search-food-id").keyup(function () {
            var searchTerm = $(".search-food-id").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, '');
            
            $(".results tbody tr").each(function(e) {
                var foodId = $(this).find("td:eq(0)").text();
                if (foodId.indexOf(searchSplit) !== -1) {
                    $(this).attr('visible', 'true');
                } else {
                    $(this).attr('visible', 'false');
                }
            });
            
            var visibleItems = $('.results tbody tr[visible="true"]');
            var jobCount = visibleItems.length;
            $('.counter').text(jobCount + ' item');
            
            if (jobCount === 0) {
                $('.no-result').show();
            } else {
                $('.no-result').hide();
            }
        });
    });
</script>

<script>
    $(window).on('load', function() {
        if (sessionStorage.getItem('onloadExecuted') === null) {
            var table_id = {{$table->table_id}};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // First AJAX request
            $.ajax({
                url: '{{ route('onload') }}',
                type: 'POST',
                data: {table_id: table_id},
                success: function(response) {
                    console.log(response.message);
                }
            });

            // Set a flag in sessionStorage to indicate that the code has been executed
            sessionStorage.setItem('onloadExecuted', 'true');
            window.location.reload();
        }
    });
</script>

<script type="text/javascript">
    // $(document).ready(function () {

    //     $('.increment-btn').click(function (e) {
    //         e.preventDefault();
    //         var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    //         var value = parseInt(incre_value, 10);
    //         value = isNaN(value) ? 0 : value;
    //         if(value<10){
    //             value++;
    //             $(this).parents('.quantity').find('.qty-input').val(value);
    //         }

    //     });

    //     $('.decrement-btn').click(function (e) {
    //         e.preventDefault();
    //         var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    //         var value = parseInt(decre_value, 10);
    //         value = isNaN(value) ? 0 : value;
    //         if(value>1){
    //             value--;
    //             $(this).parents('.quantity').find('.qty-input').val(value);
    //         }
    //     });
    // });
    
</script>

@endsection