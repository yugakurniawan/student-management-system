<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Student Management Systems - Garudev</title>
    <!-- Favicon -->
    <link rel="icon" href="{{url('/')}}/argon/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('/')}}/argon/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{url('/')}}/argon/css/argon.css?v=1.2.0" type="text/css">
    @yield('styles')
</head>

<body>
    <!-- Sidenav -->
    @include('layouts.argon-sidenav')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
    @include('layouts.argon-topnav')
        <!-- Header -->
        <!-- Header -->
        @yield('header')
        {{-- @include('layouts.argon-header') --}}


        @yield('container')

        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted ml-5">
                        &copy; 2020 <a href="https://instagram.com/yugakurniawan" class="font-weight-bold ml-1"
                            target="_blank">Yuga Kurniawan</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://github.com/yugakurniawan" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                                class="nav-link" target="_blank">IT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{url('/')}}/argon/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{url('/')}}/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/argon/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{url('/')}}/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{url('/')}}/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="{{url('/')}}/argon/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{url('/')}}/argon/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="{{url('/')}}/argon/js/argon.js?v=1.2.0"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('footer')
    @stack('scripts')
</body>

</html>
