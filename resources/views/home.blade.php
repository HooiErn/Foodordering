
<!DOCTYPE html> 
<html class="scroll-smooth">
  <head>
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Css -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            background-color: grey;
            color: white;
            padding: 3px 10px 4px 10px;
            border-radius: 4px;
          }
          
          .overlay{
            position: absolute;
            color: red;
            font-size: 30px;
            right: 25%;
            bottom:50%;
        }
    </style>
    
  </head>
  <body id="page-top">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Menu</span>
        <a href="{{ url('viewCart',['id' => $table -> table_id]) }}" class="fa fa-shopping-cart float-right" style="text-decoration:none;"><span class="text-danger"><sup>{{count($carts->where('orderID',null))}}</></span></a>
    </nav>
    <br>
    <div class="card-group" id="wrapper">
      @foreach($foods as $food)
          <div class="card">
            <div class="card-content">
              <img src="{{ asset('images/'.$food -> image)}}" alt="" class="image" style="width: 100%; height: 250px;">
              <h1 class="card-title">{{$food -> name}}</h1>
              <div class="card-body">
                  <p class="card-price">RM{{$food -> price}}</p>
              </div>
              <div class="card-footer border-0">
                  @if($food -> available == 1)
                    <a class="btn btn-success" data-toggle="modal" data-target=".food{{$food -> id}}">Add To Cart</a>
                  @elseif($food -> available == 0)
                    <span class="text-info">Not Available</span>
                  @endif
              </div>
            </div>
            @if($food -> available == 0)
              <div class="overlay">Out Of Stock!!</div>
            @endif
          </div>
        <form action="{{ url('/add-to-cart') }}" method="POST">
          @csrf
          <input type="hidden" name="food_id" value="{{$food->id}}" class="form-control">
          <input type="hidden" name="table_id" value="{{$table -> table_id}}" class="form-control">
          <input type="hidden" name="amount" value="{{$food->price}}" class="form-control">
          <div class="modal fade food{{$food -> id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="title">Select Quantity</h3>
                </div>
                <div class="input-group quantity">
                  <div class="input-group-prepend decrement-btn changeQuantity">
                      <span class="input-group-text">-</span>
                  </div>
                  <input type="hidden" class="price-input form-control" name="price" id="price" value="{{$food -> price}}">
                  <input type="number" class="qty-input form-control text-center" name="quantity" id="quantity" value="1">
                  <div class="input-group-append increment-btn changeQuantity">
                      <span class="input-group-text">+</span>
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <br>
      @endforeach
    </div>
    
    <a onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></a>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script>
    $(document).ready(function () {

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
    });

</script>
    <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      window.scrollTo({top: 0, behavior: 'smooth'});
    }
    </script>
 </body>
</html>