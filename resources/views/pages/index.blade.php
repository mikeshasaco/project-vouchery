@extends('layouts.master')
@section('content')

<section id="banner-homepage" style="margin-top:120px;"  class="d-none d-lg-block">
    <div class="container" >

         <div class="row">
        
            <div class="col-md-9">
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
       <a href="{{$photo->weblink}}" target="_blank"> <img  src="{{ $photo->image }}" width="100%;" height="280px;" >
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
            <div class="col-md-3">
                <h5 style="text-align:center; padding-bottom:0%;"> <b>Trending Categories</b></h5>
                <ul class="topic" style="margin-top:4%;">
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

<section id="h1title">
    <div class="container">

    <div class="row" style="margin-top:6%;">
        <h5 class="mediah5 d-none d-lg-block" style="text-align:center;"> <b> Latest Deals From Online Businesses</b> <a href="{{ route('AllBusinesses') }}" style="color:#B35464; text-decoration:none;"> See All Online Businesses</a> </h5>
    </div>
</div>

</section>

<div class="container">
<h6  class="d-block d-lg-none searchonlinebusiness"> <b>Search Deals from Online Businesses</b> </h6>
</div>

{{--  onlt mobile view--}}
<?php $cats = DB::table('categoriess')->orderby('categoryname','ASC')->get(); ?>

<section id="mobile-category"  class="d-block d-lg-none">

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

</section>

<section id="recentlyuploaded" style="margin-bottom:90px;">
    <div class="container">
        <div class="row" >

            @forelse($products as $product)
            <div class="col-md-6 col-lg-4 col-12">
                <div class="card" id="cardproduct" data-product-id="{{ $product->id }}">
                    <div class="card-header">
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
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="clear:both;">
                                <div class="">
                                    <h5 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                    <h5 class="newprice5" style="cursor:pointer;" title="Discount Price"> ${{ number_format($product->newprice, 2) }}</h5>
                                </div>
                            </li>
                        </ul>
                        <div >
                            <span class="badge badge-danger" title="Percentage Off" style="float:right; margin-right:-6%; margin-top:2%; cursor:pointer;">{{$product->percentageoff()}} OFF</span>
                            <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464; float:right; margin-right:-68px; margin-top:5%"> <small class="badges" title="Category">{{$product->categoryname}}</small> </a>
                        </div>


                        <h4 class="card-title">
                             <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                         </h4>

                        <br>
                        <p class="card-text"style="margin:0;" title="Coupon Description">{{$product->desc}}</p>

                        @if( empty($product->couponcode))
                         @else
                        <p style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                         @endif
                        <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">
                        <i class="far fa-clock" title="Expiration Date"></i> Expires: {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>

                     <p  style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>
                           
                </div>
                <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/default/storage/app/public/Coupon/{{$product->image}}" alt="" height="283" width="180">
                    {{-- <img class="card-img-bottom" src="/images/{{ $product->image }}" height="283" width="180"> --}}
                    @if(auth::user() || auth::guard('customer')->user())
                    <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal
                    </a>
                    @else
                        <a href="/register" class="cardbutton-page">View Deal</a>
                    @endif
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

<section id="category-pic" class="d-none d-lg-block" style="margin-top:60px;">
    <div>
        <h3 style="text-align:center; font-weight:bold; font-size:24px;">Browse Through Different Businesses Categories! </h3>
    </div>
    <div class="container">
        <div class="row"  style="margin: 7% 0 7%;">
            <div class="col-md-3">
                <a href="/businesses/beauty">
                <img src="/sale3.png" alt="" title="Creative Commons BY 3.0">
                </a>
                <h5 style="margin-left:5%;"> <b> Sales</b></h5>
            </div>
            <div class="col-md-3">
                <img src="/mascara.png" alt="" title="Creative Commons BY 3.0">
                <h5> <b> Beauty</b></h5>
            </div>
            <div class="col-md-3">
                <img src="/game-controller.png" alt="" >
                <h5> <b> Electronics</b></h5>
            </div>
            <div class="col-md-3">
                <img src="/coat.png" alt="" title="Creative Commons BY 3.0">
                <h5> <b> Fashion</b></h5>
            </div>
             <div class="col-md-3">
                <img src="/automobile.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                <h5> <b> Automotive</b></h5>
            </div>

              <div class="col-md-3">
                <img src="/diamonds.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                <h5> <b>Jewelry &amp; Watches</b></h5>
            </div>
              <div class="col-md-3">
                <img src="/bottle.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                <h5> <b>Baby Products</b></h5>
            </div>
            
              <div class="col-md-3">
                <img src="/painting.png" alt="" title="Creative Commons BY 3.0" style="margin-top:120px;">
                <h5> <b>Arts &amp; Crafts</b></h5>
            </div>
            
            

        </div>

    </div>

</section>


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


<section id="filterproducts">
    <filter-products></filter-products>
</section>


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


@endsection
