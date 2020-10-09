<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('') }}/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ url('') }}/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('') }}/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ url('') }}/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('') }}/assets/img/favicon.png">
    @yield('styles')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts.navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('layouts.sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		{{-- <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="row">
                        <div class="col-md-12"> --}}
                            @yield('container')

		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ url('') }}/assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ url('') }}/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('') }}/assets/scripts/klorofil-common.js"></script>
    @yield('footer')
    @stack('scripts')
</body>

</html>
