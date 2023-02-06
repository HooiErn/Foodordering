<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html>
    <head>
        <title>Select Payment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     </style>
    <body> 
       <br><br><br>
       <center> <h3>Welcome to XXX Restaurant</h3> </center>
       <center> <h5>Please select your payment method:</h5> </center>
        <div class="top">
            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="btn border-0" id="cash"><button class="button button1">Cash &nbsp;&nbsp;<img src="https://cdn-icons-png.flaticon.com/512/2704/2704312.png" style="width:50px;height:50px;"></button></a>
            </div>
        </div>
        <div class="bottom">
            <div class="d-flex justify-content-center align-items-center text-align-center">
                <a href="#" class="btn border-0" id="touch"><button class="button button2">Touch 'n Go &nbsp;&nbsp; <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSexKLDtXeIwF9mdCt_befE61MAFvBNyQxH_xLzUdY&s" style="width:50px;height:50px;"></button></a>
            </div>
        </div>

        <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <input type="hidden" id="payment" value="{{$table -> payment}}">
            
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        @if($table -> payment !== null)
            <script>
                let id = $("input[id='table_id']").val();
                let payment = $("input[id='payment']").val();
                window.location.href = "/home/" + id + "/" + payment;
            </script>
        @endif
        <script>
            $(document).ready(function(){
                let id = $("input[id='table_id']").val();

                $("a[id='cash']").click(function(){
                    window.location.href = "/home/" + id + "/" + 1;
                });
                
                $("a[id='touch']").click(function(){
                    window.location.href = "/home/" + id + "/" + 2;
                });
            })
        </script>
    </body>
</html>