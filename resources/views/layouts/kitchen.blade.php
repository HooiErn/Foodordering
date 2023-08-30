<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Matomo -->
    <script>
      var _paq = window._paq = window._paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//foodorderapp.ctosweb.com/matomo/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Matomo Code -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NLTFTTN');</script>
    <!-- End Google Tag Manager -->

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-sidebar {
            color: white !important;
            background-color: #007BFF !important;
            transition: background-color 0.3s, color 0.3s !important;
        }
        
        .w3-sidebar a{
            text-decoration: none !important;
        }
    
        .w3-sidebar a.w3-bar-item.w3-button:hover {
            background-color: #0056b3 !important; /* Darker shade of blue */
            color: white !important;
        }
        
        .w3-dropdown-hover .w3-button:hover,
        .w3-dropdown-hover .w3-button:focus {
            background-color: #007bff; /* Hover/active background color */
            color: white; /* Hover/active text color */
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6TPCFRQFYP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-6TPCFRQFYP');
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
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLTFTTN"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;" id="mySidebar">
            <!-- Side Bar Title & Brand -->
            <a class="w3-bar-item w3-button d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon mt-4 mb-3">
                    Kitchen's Page
                    <img src="https://cdn-icons-png.flaticon.com/512/1/1819.png" style="width:30px;height:30px">
                </div>
            </a>
            
            <!-- Divider -->
            <hr>
            
            <!-- Food List -->
            <a class="w3-bar-item w3-button" href="{{ url('kitchen/food') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Food List 食物列表</span>
            </a>
            
            <!-- Current Order -->
            <a class="w3-bar-item w3-button" href="{{ url('kitchen/takenOrder') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Confirmed Orders已确认订单</span>
            </a>
            
            <!-- Divider -->
            <hr class="mr-2 ml-2">
            
            <!-- Logout -->
            <a class="w3-bar-item w3-button" href="{{ url('/logout') }}">
                <i class="fa fa-sign-out"></i>
                <span>Logout 登出</span>
            </a>
        </div>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar  -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebar_bar" class="btn btn-link" onclick="toggleSidebar()">
                        <i class="fas fa-bars"></i>
                    </button>
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('images/undraw_profile.svg')}}">
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid" id="container-fluid">
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
    
    <!-- Pusher -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        
        function refreshContent(){
            $.ajax({
                url: "{{ url('kitchen/takenOrder') }}", // Replace with your URL
                method: 'GET', // Adjust the method if necessary
                success: function(response) {
                     
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        var audio = new Audio('/sound/notification.mp3');
        var pusher = new Pusher('472896e216249f1fefdb', {
            cluster: 'ap1'
        });
        
        var channel = pusher.subscribe('refresh2-channel');
        channel.bind('refresh2', function(){
            window.location.reload();
        });

        var channel2 = pusher.subscribe('placeOrder-channel');
        channel2.bind('place-order', function(data) {
            audio.play();
            toastr.info("Table " + data.table_id + " has confirm order", "Notification", {
                closeButton: true,
                timeOut: 0,
                extendedTimeOut: 0,
            });
            setTimeout(function() {
                window.location.href = "{{ url('kitchen/takenOrder') }}";
            }, 2000);
        });
    </script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("mySidebar");
            var container = document.getElementById("content");
            var sidebarBar = document.getElementById("sidebar_bar");
    
            if (sidebar.style.display === "none") {
                // Open the sidebar
                var sidebarWidth = window.innerWidth >= 768 ? '15%' : '50%';
                container.style.marginLeft = sidebarWidth;
                sidebar.style.width = sidebarWidth;
                sidebar.style.display = "block";
                sidebarBar.innerHTML = '<i class="fas fa-times"></i>';
            } else {
                // Close the sidebar
                container.style.marginLeft = "0%";
                sidebar.style.display = "none";
                sidebarBar.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }
    </script>
</body>

</html>