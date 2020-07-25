@extends('layouts.master')
@section('content')
<style>
@keyframes load {
    0%{
        opacity: 0.08;
/*         font-size: 10px; */
/* 				font-weight: 400; */
				filter: blur(5px);
				letter-spacing: 3px;
        }
    100%{
/*         opacity: 1; */
/*         font-size: 12px; */
/* 				font-weight:600; */
/* 				filter: blur(0); */
        }
}

.animate {
	display:flex;
	justify-content: center;
	align-items: center;
	height:100%;
	margin: auto;
/* 	width: 350px; */
/* 	font-size:26px; */
	font-family: Helvetica, sans-serif, Arial;
	animation: load 1.2s infinite 0s ease-in-out;
	animation-direction: alternate;
	text-shadow: 0 0 1px white;
}
body, html{
	height: 96vh;
	background-color: #B35464;
	color: white;
}
</style>

<meta http-equiv="refresh" content="0.1;url= /account/{{Auth::user()->slug}}" />
<h2 class="animate">Voucheryhub</h2>

@endsection

@section('javascripts')

{{-- <script>
       setTimeout(function(){
            window.location.href = '/';
         }, 5000);
    
</script> --}}

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
fbq('track', 'MerchantRegistration');


</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=387119268900181&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

@endsection