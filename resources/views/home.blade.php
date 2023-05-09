
<!DOCTYPE html> 
<html>
  <head>
    <title>Menu菜单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Css -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<style>
      nav a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
      }

      /* Style for each section */
      section {
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 3em;
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

            var channel3 = pusher.subscribe('refresh2-channel');
            channel3.bind('refresh2', function(data) {
                window.location.reload();
            });

        </script>
  </head>

  <body id="page-top">
      @if($table -> payment == null)
        <script>
            window.location.href = "/method/" + {{$table -> table_id}};
        </script>
    @endif
    <input type="hidden" id="table_id" value="{{$table -> table_id}}">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Menu 菜单</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @foreach ($categories as $category)
          <li class="nav-item">
            <a class="nav-link" href="#{{ $category->name }}">{{ $category->name }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>

    
    <div class="container">
        <div class="row mt-1 mb-1">
            <div class="col-12 d-flex justify-content-center">
                <form action="{{ url('changePayment')}}" method="POST">
                    @csrf
                    <input type="hidden" name="table_id" value="{{$table -> table_id}}">
                    <button type="submit" class="btn btn-primary rounded-pill">Change payment method&nbsp;更换付款方式</button>
                </form>
            </div>
        </div>
        <div class="row">
        @foreach($menu as $categoryName => $foods)
                <div class="col-lg-12 col-md-12">
                    <br>
                    <div class="section" id="{{ $categoryName }}">
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
                               <a href="{{ url('food-detail', ['id' => $food -> id, 'table_id' => $table -> table_id]) }}" data-toggle="modal" data-target=".food{{$food -> id}}" class="btn btn-success rounded-10">Add To Cart<br>加入购物车</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <form action="{{ url('/add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
                    <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
                    <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
                    <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">Select Quantity 选择数量</h3>
                                </div>
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
                                 <input type="hidden" value="" name="select">
        <div class="row">
            <div class="col-md-6">
                <center>
                <div class="form-group">
                    <b><label class="control-label" style="font-size: 16px;">Sugar Level:</label></b>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="no_sugar"> No sugar
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="less_sugar"> Less sugar
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="sugar_level" value="standard"> Standard
                        </label>
                    </div>
                  </center>
                </div>
            </div>
            <div class="col-md-6 ml-auto">
                <center>
                <div class="form-group">
                    <b><label class="control-label" style="font-size: 16px;">Ice Level:</label></b>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="ice_level" value="no_ice"> No ice
                        </label>
                    </div>
                    <div class="radio">
                        <label style="font-size: 14px;">
                            <input type="radio" name="ice_level" value="ice"> Ice
                        </label>
                    </div>
                </div>
                </center>
            </div>
      
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm 确定</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <script>
        $(document).ready(function(){
            var table_id = {{$table -> table_id}};
            if (window.location.href.indexOf('_token=') !== -1) {
                window.location.href = "/home/" + table_id;
            }
        });
</script>
<!-- Load jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Scroll to section when a menu item is clicked -->
<script>
    $(document).ready(function() {
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    });
</script>
</body>
</html>
@include('auth.money')