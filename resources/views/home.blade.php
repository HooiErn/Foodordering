@extends('layout')

@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .icon{
        text-align:center;
        padding-bottom:2px;
    }
    h6{
        text-align:center;
    }
</style>
<br><br><br>
<section class="product-catagories-wrapper py-3">
      <div class="container">
        <div class="product-catagory-wrap">
          <div class="row g-20">

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <i class="fa fa-qrcode" style="font-size:48px;"></i>
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
                  <a href="#">
                    <div class="icon">
                    <i class="fas fa-wallet" style="font-size:48px;"></i>
                    </div>
                  </a>
                  <h6>My Wallet</h6>
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
                    <i class="fa fa-star checked" aria-hidden="true" style="font-size:40px; color:yellow;"></i>
                    </div>
                  </a>
                  <h6>Rating</h6>
                </div>
               </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <i class="fa fa-user-circle" aria-hidden="true" style="font-size:40px; color:black;"></i>
                  </div>
                  </a>
                  <h6>Profile</h6>
                </div>
              </div>
            </div>

            <div class="col-4">
              <div class="card catagory-card">
                <div class="card-body">
                  <a href="#">
                    <div class="icon">
                    <i class="far fa-clock" style="font-size:40px; color:red;"></i>
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