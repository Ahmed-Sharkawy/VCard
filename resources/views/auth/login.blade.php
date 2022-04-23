<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('front/Img/icon-logo.svg') }}" type="image/png">
    <link rel="icon" href="{{ asset('front/Img/icon-logo.svg') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/dist/css/style.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>VCart</b>LOGIN</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (Session::has('success'))
                    <p style="color: red" class="text-center">{{ Session::get('success') }}</p>
                @endif
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    @error('email')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-0">
                    <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
