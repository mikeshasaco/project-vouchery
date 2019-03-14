<!DOCTYPE html>
<html lang="en">

<!--  -->

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, target-densityDpi=device-dpi" />
	<script type="" src="/js/app.js"></script>
	
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>

{{--  tab icon--}}
	<link rel="shortcut icon" href="/vouchtab.png">
		
	{{-- ads --}}
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-1561005604675174",
			enable_page_level_ads: true
		});
		</script>

	<!--bootstrap  -->
	<link href="{{ asset('css/mobilenavbarcustom.css') }}" rel="stylesheet">
	<link href="{{ asset('css/merchantheader.css') }}" rel="stylesheet">
	<link href="{{ asset('css/vueproducts.css') }}" rel="stylesheet">
	<link href="{{ asset('css/setting.css') }}" rel="stylesheet">
	<link href="{{ asset('css/help.css') }}" rel="stylesheet">
	<link href="{{ asset('css/inputs.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="/css/app.css">
	<link href="{{ asset('css/master.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fontmaster.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/table.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	 @yield('styles')
	<title>@yield('title') VoucheryHub: Coupons, Deals</title>
</head>

<body>
	<!-- including a partial -->
@if(auth()->guard('customer')->check())
	@include('inc.customermobile')
	@include('inc.customernav')

@elseif (auth()->guard('web')->check())
	@include('inc.merchantmobile')
	@include('inc.nav')

@else
	@include('inc.mobilenavbar')
	@include('inc.guest')

@endif

	@include('inc.modal')

	

	@yield('content')


	<!-- footer -->

	@include('footer')


	<!-- dataTables -->

	<!-- bootstrap code  -->


	<!-- Recaptcha -->

	<script>
	@if(Session::has('successmessage'))

		new Noty({
			theme: 'relax',
			type: 'success',
			layout: 'topRight',
			timeout: 2500,
			text: '{{ Session::get('successmessage') }}',
		}).show();
	@endif

	</script>


		<script>
		@if(Session::has('DeleteCoupon'))

			new Noty({
				theme: 'relax',
				type: 'error',
				layout: 'topRight',
				timeout: 3000,
				text: '{{ Session::get('DeleteCoupon') }}',
			}).show();
		@endif

		</script>

	<script>
	@if(Session::has('limit-count'))

		new Noty({
			theme: 'relax',
			type: 'error',
			layout: 'topRight',
			timeout: 2500,
			text: '{{ Session::get('limit-count') }}',

		}).show();
	@endif

	</script>

	<script>
	@if(Session::has('advertisement-running'))

		new Noty({
			theme: 'relax',
			type: 'information',
			layout: 'topRight',
			timeout: 3000,
			text: '{{ Session::get('advertisement-running') }}',

		}).show();
	@endif

	</script>

	<script>
	@if(Session::has('advertisement-message'))

		new Noty({
			type: 'warning',
			layout: 'topRight',
			timeout: 3000,
			text: '{{ Session::get('advertisement-message') }}',

		}).show();
	@endif

	</script>
	<script>
	@if(Session::has('helpnoty'))

		new Noty({
			type: 'success',
			layout: 'topRight',
			timeout: 3000,
			text: '{{ Session::get('helpnoty') }}',

		}).show();
	@endif

	</script>
	<script>
	@if(Session::has('productfailed'))

		new Noty({
			theme: 'relax',
			type: 'error',
			layout: 'topRight',
			timeout: 3000,
			text: '{{ Session::get('productfailed') }}',

		}).show();
	@endif

	</script>
	<script>
	@if(Session::has('UpdateAccountMe'))

		new Noty({
			theme: 'relax',
			type: 'success',
			layout: 'topRight',
			timeout: 3000,
			text: '{{ Session::get('UpdateAccountMe') }}',

		}).show();
	@endif

	</script>
	<script>
	@if(Session::has('error-password'))

		new Noty({
			theme: 'relax',
			type: 'error',
			layout: 'topRight',
			text: '{{ Session::get('error-password') }}',

		}).show();
	@endif
	</script>
	<script>
	@if(Session::has('success-changepassword'))

		new Noty({
			theme: 'relax',
			type: 'success',
			layout: 'topRight',
			timeout: 4000,
			text: '{{ Session::get('success-changepassword') }}',

		}).show();
	@endif

	</script>

	<script>
	@if(Session::has('customer-changepassword'))

		new Noty({
			theme: 'relax',
			type: 'success',
			layout: 'topRight',
			timeout: 4000,
			text: '{{ Session::get('customer-changepassword') }}',

		}).show();
	@endif

	</script>
    <script>
$('#overlay').modal('show');

setTimeout(function() {
    $('#overlay').modal('show');
}, 5000);
</script>

	<script type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ URL::asset('js/tabreload.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/clickfeature.js') }}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	@yield('javascripts')


</body>

<!--
YOUR HERE WATCHING ME SO WHO THERE WATCHING YOU!

╭━┳━╭━╭━╮╮
┃┈┈┈┣▅╋▅┫┃
┃┈┃┈╰━╰━━━━━━╮                Your Most likely reading this in Brian voice:
╰┳╯┈┈┈┈┈┈┈┈┈◢▉◣              "I Was Told i would Never be successful and that
╲┃┈┈┈┈┈┈┈┈┈┈▉▉▉              I would be a failure in life Never give up"
╲┃┈┈┈┈┈┈┈┈┈┈◥▉◤
╲┃┈┈┈┈╭━┳━━━━╯
╲┣━━━━━━┫


 -->

</html>
