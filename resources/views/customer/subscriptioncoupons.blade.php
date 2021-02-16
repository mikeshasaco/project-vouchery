@extends('layouts.master')

@section('content')

    <section class="couponmycontainer">

   
            <div class="container">
                <h3 class="titlesubscriptioncoupon"><b>Coupons Subscriptions</b></h3>

                <div class="row">

                    @forelse($products as $product)
                    <div class="col-md-6 col-lg-4 col-12">
                                    <div class="card"  id="cardproduct" data-product-id="{{ $product->id }}">
                                        <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/{{$product->image}}" height="283" width="180">
                                        <!-- <div class="card-header">
                                            <ul class="nav nav-tabs card-header-tabs">
                                                <li>
                                                    <a href="{{ url('/account' .'/'. $product->user['slug']) }}" class="nav-link"> <small class="badges">  {{$product->user['company']}}</small></a>
                                                </li>
                                                @if($product->advertboolean == 1)
                                                    <li>
                                                        <span class="nav-link" style="position:absolute; right:4%;"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                                    </li>
                                                    @endif
                                            </ul>
                                        </div> -->
                                        <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                                </h4>
                                <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description">{{$product->desc}}</p>
                          
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
                            
                                <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:0; left:0" >View More: <b>{{$product->company}}</b> </a>

                                    <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }}); position:absolute; bottom:0; right:8px; width:50px; height:50px; "></div>
                    
                            </div>                        
                        </div>
                    </div>
                    @empty 
                     <div style="padding:185px 0 185px 0;">
                    <h4> <i>(You currently have yet to subscribe to businesses yet!) <a href="{{route('homepage')}}" style="color:#B35464; text-decoration:none;">Check out theses businesss deals!</a> </i> </h4>
                    </div>
                @endforelse
                        </div>
                        {{ $products->links() }}
                    </div>


                </div>
            </div>
        </section>


@endsection
