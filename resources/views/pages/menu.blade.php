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
    

    .top-left{
        position: absolute;
        top: 8px;
        left: 16px;
    }

    .bottom-right{
        position: absolute;
        bottom: 13px;
        right: 16px;
    }

    @media only screen and (min-width: 300px){
     
        img{
            display:flex;
            width: 200px;
            max-width: 100%;
            height: 150px;
            font-size: 8px;
        }
    }

    @media only screen and (max-width: 400px){
        
        img{
            display:flex;
            width: 200px;
            max-width: 100%;
            height: 150px;
            font-size: 8px;
        }
    }
    
    @media only screen and (min-width: 200px){
     
     img{
         display:flex;
         width: 200px;
         max-width: 100%;
         height: 100px;
         font-size: 8px;
        }
 }


    //Min x - x++
    //Max x-- - x
    @media only screen and (max-width: 1000px){
        
        img{
            display:flex;
            width: 200px;
            max-width: 100%;
            height: 150px;
            font-size: 8px;
        }
    }

    .search-bar{
    width:100%;
    max-width: 100%;
    background: rgba(92, 48, 115, 0.2);
    align-items: center;
    border-radius: 60px;
    padding: 10px 20px;
    margin-top: 10px;
    margin-bottom: 10px;
}

.search-bar .input{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-bar .input input{
    background: transparent;
    flex: 1;
    border: 0;
    outline: none;
    color: #aeaaf8;
}


.search-bar .input button{
    border: 0;
    border-radius: 50%;
    
}

.search .input{
    display: flex;
    justify-content: center;
    align-items: flex-end;
}

.my-button{
    border-radius: 5px;
    border: 1px solid #000;
    padding: 2px 5px;
    background: white;
    font-size: 1em;
    cursor: pointer;
}

.search{
    border-radius: 5px;
    background: black;
}
</style>

<body>
    <div class="container">
        <div class="profile">
            <div class="top-icon">
                <div style="padding-left:10px;">

                </div>
                <div>
                    <h4>Menu</h4>
                </div>
                <div>
                    <a href="/viewCart"><i class="fa fa-shopping-cart"  style="color:white;font-size:20px;"></i></a>
                </div>
            </div>
            
            <form class="search-bar" action="{{route('search.food')}}" method="POST" style="margin:auto;width:360px;">
                 @csrf
                 <div class="input">
            <input type="search" placeholder="Search..." name="keyword" style="width:190px; color:black;">
            <button type="submit"><i class="fa fa-search"></i></button>
                 </div>
                </form>
            <br>
            <a href="/all"><button class="my-button">All</button></a>
            <a href="/noodles"><button class="my-button">Noodles</button></a>
            <a href="/rice"><button class="my-button">Rice</button></a>
            <a href="/drink"><button class="my-button">Drink</button></a>
            <a href="/dessert"><button class="my-button">Dessert</button></a>
        
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <div class="row">
        @foreach($foods as $food)
        
            <div class="col-6">
                <div class="box">
                <a href="{{ route('view.food', ['id' => $food->id]) }}"><img src="{{asset('images/'.$food->image )}}" alt="Image" ></a>
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