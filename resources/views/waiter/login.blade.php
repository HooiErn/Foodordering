<!Doctype html>
<html>
    <head>
        <title>Waiter Login</title>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body>
        <!-- Toastr -->
        @include('functions.toastr')

        <div class="container">
            <section class="vh-100" style="background-color: #508bfc;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                <form method="POST" action="{{ url('waiter/login')}}">
                                    @csrf
                                    <div class="card-body p-5 text-center">
                                    <h3 class="mb-5">Sign in 登录</h3>
                                    <div class="form-outline mb-4 form-group">
                                        <label class="form-label" for="name">Name 名字 :</label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}" />
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4 form-group">
                                        <label class="form-label" for="password">Password 密码 : </label>
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        </div>
                                    </div>

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-start mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberme" name="rememberme" />
                                            <label class="form-check-label" for="form1Example3">Remember me 记得我</label>
                                        </div>

                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login 登录</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                        }
                    }
                });
            })
        </script>
    </body>
</html>