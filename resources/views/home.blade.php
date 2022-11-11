@extends('auth.layout')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
    .icon{
        text-align:center;
        padding-bottom:2px;
    }
    h6{
        text-align:center;
    }
</style>
<br><br>
<section class="product-catagories-wrapper py-3">
      <div class="container">
        <div class="product-catagory-wrap">
          <div class="row g-20">

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3082/3082394.png" style="width:50px;height:50px;">
                    </div>
                  </a>
                  <h6>QR Scan</h6>
                </div>
               </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <i class="fa fa-qrcode" style="font-size:48px; color:grey;"></i>
                  </div>
                  </a>
                  <h6>QR Code</h6>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="{{route('view.transactionHistory')}}">
                    <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/2997/2997300.png" style="width:50px;height:50px;">
                    </div>
                  </a>
                  <h6>History</h6>
                </div>
              </div>
            </div>
           
            </div>
            </div>
            </div>
</section>

<section class="product-catagories-wrapper py-3">
      <div class="container">
        <div class="product-catagory-wrap">
          <div class="row g-20">

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3163/3163809.png" style="width:50px;height:50px;">
                    </div>
                  </a>
                  <h6>Rating</h6>
                </div>
               </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="{{ route('profile')}}">
                    <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width:50px;height:50px;">
                  </div>
                  </a>
                  <h6>Profile</h6>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="{{route('menu')}}">
                    <div class="icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/1046/1046747.png" style="width:50px;height:50px;">
                    </div>
                  </a>
                  <h6>Menu</h6>
                </div>
              </div>
            </div>
           
            </div>
            </div>
            </div>
</section>
@endsection