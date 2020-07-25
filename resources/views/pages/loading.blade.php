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

@endsection