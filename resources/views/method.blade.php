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
    </head>
    
    <style>
    body{
        background-image: url("https://thumbs.dreamstime.com/b/simple-background-one-color-monochrome-made-brush-painting-colors-blue-green-181107745.jpg");
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

.button3:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
     </style>
    <body> 
   @include('functions.toastr')
       <br><br><br>
       <center> <h3>Welcome to XXX Restaurant </h3> </center>
       <center> <h3>欢迎来到XXX餐馆</h3> </center>
       <br><br><br>
       <center> <h5>Please select your payment method :</h5> </center>
       <center> <h5>请选择您的付款方式 :</h5> </center>
        <div class="top">
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('home',['id' => $table -> table_id]) }}" method="GET">
                    @csrf
                    <input type="hidden" class="form-control" value="1" name="payment">
                    <button class="button button1" type="submit">Cash 现金 &nbsp;&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/2704/2704312.png" style="width:50px;height:50px;"></button>
                </form>
            </div>
        </div>
        @if($value == 2)
            <div class="center">
                <div class="d-flex justify-content-center align-items-center text-align-center">
                    <form action="{{ route('home',['id' => $table -> table_id]) }}" method="GET">
                        @csrf
                        <input type="hidden" class="form-control" value="2" name="payment">
                        <button class="button button2">Touch 'n Go 线上付款 &nbsp;&nbsp; <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSexKLDtXeIwF9mdCt_befE61MAFvBNyQxH_xLzUdY&s" style="width:50px;height:50px;"></button>
                    </form>
                </div>
            </div>
        @endif
         <br><br><br>
        @if(!count($work))
        <div class="bottom">
            <div class="d-flex justify-content-center align-items-center text-align-center">
                <form action="{{ url('callWaiter')}}" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="table_id" value="{{$table -> table_id}}">
                    <button type="submit" class="btn btn-success btn-rounded-50">Call Waiter 呼唤服务员</button>
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