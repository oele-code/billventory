<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Stock @yield('title')</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" >
		<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css ') }}">
		<link rel="stylesheet" href="{{ asset('/css/buttons.dataTables.min.css ') }}">
		<link rel="stylesheet" href="{{ asset('/css/buttons.bootstrap.min.css') }}">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('/css/select2.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/select2-bootstrap.min.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		@if( Auth::user() )
			@include('navbar')
		@endif
		<div class="container-fluid">
			@yield('content')
		</div>
		<p class="small text-center">Hecho con <i class="glyphicon glyphicon-heart"></i> por <a href="http:oele.co">oele.co</a></p>
		<!-- jQuery -->
		<script src="{{ asset('/js/jquery.js') }}"></script>
		<!-- DataTables -->
		<script src="{{ asset('/js/jszip.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
		<!-- Bootstrap JavaScript -->
		<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<!-- Select JavaScript -->
		<script src="{{ asset('/js/select2.min.js') }}"></script>
		<!-- Bootstrap number -->
		<script src="{{ asset('/js/bootstrap-number-input.js') }}"></script>
 		<script src="{{ asset('/js/app.js') }}"></script>
 		@yield('script')
	</body>
</html>