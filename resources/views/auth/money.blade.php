<!DOCTYPE html>
<html>
    <head>
       
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
           <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/refresh.css') }}" rel="stylesheet">
        <!-- @if(!Session::has('adminData'))
            <script type="text/javascript">
                window.location.href="{{url('admin/login')}}"
            </script>
        @endif    -->
        <style type="text/css">
           @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
            body{
                margin: 0;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                color: #212529;
                text-align: left;
                background-color: #f5f8fa;
            }
            .navbar-laravel
            {
                box-shadow: 0 2px 4px rgba(0,0,0,.04);
            }
            .navbar-brand , .nav-link, .my-form, .login-form,.topnav-link
            {
                font-family: Raleway, sans-serif;
            }
            .sidenav{
            height: 100%; 
            width: 0; 
            position: fixed; 
            z-index: 1; /* Stay on top */
            top: 0; 
            left: 0;
            background-color: #000;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
            overflow-x: hidden; 
            padding-top: 60px;
            transition: 0.5s; 
            }

            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            margin-top:0.5rem;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
            }

            .sidenav li:hover {
            background-color:grey;
            transition: 0.5s; 
            color:white;
            }

            .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }
            .my-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .my-form .row
            {
                margin-left: 0;
                margin-right: 0;
            }
            .login-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .login-form .row
            {
                margin-left: 0;
                margin-right: 0;
            }
            .img-circle{
                border-radius: 50%;
            }
            .topnav-link a{
                font-size:16px;
                text-decoration: none;
                margin:5px;
            }
            @media only screen and (max-width: 991px){
                .navbar-brand{
                    margin-right:100px !important;
                }
                .topnav-link{
                    margin-top:3px !important;
                }
                .nav-item{
                    margin-left:10px !important;
                }
            }
            @media(max-width: 799px){
                .navbar-brand{
                    margin-right:120px !important;
                }
                .topnav-link{
                    margin-top:3px !important;
                }
                .nav-item{
                    margin-left:10px !important;
                }
            }
            @media only screen and (max-width: 360px){
                .navbar-brand{
                    margin-right:160px !important;
                }
                .topnav-link{
                    margin-top:3px !important;
                }
                .nav-item{
                    margin-left:10px !important;
                }
            }
            .navbar {
    
      height: 60px; /* Adjust the height as needed */
      justify-content: center;
      align-items: center;
       display: flex;
      padding: 10px; /* Adjust the padding as needed */
    }

        </style>
    </head>

    <body>
      <!--TopNav first--> 
     
    <nav class="navbar" style=" background-image:linear-gradient(#2E2E2E,#2E2E2E); position: fixed; bottom: 0; width: 100%; height: 50px; padding: 10px; display: flex; justify-content: center; align-items: center;">
        
        <div class="container">
            @php
                $cartTotal = 0;
                $filteredCarts = $carts->where('table_id', $table->table_id)->where('orderID', null);
            @endphp
            
            @foreach ($filteredCarts as $cart)
                @php
                    $itemTotal = $cart->quantity * $cart->price;
                    $cartTotal += $itemTotal;
                @endphp
            @endforeach
         <a class="navbar" href="#">  <a href="{{ url('viewCart',['id' => $table -> table_id]) }}" class="fa fa-shopping-cart fa-fade"  style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;font-size:25px;color:white;">&nbsp;<span style="color:red; font-size:25px;"><sup>{{count($carts->where('table_id',$table -> table_id)->where('orderID',null))}}</> &nbsp; Cart 购物单 </span> &nbsp;</a></a> <h5 style="color:white;">RM {{$cartTotal}}</h5>  
         
    </nav> 
        
    <!--TopNav second--> 
     
        </div>
        </nav>
        @yield('content')
        <script>
            function openNav() {
            document.getElementById("mySideNav").style.width = "250px";
            }

            function closeNav() {
            document.getElementById("mySideNav").style.width = "0";
            }
            </script>
   
    </body>
</html>