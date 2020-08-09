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

	<!-- Global site tag (gtag.js) - Google Ads: 757039582 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-757039582"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-757039582');
</script>

		
	{{-- ads --}}
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-1561005604675174",
			enable_page_level_ads: true
		});
		</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '387119268900181'); 
fbq('track', 'PageView');


</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=387119268900181&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
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

	{{-- <script>$('.dropdown-toggle').dropdown();</script> --}}
	<script type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ URL::asset('js/tabreload.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/clickfeature.js') }}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

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
