<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0ea31885d1.js" crossorigin="anonymous"></script>
     <!-- Styles -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <title>Menu</title>
</head>

<style>
    h3 {
        color: white;
  text-shadow: 3px 3px 3px black, 0 0 20px black, 0 0 10px black;
  }
</style>

<body>
    <div class="container">
        <div class="profile">
            <div class="top-icon">
                <div>
                   <a href="home"><i class="fas fa-arrow-left" style="color:white;"></i></a> 
                </div>
                <div>
                    <h4>Menu</h4>
                </div>
                <div>
                    <a href="#"><i class="fas fa-ellipsis-v"  style="color:white;"></i></a>
                </div>
            </div>
            
           
        

<div class="center">
    <div class="col-sm-2"></div>
    <div class="col-sm-9" style="padding-left:0; margin-right:40px;">
        <br><br>
        <div class="center">    
            @foreach($foods as $food)
            <div class="col-sm-2">
            <div class="card" style="width: 18rem; height: 300">
                <img class="card-img-top img-fluid" src="{{asset('images/'.$food->image )}}" alt="Image" style='height: 220px; width: 35rem;'>
                <h3  style="position: absolute; float: right;margin-left:3px;">{{$food->name}}</h3>
                <h5  style=" position: absolute; margin-top:32px; margin-left:3px;float: right; color: red;">RM{{number_format((float)$food -> price, 2, '.', '')}}</h5>
                <div class="card-body">
                    <h5 class="card-text" style="text-align: center; color: black;">{{$food->description}}</h5> 
                    <br>
                    <h5 class="card-text" style="text-align: center; color: black;">Available: {{$food->available}}</h5>
                    <br>
                    <h5 class="card-text" style="text-align: center; color: black;">{{$food->categoryID}} </h5>
                     <br>
                 <a href="#" class="btn btn-primary" style="text-align: center;">Order</a> 
                </div>
            </div>
            <br>
            <br>
            </div>
            @endforeach
        </div>    
        <br>
    </div>
    <div class="col-sm-2"></div>
</div>
   
</body>
</html>