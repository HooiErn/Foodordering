<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0ea31885d1.js" crossorigin="anonymous"></script>
     <!-- Styles -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link rel="stylesheet" href="path/to/fontawesome.min.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <title>Menu</title>
</head>

<style>
    img{
        display:flex;
        width: 150px;
        max-width: 100%;
        height: 150px;
    }

    .top-left{
        position: absolute;
        top: 8px;
        left: 16px;
    }

    .bottom-right{
        position: absolute;
        bottom: 8px;
        right: 16px;
    }

    @media only screen and (min-width: 300px){
     
        img{
            display:flex;
            width:180px;
            max-width: 100%;
            height: 150px;
            font-size: 8px;
        }
    }

    @media only screen and (max-width: 400px){
        
        img{
            display:flex;
            width:180px;
            max-width: 100%;
            height: 150px;
            font-size: 8px;
        }
    }
    

    //Min x - x++
    //Max x-- - x
    @media only screen and (max-width: 300px){
        
        img{
            display:flex;
            width: 1000px;
            max-width: 100%;
            height: 1500px;
            font-size: 8px;
        }
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
                    <a href="{{route('logout')}}" onclick="return confirm('Are you sure you want to logout?')"><i class="fa fa-solid fa fa-right-to-bracket"  style="color:white;"></i></a>
                </div>
            </div>
            
           
        

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <div class="row">
        @foreach($foods as $food)
            <div class="col-5">
                <div class="box">
                <img src="{{asset('images/'.$food->image )}}" alt="Image" >
                <div class="top-left">
                    <h6 style="color:white; text-shadow: 3px 3px 3px black, 0 0 20px black, 0 0 10px black;">{{$food -> name}}</h6>
                </div>
                
                <div class="bottom-right">
                  <h6 style="color:white; text-shadow: 3px 3px 3px black, 0 0 20px black, 0 0 10px black;"> RM{{number_format((float)$food -> price, 2, '.', '')}}</h6>
                </div>
                
             </div>
             <br>
            </div>
        @endforeach
 </div>
        <br><br>
    </div>
    <div class="col-sm-1"></div>
</div>
   
</body>
</html>