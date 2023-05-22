<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Fonts -->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Toastr  -->
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Css -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var audio = new Audio('/sound/notification.mp3');
        var pusher = new Pusher('472896e216249f1fefdb', {
            cluster: 'ap1'
        });
        
        var channel = pusher.subscribe('refresh2-channel');
        channel.bind('refresh2', function(){
            window.location.reload();
        });

        var audio = new Audio('/sound/notification.mp3');
        var channel2 = pusher.subscribe('placeOrder-channel');
        channel2.bind('place-order', function(data) {
            toastr.info("Table " + data.table + " has confirm order");
            audio.play();
            setTimeout(function() {
                window.location.href = "{{ url('kitchen/takenOrder') }}";
            }, 2000);
        });
    </script>

    @if(Auth::user()->isAdmin())
        <script>
            window.location.href = "{{ url('admin/food') }}";
        </script>
    @elseif(Auth::user()->isWaiter())
        <script>
            window.location.href= "{{ url('waiter/work') }}";
        </script>
    @endif
</head>

<body id="page-top">
    @php
        $data1 = DB::table('orders')->where('status', 1)->where('waiter',null)->count();
        $data2 = DB::table('works')->where('waiter',null)->count();
        $count = $data1 + $data2;
    @endphp
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Toastr -->
        @include('functions.toastr')
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    Kitchen's Page
                    <img src="https://cdn-icons-png.flaticon.com/512/3462/3462049.png" style="width:25px;height:25px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Food List -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('kitchen/food') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Food List 食物列表</span>
                </a>
            </li>
                
            <!-- Nav Item - Order List -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('kitchen/takenOrder') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Confirmed Orders已确认订单</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}">
                    <i class="fas fa-fw fa-sign-out-alt "></i>
                    <span>Logout 登出</span>
                </a>
            </li>


        </ul>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar  -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('images/undraw_profile.svg')}}">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('functions.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>