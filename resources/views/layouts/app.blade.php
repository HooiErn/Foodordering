<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
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
<body>
    @if($table -> payment == null)
        <script>
            window.location.href = "/method/" + {{$table -> table_id}};
        </script>
    @endif
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                 <a href="#" onclick="home({{$table -> table_id}})"><i class="fa fa-arrow-left" aria-hidden="true" style="color: white;"></i></a>
                <a class="navbar-brand" href="">
                   Table {{str_pad($table -> table_id,3,'0',STR_PAD_LEFT)}}
                </a>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
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
                    console.log(response);
                }
            });
        });
    </script>
    <script>
        
    </script>
</body>
</html>