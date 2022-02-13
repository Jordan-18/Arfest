<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login-UAC</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('/temp/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('/temp/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="icon" href="{{url('/temp/img/logo.jpg')}}">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    {{-- flash --}}
                                    @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert" id="success">
                                        Registration Successfull, Please Login.
                                    </div>
                                    @endif
                                    @if (session()->has('loginerror'))
                                        <div class="alert alert-danger" role="alert" id="loginerror">
                                            Username / Password Salah
                                        </div>
                                    @endif
                                    {{-- flash --}}
                                    <form class="{{route('login-auth')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            {{-- email --}}
                                            <input type="text" name="name" class="form-control form-control-user" placeholder="Enter Username..." value="{{ old('name')}}">
                                            {{-- end email --}}
                                        </div>
                                        {{-- end email --}}
                                        <div class="form-group">
                                            {{-- pass --}}
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" autocomplete="off">
                                            <div class="custom-control custom-checkbox mt-3">
                                                <input type="checkbox" class="custom-control-input" id="showpassword">
                                                <label class="custom-control-label" for="showpassword" onclick="showpassword()">Show password</label>
                                            </div>
                                            {{-- end pass --}}
                                        </div>
                                        <button type="submit" href="#" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('forget-pass')}}">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register')}}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('index')}}">
                                            <i class="fas fa-user-friends"></i>
                                            Log In As Guest</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="{{url('/temp/js/main.js')}}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('/temp/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/temp/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('/temp/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('/temp/js/sb-admin-2.min.js')}}"></script>

    <script>
        setTimeout(() => {
            $('#success').slideUp('fast');
            $('#loginerror').slideUp('fast');
        }, 1500);
    </script>

</body>

</html>