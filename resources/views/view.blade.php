<style>
            .rating-css div {
                color: #ffe400;
                font-size: 30px;
                font-family: sans-serif;
                font-weight: 800;
                text-align: center;
                text-transform: uppercase;
                padding: 20px 0;
            }
            .rating-css input {
                display: none;
            }
            .rating-css input + label {
                font-size: 60px;
                text-shadow: 1px 1px 0 #8f8420;
                cursor: pointer;
            }
            .rating-css input:checked + label ~ label {
                color: #b4afaf;
            }
            .rating-css label:active {
                transform: scale(0.8);
                transition: 0.3s ease;
            }

            .checked{
                color: yellow;
            }

            .btn-a{
                text-align: left;
            }

            .btn-b{
                text-align: right;
            }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0ea31885d1.js" crossorigin="anonymous"></script>
     <!-- Styles -->
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <title>View Food</title>
</head>
<body>
    <div class="container">
    @foreach($viewFoods as $food)
        <div class="food">
            <br>
            <div class="top-icon">
                <div>
                   <a href="/menu"><i class="fas fa-arrow-left" style="color:white; font-size:24px;"></i></a> 
                </div>
                &nbsp;&nbsp;&nbsp;
                <div>
                    <h3 style="color:white; text-shadow: 3px 3px 3px black;">{{$food -> name}}</h3>
                </div>
                &nbsp;&nbsp;&nbsp;
                <div>
                <a href="/viewCart"><i class="fa fa-shopping-cart"  style="color:white;font-size:20px;"></i></a>
                </div>
            </div>

            <div class="col-md-9">
            <img src="{{asset('images/')}}/{{$food->image}}" style="width:250px;height:200px;">
             <br><br>
               <h5><div class="card-text"><strong><b style="color:red;">Price:&nbsp;</b></strong><b>RM {{number_format((float)$food -> price, 2, '.', '')}}</b></div></h5>
               
                    <p class="card-text" >Description: {{$food -> description}}</p>
                    <p class="available">Avaible: {{$food -> available}}</p>
                    @php $rateNumber = number_format($rating_value) @endphp
                    <input type="hidden" name="rating" value="{{$rateNumber}}">
                    <div class="stars_rated">
                        @for($i=1; $i<=$rateNumber; $i++)
                            <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j=$rateNumber+1; $j<=5; $j++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @if($ratings -> count() > 0)
                            <span>{{ $rateNumber}} Ratings</span>
                        @else
                            No Ratings
                        @endif
                    </div>
             </div> 
             <br>
             <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Rating</button>
             &nbsp; &nbsp; &nbsp;
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal">Add Cart</button>
                </div>
                <form action="{{ url('/add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{$food -> id}}">
                    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cartModalLabel">{{$food -> name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Please select the quantity:</p>
                                  
                                        <center>
                                        <select name="quantity" id="quantity" style="width:50px;">
                                            @for($i=1; $i<=$food -> available; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                      </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <form action="{{ url('/add-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{$food -> id}}">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$food -> name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="height:170px;">
                                    <div class="rating-css">
                                        <div class="star-icon">
                                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="product_rating" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="product_rating" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="product_rating" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="product_rating" id="rating5">
                                            <label for="rating5" class="fa fa-star"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>    
</body>
</html>