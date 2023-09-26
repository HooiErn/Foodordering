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

    <style>
        .scroll-to-bottom {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2.75rem;
            height: 2.75rem;
            text-align: center;
            color: #fff;
            background: rgba(90, 92, 105, 0.5);
            line-height: 46px;
            z-index: 9999;
        }
    
        .scroll-to-bottom:focus,
        .scroll-to-bottom:hover {
            color: white;
        }
    
        .scroll-to-bottom:hover {
            background: #5a5c69;
        }
    
        .scroll-to-bottom i {
            font-weight: 800;
        }
    </style>

    @if(Auth::user()->isAdmin())
        <script>
            window.location.href = "{{ url('admin/food') }}";
        </script>
    @elseif(Auth::user()->isKitchen())
        <script>
            window.location.href= "{{ url('kitchen/takenOrder') }}";
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
        <input type="hidden" id="name" value="{{Auth::user()->name}}">
        <!-- Toastr -->
        @include('functions.toastr')
        <!-- Sidebar -->
        
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;" id="mySidebar">
            <!-- Side Bar Title & Brand -->
            <a class="w3-bar-item w3-button d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon mt-4 mb-3">
                    Waiter's Page
                    <img src="https://cdn-icons-png.flaticon.com/512/1/1819.png" style="width:30px;height:30px">
                </div>
            </a>
            
            <!-- Divider -->
            <hr>

            <!-- Place Order 1 -->
            <a class="w3-bar-item w3-button" href="{{url('waiter/placeOrder')}}">
                <i class="fas fa-fw fa-download"></i>
                <span>Place Order 下单</span>
            </a>
            
            <!-- Place Order 2 -->
            <a class="w3-bar-item w3-button" href="{{url('waiter/placeOrder2')}}">
                <i class="fas fa-fw fa-download"></i>
                <span>Place Order2 下单2</span>
            </a>
            
            <!-- Work -->
            <a class="w3-bar-item w3-button" href="{{ url('waiter/work') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Work 工作<span class="badge badge-danger badge-counter ml-3">{{$count}}</span></span>
            </a>
            
            <!-- Show Work -->
            <a class="w3-bar-item w3-button" href="{{ url('waiter/showWork') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Show Work 显示工作</span>
            </a>
            
            <!-- Show Order -->
            <a class="w3-bar-item w3-button" href="{{ url('waiter/order') }}" onclick="clearLocalStorage()">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Report 报告</span>
            </a>
            
            <!-- Change Password -->
            <a class="w3-bar-item w3-button" data-toggle="modal" data-target="#changePassword" href="#">
                <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Change Password<br>换密码</span>
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
    
    <!-- Scroll to Bottom Button -->
    <a class="scroll-to-bottom rounded" href="#page-bottom" id="scrollToBottom">
        <i class="fas fa-angle-down"></i>
    </a>
            
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password 换密码</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('waiter/changePassword') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="form-floating">
                                    <label for="new_password">New Password 新密码</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <label for="confirm_password">Confirm Password 确认密码</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Changes 更换</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->has('new_password') || $errors -> has ('confirm_password'))
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#changePassword').modal('toggle');
            });
        </script>
    @endif
    
    
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    
    <script>
        function clearLocalStorage() {
            localStorage.removeItem("fromDate");
            localStorage.removeItem("toDate");
        }
    </script>
    
    <script>
        $(document).ready(function () {
            var scrollToBottomButton = $("#scrollToBottom");
    
            // Function to toggle the visibility of the scroll-to-bottom button
            function toggleScrollToBottomButton() {
                if ($(window).scrollTop() > 0) {
                    scrollToBottomButton.fadeOut();
                } else {
                    scrollToBottomButton.fadeIn();
                }
            }
    
            // Initial state
            toggleScrollToBottomButton();
    
            // Toggle the visibility of the scroll-to-bottom button on scroll
            $(window).scroll(function () {
                toggleScrollToBottomButton();
            });
    
            // Smooth scroll to the bottom when the button is clicked
            scrollToBottomButton.click(function (e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 800);
            });
            
        });
    </script>
    
    <!-- Pusher -->
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
        
        var channel2 = pusher.subscribe('callWaiter-channel');
        channel2.bind('call-waiter', function(data){
            toastr.info("Table " + data.table + " calling.");
            audio.play();
            setTimeout(function() {
                window.location.href = "{{ url('waiter/work') }}";
            }, 2000);
            
        });

        var channel3 = pusher.subscribe('donePrepare-channel');
        channel3.bind('done-prepare', function(data) {
            audio.play();
            toastr.info("Table " + data.table_id + " has done preparing. Please serve it.");
            setTimeout(function() {
                window.location.href = "{{ url('waiter/work') }}";
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