@extends('layouts.master')

@section('content')


    <div class="search-container">
        <div class="container">
            <h1 style="padding-top:10%;"> <center> Search Results '{{ request()->input('query') }}'</center> </h1>
            {{--allows for the query input to stay on screen  --}}
            <p style="font-size:18px;"> <b> ({{ $products->count() }} result(s) for '{{ request()->input('query') }}')</b></p>
        </div>

    <section id="searchcoupon" style="padding-bottom:4%;">

        <div class="container">
          <div class="row">

              @if($products->total() > 0 )

              @foreach($products as $product)
              <div class="col-md-6 col-lg-4">
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
                             <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                         </h4>
                        <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description">{{$product->desc}}</p>
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item" style="clear:both;"> -->
                                <div class="" style="display: flex;justify-content: space-between;">
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
            
                    </div>
                    
                        
                </div>

            </div>
          @endforeach
            </div>
            {{ $products->appends(request()->input())->links() }}

        @endif
          </div>
</section>

    </div>
	@include('inc.signupblocker')


@endsection
