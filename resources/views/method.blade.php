<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html>
    <head>
        <title>Select Payment Method选择付款方式</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6TPCFRQFYP"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
        
            gtag('config', 'G-6TPCFRQFYP');
        </script>
    </head>
    
    <style>
    body{
        background-image: url("https://cdn.wallpapersafari.com/47/46/IOFTRN.jpg");
    }
    
    .button1 {
     border-radius: 12px;
  }
  
  .button1:active {
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
    
    .button2:active {
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }
    
      .button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #1102de;
     border-radius: 12px;
  }
  
  .button2:hover {
    background-color: #1102de;
   
  }
        
    .button3 {
      padding: 6px 9px;
      font-size: 15px;
      text-align: center;
      cursor: pointer;
      outline: none;
      color: #fff;
      background-color: #04AA6D;
      border: none;
      border-radius: 15px;
      box-shadow: 0 0px #999;
    }
    
    .button3:hover {background-color: #3e8e41}
    
    
     </style>
    <body> 
   @include('functions.toastr')
   @if(Auth::check())
            @if(Auth::user()->isWaiter())
                <script>
                    window.location.href = "{{ url('waiter/work') }}";
                </script>
            @elseif(Auth::user()->isAdmin())
                <script>
                    window.location.href = "{{ url('admin/food') }}";
                </script>
            @elseif(Auth::user()->isKitchen())
                <script>
                    window.location.href = "{{ url('kitchen/takenOrder') }}";
                </script>
            @endif
        @endif
       <br><br><br>
       
       <center><h3><i>Table {{$table -> table_id}}</i></h3></center>
       <br>
        <div class="top">
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('home',['id' => $table->table_id]) }}" method="GET">
                    @csrf
                    <center> <h5>Please select your way of eating :</h5> </center>
                    <center> <h5>请选择您的用餐方式 :</h5> </center>
                
                    <div class="form-check">
                       <center> <input class="form-check-input" type="radio" name="selection" value="1" id="diveIn" required checked>
                        <label class="form-check-label" for="cashRadio"><h6 style="color:blue;">&nbsp; Dive In 堂食</h6></label></center>
                    </div>
                
                    <div class="form-check">
                      <center><input class="form-check-input" type="radio" name="selection" value="2" id="takeAway" required>
                        <label class="form-check-label" for="tngRadio"><h6 style="color:blue;">&nbsp; Take Away 外带</h6></label></center>
                    </div>
                      <br><br><br>
                    <center> <h5>Please select your payment method :</h5> </center>
                    <center> <h5>请选择您的付款方式 :</h5> </center>
                    
                    <center><button class="button button1" type="submit" name="payment" value="1">Cash 现金 &nbsp;&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/2704/2704312.png" style="width:50px;height:50px;"></button></center>
                    
                   <center> <button class="button button2" type="submit" name="payment" value="2">Touch 'n Go 线上付款 &nbsp;&nbsp;<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSexKLDtXeIwF9mdCt_befE61MAFvBNyQxH_xLzUdY&s" style="width:50px;height:50px;"></button> </center>
                </form>
            </div>
         
        @if(!count($work))
        <div class="bottom">
            <div class="d-flex justify-content-center align-items-center text-align-center">
                <form action="{{ url('callWaiter')}}" method="POST" onclick="return confirm('Are you sure to call waiter? 您确定要呼叫服务员吗?')">
                    @csrf
                    <input type="hidden" class="form-control" name="table_id" value="{{$table -> table_id}}">
                    
                    <button type="submit" class="btn btn-white btn-rounded-50"><i class='fas fa-bell' style="color:#FFFF5C; "> <b style="color:black;"> Call waiter 呼叫服务员 </b> </i></button>
                </form>
            </div>
        </div>
        @endif
             
        <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <input type="hidden" id="payment" value="{{$table -> payment}}">
            
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        @if($table -> payment !== null)
            <script>
                let id = $("input[id='table_id']").val();
                window.location.href = "/home/" + id;
            </script>
        @endif
        <script>
            $(window).on('load', function() {
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
    </body>
</html>