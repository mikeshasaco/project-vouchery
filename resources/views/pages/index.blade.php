@extends('layouts.master')
@section('content')
    <section id="banner-homepage" class="d-none d-lg-block">
        <div class="d-none d-lg-block container" >
            <div class="row">
                <h1 style="color: black;"><b>Voucheryhub Marketplace for businesses with Deals </b></h1>                <form class="navbar-form" action="{{ route('search') }}" method="GET">
                    <div id="custom-search-input">
                        <div class="input-group  col-md-12">
                            <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search Through Deals... ">
                        </div>
                    </div>
                </form>
                <div class="trend">
                    <h5> <b>Trending Categories</b></h5>
                    <ul class="topic">
                        @forelse($categoriess as $cattopic)
                        <li class="cat-topic" >
                            <a  href="businesses/{{$cattopic->catslug}}">{{ $cattopic->categoryname }}
                            </a>
                        </li>
                        @empty
                        <h6> <i> (No Categories Currently Trending)</i></h6>
                        @endforelse
                    </ul>
                </div>
                <!-- <div class="col-md-9">
                <h4 style="text-align:center;"><b> Weekly Deals From Online Businesses</b></h4>
                    
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                    @foreach( $submission as $photo )
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                    </ol>
                    
                    <div class="carousel-inner" role="listbox">
                        @foreach( $submission as $photo )
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <a href="{{$photo->weblink}}" target="_blank"> <img  src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Banner/{{$photo->image}}" width="100%;" height="280px;" >
                        </a>

                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                
                </div>
                -->
            </div>
        </div>
    </section>
    {{-- <section id="h1title">
        <div class="container">
            <div class="row" style="margin-top:6%;">
                <h5 class="mediah5 d-none d-lg-block" style="text-align:center;"> <b> Latest Deals From Online Businesses</b> <a href="{{ route('AllBusinesses') }}" style="color:#B35464; text-decoration:none;"> See All Online Businesses</a> </h5>
            </div>
        </div>
    </section> --}}
    {{--  onlt mobile view--}}
    <?php $cats = DB::table('categoriess')->orderby('categoryname','ASC')->get(); ?>

    {{-- <section id="mobile-category"  class="d-block d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <select onchange="if (this.value) window.location.href=this.value" class="media-select-page">
                        <option value="{{ route('AllBusinesses') }}">Select Category</option>
                        @foreach($cats as $categoryselect)
                        <option value="{{ url('/businesses'.'/'. $categoryselect->catslug)  }}">{{ $categoryselect->categoryname }}</option>
                    @endforeach
                    </select>

                </div>
            </div>
        </div>
    </section> --}}
    <section id="recentlyuploaded">
        <div class="container">
            <div>
                {{-- only reason i am doing this is becuase on mobile the margin is to expanded for merchant compared to customer & guests --}}
                @if(Auth::user())
            <h5 id="listedbusiness" style="font-weight: bold font-family:">Current Deals Listed By Businesses</h5>
                @else 
            <h5 id="listedbusiness-customerandguest" style="font-weight: bold font-family:">Current Deals Listed By Businesses</h5>
                @endif
            </div>
            <div class="row w-100" >

                @forelse($products as $product)
                <div class="col-md-6 col-lg-4 col-12" id="row-recentlyuploaded">
                    <div class="card" id="cardproduct" data-product-id="{{ $product->id }}">
                        <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/{{$product->image}}" alt="" height="283" width="180">
                            {{-- <img class="card-img-bottom" src="/images/{{ $product->image }}" height="283" width="180"> --}}
                        <!-- <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li>
                                    <a href="{{ url('/account' .'/'. $product->slug) }}" class="nav-link" style="color:#B35464;" title="Company Name"> <small class="badges">  {{$product->company}}</small></a>
                                </li>
                                @if($product->advertboolean == 1)
                                    <li>
                                        <span class="nav-link" style="position:absolute;right:4%;"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                    </li>
                                @endif

                            </ul>
                        </div> -->
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ url('deal' .'/'. $product->slug . '/'. $product->id) }}" title="Coupon Name" >{{$product->title}}</a>
                            </h4>
                            <p class="card-text"style="margin:0; margin-top:-10px; font-weight:bold;" title="Coupon Description">{{$product->desc}}</p>
                            <ul class="list-group list-group-flush">
                                <!-- <li class="list-group-item" style="clear:both;"> -->
                                    <div class="" style="display: flex;justify-content: space-between;">
                                        <div class="" style="display: flex;">
                                            <h5 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                            <h5 class="newprice5" style="cursor:pointer;color: green;margin-left: 5px;" title="Discount Price"> ${{ number_format($product->newprice, 2) }}</h5>
                                            <h5 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$product->percentageoff()}} OFF</h5>
                                        </div>
                                        
                                        {{-- @if(auth::user() || auth::guard('customer')->user()) --}}
                                        <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal
                                        </a>
                                        {{-- @else
                                            <a href="/register" class="cardbutton-page">View Deal</a>
                                        @endif --}}
                                    </div>

                                <!-- </li> -->
                            </ul>

                            @if( empty($product->couponcode))
                            @else
                                @if($product->coupon)
                                    <p style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                                @else
                                <p style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: ****** </p>
                                @endif
                            @endif
                            <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">
                            <i class="far fa-clock" title="Expiration Date"></i> Expires: {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                            <p  style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>
                            <div style = "display:flex;">
                                @if($product->advertboolean == 1)
                                <p class="advertise">Promoted Ad</p>
                                @endif
                                @if($product->exclusive)
                                <p  class="subscriberonly">Subscriber Only</p>
                                @endif
                            </div>
                            <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:13px; margin-top:-5px;" title="Category">{{$product->categoryname}}</small> </a>
                            @if($product->exclusive)
                             <a href="{{ url('account' .'/'. $product->slug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:13px; margin-top:11px;" title="subscriptionprice">${{$product->subscription_price}}/ Month</small> </a>
                            @endif
                        </div>
                        <div class="content-button" style="margin-left: 1px;">
                            <h6 style="font-weight:bold; font-size:12px;">View More Deals By: <a href="{{ url('account' .'/'. $product->slug) }}" style="text-transform: uppercase;" title="Company Name" >{{$product->company}}</a> </h6>  
                               <div class="companyimage rounded-circle" style =" position:absolute; right:4px; bottom:2px; width:49px; height:45px; ;background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }})">
                            </div>

                        </div>
                    </div>
                </div>
                    @empty
                    <div style="padding:185px 0 185px 0;">
                    <h4> <i>(Currently No Coupons have been Created)<a href="/register" style="color:#B35464; text-decoration:none;">Sign Up Today and Begin your Journey!</a> </i> </h4>
                    </div>
                    @endforelse
            </div>
            <div style="size:10em">
                {{ $products->links() }}

            </div>
        </div>
    </section>

    <!-- <section id="category-pic" class="d-none d-lg-block" style="margin-top:60px;">
        <div>
            <h3 style="text-align:center; font-weight:bold; font-size:24px;">Browse Through Different Businesses Categories! </h3>
        </div>
        <div class="container">
            <div class="row"  style="margin: 7% 0 7%;">
                <div class="col-md-3">
                    <a href="/businesses/Pets">
                    <img src="/dog64.png" alt="" title="Creative Commons BY 3.0">
                    </a>
                    <h5 style="margin-left:5%;"> <b> Pets</b></h5>
                </div>
                <div class="col-md-3">
                <a href="/businesses/Cosmetics">
                    <img src="/mascara.png" alt="" title="Creative Commons BY 3.0">
                </a>
                    <h5> <b> Cosmetics</b></h5>
                </div>
                <div class="col-md-3">
                    <a href="/businesses/Electronics">
                    <img src="/game-controller.png" alt="" >
                    </a>
                    <h5> <b> Electronics</b></h5>
                </div>
                <div class="col-md-3">
                    <a href="/businesses/Women’s-Fashion">
                    <img src="/coat.png" alt="" title="Creative Commons BY 3.0">
                    </a>
                    <h5> <b> Women Fashion</b></h5>
                </div>
                <div class="col-md-3">
                    <a href="/businesses/Automotive">
                    <img src="/automobile.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                    </a>
                    <h5> <b> Automotive</b></h5>
                </div>

                <div class="col-md-3">
                    <a href="/businesses/Jewelry-&-Watches">
                    <img src="/diamonds.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                    </a>
                    <h5> <b>Jewelry &amp; Watches</b></h5>
                </div>
                <div class="col-md-3">
                    <a href="/businesses/Baby-Products">
                    <img src="/bottle.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                </a>
                    <h5> <b>Baby Products</b></h5>
                </div>
                
                <div class="col-md-3">
                    <a href="/businesses/Arts-&-Crafts">
                    <img src="/painting.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                    </a>
                    <h5> <b>Arts &amp; Crafts</b></h5>
                </div>
            </div>
        </div>
    </section> -->
    {{-- <section id="randonlyselected" class="d-none d-lg-block">
        <div class="container">
            <h4 style="margin-top:0%; padding-bottom:5%"> <b>Items to Watch</b> </h4>

            <div class="grid-auto">
                @forelse($randoms as $random)
                <div class="">
                    <div class="card"  id="cardproduct" data-product-id="{{ $random->id }}">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li>
                                    <a href="{{ url('/account' .'/'. $product->user->slug) }}" class="nav-link"> <small class="badges">  {{$random->user->company}}</small></a>
                                </li>
                                @if($random->advertboolean == 1)
                                    <li>
                                        <span class="nav-link" style="position:absolute; right:4%;"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                    </li>
                                    @endif
                            </ul>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="clear:both;">
                                    <h5 class="discountR5"> <strike> ${{ number_format($random->currentprice, 2) }}</h5></strike>
                                    <h5 class="newpriceR5"> ${{ number_format($random->newprice, 2) }}</h5>

                                </li>
                            </ul>
                            <div >
                                <span class="badge badge-danger" style="float:right; margin-right:-6%; backbackground-color:#B35464; margin-top:2%;">{{$random->percentageoff()}} OFF</span>
                                <a href="#" class="nav-link" style="color:#B35464; float:right; margin-right:-31%; margin-top:5%">  <small class="badges">{{$random->category->categoryname}}</small> </a>
                            </div>
                            <h4 class="card-title">
                                <a href="{{ url('account' .'/'. $random->user['slug']) }}">{{$random->title}}</a>
                            </h4>
                            <br>
                            <div class="card-text">
                                <p class="card-text">{{$random->desc}}</p>
                            </div>
                            <p style="font-weight:bold; font-size:12px;">Coupon Code: {{$random->couponcode}} </p>
                        </div>
                        <img class="card-img-bottom" src="/images/{{ $random->image }}" height="283" width="180">

                        <!-- <img class="card-img-bottom" src="/images/{{ $random->image }}" height="210" width="160" > -->
                        <a href="{{$random->url}}" target="_blank" class="cardbutton-page"> View Deal</a>
                    </div>
                </div>
                @empty
                <h3 style="margin-left:40%; padding-top:3%; padding-bottom:3%;">No entry in Database</h3>
                @endforelse
            </div>
        </div>
    </section> --}}
    {{-- vue filter --}}
    {{-- <section id="filterproducts">
        <filter-products></filter-products>
    </section> --}}

     {{-- @include('inc.signupblocker') --}}
@endsection
@section('javascripts')
    <script type="text/javascript">
        new Vue({
            el: '#filterproducts'
        });
    </script>

    <script type="text/javascript">
        $("#slidershow > div:gt(0)").hide();
        setInterval(function() {
            $('#slidershow > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(2000)
                .end()
                .appendTo('#slidershow');
        }, 8000);
    </script>

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
@endsection
