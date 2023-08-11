<!Doctype html>
<html>
    <head>
        <title>Login Form</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6TPCFRQFYP"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
        
            gtag('config', 'G-6TPCFRQFYP');
        </script>
        <style>
            body {
                background-color: #f8f9fa; /* Specify your desired color code */
            }
            .btn-color{
                background-color: #0e1c36;
                color: #fff;
                
            }

            .profile-image-pic{
                height: 200px;
                width: 200px;
                object-fit: cover;
            }

            .cardbody-color{
                background-color: #ebf2fa;
            }

            a{
                text-decoration: none;
            }
            
            .rememberme{
                display: flex;
                align-items: center;
                padding-bottom: 5px;
                margin-top: -5px;
            }

            .rememberme span{
                padding-left: 5px;
                padding-right: 5px;
            }
        </style>
    </head>
    <body>
        <!-- Toastr -->
        @include('functions.toastr')
        
        <!--<a href="{{ url('test') }}" class="btn btn-success">Print</a>-->

        <div class="container bg-light">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <br>
                    <h2 class="text-center mt-4 mb-4 text-dark">Login</h2>
                    <div class="card my-2">
                        <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ url('/checkLogin')}}">
                            @csrf
                            <div class="text-center">
                                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control @error('name') is_invalid @enderror" name="name" aria-describedby="emailHelp" placeholder="User Name"  @if(Cookie::has('name')) value="{{Cookie::get('name')}}" @endif required>
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is_invalid @enderror" name="password" placeholder="Password"  @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif required>
                            </div>

                            <div class="rememberme">
                                <input type="checkbox" name="rememberme" id="rememberme" @if(Cookie::has('name')) checked @endif><span>Remember Me 保存</span>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-color px-5 mb-5 w-100">Login 登录</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function(){
                $.get('{{ route('auth.check') }}', function (response) {
                    if (response.authenticated) {
                        if (response.role === 1) {
                            window.location.href = '/admin/takenOrder';
                        } else if (response.role === 2) {
                            window.location.href = '/waiter/work';
                        } else if(response.role === 3) {
                            window.location.href = '/kitchen/takenOrder';
                        }
                    }
                });
            })
        </script>
    </body>
</html>

