<!Doctype html>
<html>
    <head>
        <title>Food Detail</title>
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

        </style>
    </head>
    <body>
        @foreach($viewFoods as $viewFood)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$viewFood -> name}}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$viewFood -> description}}</p>
                    @php $rateNumber = number_format($rating_value) @endphp
                    <div class="stars_rated">
                        @for($i=1; $i<=$rateNumber; $i++)
                            <i class="fa fa-star checked"></i>
                        @endfor
                        @for($j=$rateNumber+1; $j<=5; $j++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @if($ratings -> count() > 0)
                            <span>{{ $ratings -> count()}} Ratings</span>
                        @else
                            No Ratings
                        @endif
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Rating</button>
                </div>
                <form action="{{ url('/add-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" name="food_id" value="{{$viewFood -> id}}">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$viewFood -> name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
        @endforeach
    </body>
</html>