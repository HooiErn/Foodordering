<!DOCTYPE html>
<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #0000A3;
}

.button2:hover {
  background-color: #0000A3;
  color: white;
}

</style>
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
    <body>
        <div class="top">
            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="btn border-0" id="cash"><button class="button button1">Cash</button></a>
            </div>
        </div>
        <div class="bottom">
            <div class="d-flex justify-content-center align-items-center text-align-center">
                <a href="#" class="btn border-0" id="touch"><button class="button button2">Touch 'n Go</button></a>
            </div>
        </div>

        <input type="hidden" id="table_id" value="{{$table -> table_id}}">
            
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

        <script>
            $(document).ready(function(){
                let id = $("input[type='hidden']").val();

                $("a[id='cash']").click(function(){
                    window.location.href = "/home/" + id;
                    localStorage.setItem("paymentMethod", 1);
                });
                
                $("a[id='touch']").click(function(){
                    window.location.href = "/home/" + id;
                    localStorage.setItem("paymentMethod", 2);
                });

                localStorage.removeItem("paymentMethod");
            })
        </script>
    </body>
</html>