@extends('layouts.master')
@section('content')
    <section id="banner-homepage" class="d-none d-lg-block">
        <div class="d-none d-sm-block container" >
            <div class="row">
                <h4 > <b>Voucheryhub Marketplace For Small Businesses <br>To Grow, Thrive, And Earn More.</b> </h4>
                <form class="navbar-form" action="{{ route('search') }}" method="GET">
                    <div id="custom-search-input">
                        <div class="input-group  col-md-12">
                            <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search Voucheryhub ">
                        </div>
                    </div>
                </form>
                <div class="trend">
                    <h5 style="font-weight: 800"> <b>Trending Categories</b></h5>
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
            </div>
        </div>
    </section>

    

{{-- <section>

  
        @if(Auth::user())
        <h4 style="font-weight: 800; padding-top: 50px;padding-bottom: 25px; text-align:center;">Popular Deals</h4>

        @else
        <h4 style="font-weight: 800; padding-top: 80px;padding-bottom: 25px; text-align:center;">Join Marketplace </h4>
   

        @endif




</section> --}}

{{-- <section class="d-block d-sm-none">

        @if(Auth::user())
        <div style="margin-top: 76px;">
            <img src="/Voucherhyhubbannerpurp.png" alt="" width="100%;" height="190px;"  >
        </div>

        @else

        <div style="margin-top: 102px;">
            <img src="/Voucherhyhubbannerpurp.png" alt="" width="100%;" height="190px;"  >
        </div>
   

        @endif
    

</section> --}}
  
  <section id="recentlyuploaded" style="margin-bottom:90px;">
        <div class="container">

            <div class="row w-100" >

                @forelse($products as $product)
                

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

                            <p style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">
                        
                    @if(empty($product->couponcode))
                            <i class="fas fa-tags" title="Discount Code"> </i>No Discount Code
                        @else
                          @if($product->coupon)
                            <i class="fas fa-tags" title="Discount Code"></i>Discount Code: {{$product->couponcode}}
                            @else
                            <i class="fas fa-tags" title="Discount Code"> </i>Discount Code: ******
                            @endif
                        @endif
                        
                            <p  style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>

                            <hr style="margin-top: 0.1rem; margin-bottom:14px;">


                            <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:0px; margin-top:-20px; font-size: 13px;" title="Category">{{$product->categoryname}}</small> </a>
                                @if($product->exclusive)
                                <p  class="subscriberonly" style=" margin-top: -10px;">Subscriber Only</p>
                                @endif    


                                   @if($product->advertboolean == 1)
                                <hr style="margin-top: 1.8rem; margin-bottom: 0rem;">
                                <p class="advertise">Promoted Ad</p>
                                @endif
                            
                                <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:0; left:0; color:black;" > <b>View More:</b>  <b style="  text-transform: capitalize;">{{$product->company}}</b> </a>

                                    <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }}); position:absolute; bottom:0; right:8px; width:50px; height:50px; "></div>
                            
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
