<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url ('/temp/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('/temp/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="icon" href="{{url('/temp/img/logo.jpg')}}">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('components.navbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

        @include('components.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" >Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add-point-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Masukkan Point</h5>
            <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
            </div>
            <div class="modal-body">
            
            <form action="" method="POST">
                {{-- score --}}
                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-secondary " value="1">
                    <input type="submit" class="btn btn-outline-secondary " value="2">
                    <input type="submit" class="btn btn-dark " value="3">
                    <input type="submit" class="btn btn-dark " value="4">
                    <input type="submit" class="btn btn-primary " value="5">
                    <input type="submit" class="btn btn-primary " value="6">
                    <input type="submit" class="btn btn-danger " value="7">
                    <input type="submit" class="btn btn-danger " value="8">
                    <input type="submit" class="btn btn-warning " value="9">
                    <input type="submit" class="btn btn-warning " value="10">
                    <input type="submit" class="btn btn-warning " value="10*">
                </div>
                {{-- score --}}
            </form>
            {{-- text area --}}
            <textarea name="sum-score" id="sum-score" class="col-lg" rows="10" disabled></textarea>
            {{-- sum count --}}
            <input type="text" name="total" class="col-lg-3" disabled>
            {{-- button --}}
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button class="btn btn-success me-md-2" type="button">Add</button>
              </div>
            </div>
            </div>
        </div>
        </div>
    <!-- /Modal add-point-->


    <!-- Modal add-jarak-->
    <div class="modal fade" id="jarak" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Jarak Kamu dengan Target</h5>
            <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
            </div>
            <div class="modal-body">
                {{-- code here --}}

                {{-- end code --}}
            </div>
            </div>
        </div>
        </div>
    <!-- /Modal add-jarak-->


    <!-- Modal add-Jenis-->
    <div class="modal fade" id="jenis" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Jenis Busur</h5>
            <button type="button" class="btn btn-outline-danger text-reset" data-dismiss="modal" aria-label="Close">&#10060;</button>
            </div>
            <div class="modal-body">
                {{-- code here --}}
                
                {{-- end code --}}
            </div>
            </div>
        </div>
        </div>
    <!-- /Modal add-jenis-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('/temp/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/temp/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('/temp/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('/temp/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{url('/temp/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('/temp/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{url('/temp/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>