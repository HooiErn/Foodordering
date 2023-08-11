<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6TPCFRQFYP"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
        
            gtag('config', 'G-6TPCFRQFYP');
        </script>
        <!-- Pusher -->
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
                    window.location.href() = window.location.href();
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
        </script>
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLTFTTN"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @if($table -> payment == null || $table -> selection == null)
            <script>
                window.location.href = "/method/" + {{$table -> table_id}};
            </script>
        @endif
        <input type="hidden" id="table_id" value="{{$table -> table_id}}">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                 <a href="#" onclick="home({{$table -> table_id}})"><i class="fa fa-arrow-left" aria-hidden="true" style="color: white;"></i></a>
                <a class="navbar-brand" href="">
                   Table {{str_pad($table -> table_id,3,'0',STR_PAD_LEFT)}}
                </a>
            </div>
        </nav>
        @include('functions.toastr')
    
        <div class="container">
            @yield('content')
            </div>
        <script>
            function home(id){
                window.location.href = "/home/" + id;
            }
        </script>
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
                        console.log(response.message);
                    }
                });
            });
        </script>
    </body>
</html>