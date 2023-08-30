<!DOCTYPE html> 
<html>
  <head>
    <title>Menu菜单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Css -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6TPCFRQFYP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-6TPCFRQFYP');
    </script>
   <style>
   .body{
        background-image: url("https://cdn.wallpapersafari.com/47/46/IOFTRN.jpg");
    }
   
   .navbar{
       padding: 0.2rem 0.2rem !important;
       max-height:80px;
       overflow-x: auto;
   }
    .nav {
      display: flex;
      flex-wrap: nowrap;
      padding: 0;
      margin: 0;
      list-style: none;
    }
    
    .nav-item {
      margin-right: 10px;
      min-width:110px;
      height:50px;
    }
    
    .nav-link {
      color: #fff !important;
      text-decoration: none;
      padding: 6px !important;
      display: block;
      border: 2px solid transparent;
      border-radius: 20px;
      transition: background-color 0.3s ease;
    }
    
    .nav-link.active {
      background-color: #fff;
      color: #000 !important;
    }
    
    .category {
      margin-bottom: 20px;
      scroll-margin-top: 60px; /* Adjust the scroll margin to provide space for the fixed navbar */
    }
    
    /* Apply padding to the body to offset the fixed navbar */
    body {
      padding-top: 60px; /* Adjust the padding-top value to match the height of the fixed navbar */
    }
    
  </style>
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

            var channel3 = pusher.subscribe('menuRefresh-channel');
            channel3.bind('menu-refresh', function() {
                window.location.reload();
            });
            
            var channel4 = pusher.subscribe('waiterResponse-channel');
            channel4.bind('waiter-response', function(data) {
                var table = document.getElementById("table_id").value;
                if(data.table == table){
                    alert("Waiter is responsed to your call and on his way.");
                }
            });
            
            var channel5 = pusher.subscribe('multipleAddItem-channel');
            channel5.bind('multiple-add-item', function(data) {
                var table = document.getElementById("table_id").value;
                if(data.table == table){
                    alert("This item is already in the cart.");
                    window.location.reload();
                }
            });
        </script>

  </head>

  <body id="page-top">
        @include('functions.toastr')
        @if($table -> payment == null)
            <script>
                window.location.href = "/method/" + {{$table -> table_id}};
            </script>
        @endif
        <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <div class="nav-container">
              <div class="overflow-auto">
                <ul class="nav flex-nowrap">
                  <li class="nav-item">
                    <div class="d-flex flex-row">
                      @foreach ($categories as $category)
                        <div class="p-1">
                          <a class="nav-link" data-category="{{ $category->name }}" style="white-space: nowrap;">{{ $category->name }}</a>
                        </div>
                      @endforeach
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <div class="container mb-5">
            <div class="row mt-1 mb-1">
                <div class="col-12 d-flex justify-content-center" style="margin-top:5px;">
                    <form action="{{ url('changePayment')}}" method="POST">
                        @csrf
                        <input type="hidden" name="table_id" value="{{$table -> table_id}}">
                        <button type="submit" class="btn btn-primary rounded-pill" style="font-size:small;">Change payment method&nbsp;更换付款方式</button>
                    </form>
                </div>
                 <br>
                 <div class="col-12 d-flex justify-content-center" style="margin-top:5px;">
                    <a href="{{ url('lastOrder', ['id' => $table -> table_id]) }}" class="btn btn-warning rounded-pill ml-2" style="font-size:small;">View previous order 查看上个订单</a>
                </div>
                
               
                
            </div>
            <div class="row">
            @foreach($menu as $categoryName => $foods)
                    <div class="col-lg-12 col-md-12">
                        <br>
                        <div class="category" id="{{ $categoryName }}">
                           <h2>{{ $categoryName }}</h2>
                        </div>
                      @foreach($foods as $food)
                        <div class="card shadow">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('images/')}}/{{$food -> image}}" width="100px" height="100px">
                                </div>
                                <div class="col ml-2">
                                    <div class="h6 text-xs font-weight-bold text-primary text-uppercase mb-1">{{$food -> name}}</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{$food -> description}}</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">RM {{ number_format($food -> price,2) }}</div>
                                </div>
                                <div class="col-auto mr-2">
                                    @if($food -> available == 0)
                                        <a class="btn btn-danger rounded-10 text-white" style="font-size: 13px;;" disabled>Out of stock<br>缺货</a>
                                    @elseif($food -> available == 1)
                                        <a href="" data-toggle="modal" data-target="#food{{$food -> id}}" class="btn btn-success rounded-10" 
                                        style="font-size: 15px;">Add To Cart<br>加入购物车</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('/add-to-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
                            <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
                            <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
                            <div class="modal fade-sm" id="food{{$food ->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h3 class="title" style="font-size: 20px; font-weight: bold;">Select Quantity 选择数量</h3>
                                        </div>
                                        <div class="input-group quantity">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary decreaseBtn" type="button" id="decreaseBtn" data-target="#quantity_{{ $food->id }}">-</button>
                                                </span>
                                                <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food->price}}">
                                                <input type="number" class="form-control form-control-inline quantity-input" readonly id="quantity_{{ $food->id }}" name="quantity" min="1" @if($food->stock !== null) max="{{ $food->stock }}" @else max="9999" @endif value="1" style="text-align: center;">
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary increaseBtn" type="button" id="increaseBtn" data-target="#quantity_{{ $food->id }}">+</button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        @if(count($food -> foodSelect))
                                            <div class="row text-center pt-3 pl-3">
                                                @foreach($food->foodSelect as $foodSelect)
                                                    <input type="hidden" value="{{ $foodSelect->name }}" name="select[{{$foodSelect->id}}]">
                                                    <div class="col-md-11">
                                                        
                                                       <center> <strong>{{ $foodSelect->name }}</strong> </center>
                                                        @foreach($foodSelect->foodOption as $foodOption)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="option[{{$foodSelect->id}}]" value="{{$foodOption->name}}" data-price="{{$foodOption->price}}" required>
                                                                <label class="form-check-label">
                                                                    {{ $foodOption->name }} +RM {{number_format($foodOption->price, 2)}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        </center>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel 取消</button>
                                            <button type="submit" class="btn btn-primary">Confirm 确定</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
    
    
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        
        <script>
            $(document).ready(function() {
                var table_id = {{$table->table_id}};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                // First AJAX request
                $.ajax({
                    url: '{{ route('onUnload') }}',
                    type: 'POST',
                    data: {table_id: table_id},
                    success: function(response) {
                        console.log(response.message);
                    }
                });
                
                // Check for URL parameter and redirect
                if (window.location.href.indexOf('_token=') !== -1) {
                    window.location.href = "/home/" + table_id;
                }
            });
        </script>
    
        <!-- Scroll to section when a menu item is clicked -->
        <script>
            $(document).ready(function() {
                $('a[href^="#"]').on('click', function(event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - 50
                        }, 1000);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
        
                $(".increaseBtn").click(function() {
                    var targetInput = $($(this).data("target"));
                    var max = targetInput.attr("max");
                    var currentValue = parseInt(targetInput.val());
            
                    if (isNaN(currentValue)) {
                        currentValue = 0;
                    }
            
                    if (!isNaN(max) && currentValue < parseInt(max)) {
                        targetInput.val(currentValue + 1);
                    }
                });
            
                $(".decreaseBtn").click(function() {
                    var targetInput = $($(this).data("target"));
                    var currentValue = parseInt(targetInput.val());
            
                    if (isNaN(currentValue)) {
                        currentValue = 0;
                    }
            
                    if (currentValue > 1) {
                        targetInput.val(currentValue - 1);
                    }
                });

                var table = document.getElementById("table_id").value;
                if (window.location.href.indexOf('_token=') !== -1) {
                    window.location.href = "/home/" + table;
                }
            });
        
        </script>
        
        <script>
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                
                    var targetCategory = link.getAttribute('data-category');
                    var targetElement = document.getElementById(targetCategory);
                
                    // Calculate the offset to account for the fixed navbar height
                    var navbarHeight = document.querySelector('.navbar').offsetHeight;
                    var targetOffset = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                
                    window.scrollTo({ top: targetOffset, behavior: 'smooth' });
                
                    navLinks.forEach(function(navLink) {
                        navLink.classList.remove('active');
                    });
                    link.classList.add('active');
                });
            });
        </script>
    </body>
</html>
@include('auth.money')