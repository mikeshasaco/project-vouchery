<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<script type="" src="/js/app.js"></script>

	<!--bootstrap  -->
	<link href="lib/noty.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/app.css">
	<link href="{{ asset('css/master.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fontmaster.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/table.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> @yield('styles')
	<title>@yield('title') VoucheryHub: Coupons, Deals</title>
</head>

<body>
	<!-- including a partial -->

	@include('inc.customernav')

	@yield('content')

	<!-- footer -->

	@include('footer')

	<!-- dataTables -->

	<!-- bootstrap code  -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

	<script type="text/javascript"></script>

	@yield('javascripts')

</body>

</html>
