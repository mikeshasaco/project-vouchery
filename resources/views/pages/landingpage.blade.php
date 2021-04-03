<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Marketplace for businesses to connect with customers">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>VoucheryHub: Marketplace  for businesses</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    	{{-- <link href="{{ asset('css/fontmaster.css') }}" rel="stylesheet"> --}}

    <link href="css/landing-template/bootstrap.css" rel="stylesheet">
    {{-- <link href="css/landing-template/fontawesome-all.css" rel="stylesheet"> --}}
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="css/landing-template/swiper.css" rel="stylesheet">
	<link href="css/landing-template/magnific-popup.css" rel="stylesheet">
	<link href="css/landing-template/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
	<link rel="shortcut icon" href="/vouchtab.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" href="{{ route('register') }}">Voucheryhub</a>

            <!-- Image Logo -->
            {{-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a>  --}}
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ route('homepage') }}">Marketplace <span class="sr-only">(current)</span></a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">FEATURES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#details">DETAILS</a>
                    </li> --}}

             
{{-- 
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">PRICING</a>
                    </li> --}}
                </ul>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('register') }}">REGISTER</a>
                    <a class="btn-outline-sm" href="{{ route('login') }}">LOG IN</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1 style="font-size: 38px;">Marketplace For Small Businesses, To Grow Customers, And Earn Money From There Promo Codes!  </h1>
                            {{-- <p class="p-large">Subscription base marketplace for online businesses to help earn extra income and expand</p> --}}
                            {{-- <p class="p-large">Marketplace designed to connect small businesses with customers, while giving businesses an extra source on income.</p> --}}
                            <a class="btn-solid-lg page-scroll" href="{{ route('register') }}">SIGN UP IS FREE</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                
                                <img class="img-fluid" src="marketplaceimage.png" style="margin-top: 85px;" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#b35464;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
    <!-- end of header -->


    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Benefits</div>
                    <h2 class="h2-heading">Our Goal is To Help Small Businesses!</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="online-shopping.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Drive Traffic From The Marketplace To Your <br> E-commerce Store</h4>
                            <p>Businesses can post there products deals on the marketplace, to drive traffic to there online store!</p>
                            {{-- <p>Sign up your business, set your subscription prices for your customers.</p> --}}
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="money-coin.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Earn Monthly Income From Your Deals!</h4>
                            <p>Businesses in the marketplace has the ablilty to create Subscription Plans for there discount codes to give to customers, in return customers recieve exclusive deals on that business products!</p>
                            {{-- <p>Once registered you can create a subscription for your business and create subscriber only deals for your customers.</p> --}}
                            {{-- <p>Create a subscription plan for your business that customers can subscribe to. You can give your customer deals on products.</p> --}}
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="graph.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Analytic Tool</h4>
                            {{-- <p>You can track the number of clicks for each deal that you post on the marketplace.</p> --}}
                            <p>Businesses can track there products clicks on the marketplace to gain more customers interest!</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->




    <!-- Description -->
    <div class="cards-1">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="above-heading">Marketplace</div>
                    <h2 class="h2-heading">Latest Deals In Marketplace</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                     @foreach($productrecords as $product)
 <div class="col-md-6 col-lg-4 col-12">
                    <div class="card" id="cardproduct" data-product-id="{{ $product->id }}">
                        <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/{{$product->image}}" alt="" height="283" width="180">
                            {{-- <img class="card-img-bottom" src="/images/{{ $product->image }}" height="283" width="180"> --}}
                      
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                            </h4>
                            <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description"> <b>{{$product->desc}}</b> </p>


                            

                             <hr class="firsthr" style="margin-bottom:0.1rem; margin-top:10px;">

                            <ul class="list-group list-group-flush">
                                    <div class="" style="display: flex;justify-content: space-between; padding-top:12px;">
                                        <div class="" style="display: flex;">
                                            <h5 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                            <h5 class="newprice5" style="cursor:pointer;color: green;margin-left: 5px;" title="Discount Price"> ${{ number_format($product->newprice, 2) }}</h5>
                                            <h5 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$product->percentageoff()}} OFF</h5>
                                        </div>
                                        
                                        @if(auth::user() || auth::guard('customer')->user())
                                        <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal
                                        </a>
                                        @else
                                            <a href="/register" class="cardbutton-page">View Deal</a>
                                        @endif
                                    </div>

                            </ul>
                           
                            <hr style="margin-top: 0.1rem; margin-bottom: 3px;">

                            <p style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; margin-left:-121px; cursor:pointer;"  title="Expiration Date">
                        
                    @if(empty($product->couponcode))
                            <i class="fas fa-tags" title="Discount Code"> </i>No Discount Code
                        @else
                          @if($product->coupon)
                            <i class="fas fa-tags" title="Discount Code"></i>Discount Code: {{$product->couponcode}}
                            @else
                            <i class="fas fa-tags" title="Discount Code" > </i>Discount Code: ******
                            @endif
                        @endif
                        
                            <p  style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;     margin-top: -28px;
    margin-left: 254px;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>

                            <hr style="margin-top: 0.1rem; margin-bottom:14px;">


                                


                            
                                <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:-10; left:0; color:black;" > <b>View More:</b>  <b style="  text-transform: capitalize;">{{$product->company}}</b> </a>

                                    {{-- <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }}); position:absolute; bottom:0; right:8px; width:50px; height:50px; "></div> --}}
                            
                        </div>
                    </div>
                </div>

                @endforeach
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


  


   



    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col first">
                        <h4>Voucheryhub.inc</h4>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Privacy Policy</h4>
                        <ul class="list-unstyled li-space-lg p-small">
                           
                            <li class="media">
                                <div class="media-body"><a class="white" href="{{route('termsof')}}">Terms & Condition</a>,<a class="white" href="{{route('privacy')}}">Privacy Policy</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Contact</h4>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <div class="media-body"><a class="white" href="{{route('faqroute')}}">FAQs</a></div>
                            </li>
                        </ul>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">&copy; {{ date('Y') }} VoucheryHub - All Rights Reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    {{-- @include('inc.signupblocker') --}}



    	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    	
    <!-- Scripts -->
    <script src="js/landing-template/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/landing-template/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/landing-template/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/landing-template/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/landing-template/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/landing-template/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/landing-template/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/landing-template/scripts.js"></script> <!-- Custom scripts -->


    
        <script>
// $('#overlay').modal('show');

setTimeout(function() {
    $('#overlay').modal('show');
}, 10000);


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


    <script type="text/javascript">
    $(document).ready(function() {
        var Swipes = new Swiper('.swiper-container', {
            autoplay: {
                delay: 3000,
            },
            speed: 500,
            slidesPerView: 'auto',
            loop: true,
        });
        $('.tab-login li, .pan').removeClass('active');

        var current_tab = localStorage.getItem("current_tab") || 'vouchpanel4',
            element     = $(".tab-login li")
                        .parent('div')
                        .find("[rel="+current_tab+"]")
                        .addClass('active');

    // new .pan code
    var pan = $('.pan')
        .parent('.wrapper-pan') // <-- This used to be .tab-pan (old parent)
        .find('.' + current_tab + '-content')
        .addClass('active')

        // this code is switching from tab to tab
    // im in the class tab-panels > ul tab-vouch > grabing the li
    $('.tab-pan .tab-login li').on('click', function() {
        var $panels = $(this).closest('.tab-pan');
        $panels.find('.tab-login li.active').removeClass('active');
        $(this).addClass('active');

        // use if to check which tab has class of current_tab
        if ($('.pan').hasClass(current_tab)) {
            $(this).addClass('active');
        }

        var loginpanelshow = $(this).attr('rel');

        $('.tab-pan .pan.active').stop().slideUp(300, function(){
        $(this).removeClass('active');
        $('#'+ loginpanelshow).slideDown(300, function(){
            $(this).addClass('active');
        });
        });

        // this is the code that i attempted to use local storage to save on refresh
        var relAtt = $(this).attr('rel');
        localStorage.setItem("current_tab", relAtt);
        /* console.log(relAtt); */
        });
    });
    </script>
</body>
</html>