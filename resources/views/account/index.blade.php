@extends('layouts.master')
@section(': title')
@section('content')
@if($user == null)
    <div class="col-md-12" align="center">
        <h1 align="center" style="margin:20%; margin-top:18%;"> User <b style="color:red;">{{ $usernotexist }}</b> Not Found </h1>
    </div>

@else

<div class="container">
    <div class=" profileheaderrow"  >
        <div class="col-md-12">
            <div class="content" >

                <div class="profile-info ">
                    <div class="firstinfo">
                        <div class="compayavarta">
                            <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$user->avatar }})">
                            </div>
                            @if(Auth::id() == $user->id)
                                      <!-- Button trigger modal -->
                                      {{-- <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="position:absolute; left:6%; bottom:34%;">
                                          Edit Account
                                      </button> --}}
                                      <a href="{{ route('myads', auth()->user()->slug) }}" class="editaccount">Edit Profile</a>
                                @endif

                                    @if(Auth::guard('customer')->user())
                                        @if(Auth::guard('customer')->user()->isfollowing($user))
                                            <a href="{{ url('account/'.$user->slug.'/unfollow') }}" class="unfollow_button ">
                                                 UNFOLLOW</a>
                                        @else
                                            <a href="{{ url('account/'.$user->slug.'/follow') }}" class="follow_button"> FOLLOW</a>
                                        @endif
                                    @elseif (Auth::user())

                                    @else
                                        <a href="/register" class="follow_button">FOLLOW</a>
                                    @endif
                        </div>
                        <div class="profileinfo">
                            <h4 class="profilecompany" > <b style="color:#b35464;"></b> <b> {{ $user->company }}</b></h4>
                            <p class="profilebio"> <b style="color:#b35464;"></b>{{$user->accountinfo}}</p>
                            <div class="profile-bottom">
                                 <a href="{{$user->websitelink}}" class="websitebutton" target="_blank">Website Link</a>
                                <h6 class="subscriberh6"> <b>Follower Count: {{ $followercount }}</b></h6>
                            </div>
                        </div>
                    </div>
                    @if(Auth::id() == $user->id)
                        @if($user->subscription_price)
                        <div class="secondinfo">
                            <label for="subscription"><b> SUBSCRIPTION</b></label>
                            <p> <b> ${{ $user->subscription_price }} per month</b></p>
                            <p class="subscribe_button">Set at ${{ $user->subscription_price }}</p>
                        </div>
                        @else
                        <div class="secondinfo">
                            <p > <b>SUBSCRIPTION</b> </p>
                            <a class="subscribe_button" href="{{ route('setsubscription', auth()->user()->slug) }}">Set Subscription</a>
                        </div>
                        @endif
                    @endif
                    @if($customer = Auth::guard('customer')->user())
                        @if($user->subscription_price)
                            @if($customer->subscribedByPLan('main', $user->stripe_plan))
                            <div class="secondinfo">
                                <label for="subscription">SUBSCRIPTION</label>
                                <p>${{ $user->subscription_price }} per month</p>
                                <p class="subscribe_button">SUBSCRIBED FOR ${{ $user->subscription_price }}</a>
                            </div>
                            @else
                            <div class="secondinfo">
                                <label for="subscription">SUBSCRIPTION</label>
                                <p>${{ $user->subscription_price }} per month</p>
                                <a href="#" class="subscribe_button" data-toggle="modal" data-target="#subscriptionmodal">SUBSCRIBE FOR ${{ $user->subscription_price }}</a>
                            </div>
                            @endif
                        @else
                        <div class="secondinfo">
                            <p >SUBSCRIPTION</p>
                            <p class="subscribe_button">Not Set Subscription</p>
                        </div>
                        @endif
                    @elseif (Auth::user())
                    @else
                        @if($user->subscription_price)
                        <div class="secondinfo">
                            <label for="subscription">SUBSCRIPTION</label>
                            <p>${{ $user->subscription_price }} per month</p>
                            <a href="/register" class="subscribe_button">SUBSCRIBE FOR ${{ $user->subscription_price }}</a>
                        </div>
                        @else
                        <div class="secondinfo">
                            <p >SUBSCRIPTION</p>
                            <p class="subscribe_button">Not Set Subscription</p>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>

    
    <section id="accountsection" style="margin-bottom:4%;margin-top: 2em;">

        <div class="container">
            <h6 style="margin-bottom:3%;"> <b>{{ $user->company }} Coupon's ({{ $userproduct->count() }})</b></h6>
            <div class="row">


                @forelse($userproduct as $product)
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
                        <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description"><b> {{$product->desc}}</b></p>
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
                    <div class="content-button">
                        {{-- Delete link --}}
                        @if(Auth::id() == $product->user_id)
                            @if($product->advertboolean == 1)

                                <button href="{{ route('myads', auth::user()->slug) }}" type="button" name="button" class="btn-customrunning" disabled><i class="fas fa-sync"></i> Running</button>

                            @else
                            <form action="{{ '/account/'.Auth::user()->slug .'/'. $product->id  }}" method="POST" >
                                {{ csrf_field() }}
                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_live_7sQQoPimKkEX2qbIb1Ddajcq"
                                data-amount="499"
                                data-name="{{ $product->title }} Coupon"
                                data-description=" Run Advertisement on coupon"
                                data-email="{{ auth::check() ? auth()->user()->email : null }}"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-label="Advertise"
                                data-locale="auto">
                                </script>

                                <input type="hidden" name="adname" value="{{ $product->title }}">
                                <input type="hidden" name="adprice" value="4.99">
                                <input type="hidden" name="prod_id" value="{{$product->id }}">
                            </form>
                            @endif
                            <form class="deleteaccount"  action="{{ '/account/'.Auth::user()->slug .'/'. $product->id }}" method="post">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button type="submit"  class="btn-customdelete"><i class="far fa-trash-alt"></i> Delete</button>
                            </form>
                        @endif
                </div>
                </div>

            </div>
            @empty
                <h4>  <b>Create Your First Coupon Today!</b></h4>
                <h4> <i>(Click Edit to setup your Business Information!)</i> </h4>
            @endforelse
            </div>
        </div>
    </section>
    </div>

    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form class="" action="{{ route('update.edit') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="modal-body">
                                @include('edit.editform')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade form-prevent-multiple-submits" id="subscriptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="post" enctype="multipart/form-data" action="{{ route('account.subscribe', $user->slug) }}"  >
                        {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default">
                                <h4 class="text-center">Subscription Setting...</h4>
                                <div>
                                <div  class="">
                                    <label for="merchant" class="col-lg-6">Merchant: </label>
                                    <div class="col-lg-6 pull-right">{{ $user->company }}</div>
                                </div>
                                <div class="">
                                    <label for="type" class="col-lg-6">Type of Subscription: </label>
                                    <div class="col-lg-6 pull-right">Monthly</div>
                                </div>
                                <div class="subscription_price">
                                    <label for="price" class="col-lg-6">Price of Subscription:</label>
                                    <div class="col-lg-6 pull-right">${{ $user->subscription_price }}</div>
                                </div>
                                </div>
                                <div class="panel-heading">
                                    <div class="row">
                                        <div><h5>Please Input Your Card Number</h5></div>
                                        <img style='width:100%;'class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CARD NUMBER</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" class="form-control" placeholder="Valid Card Number" name="card_number" value="{{old('card_number')}}" required />
                                                    <span class="input-group-text"><span class="fa fa-credit-card"></span></span>
                                                </div>
                                                @if ($errors->has('card_number'))
                                                    <small class="text-danger">{{ $errors->first('card_number') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label><span class="hidden-lg">EXPIRATION MONTH</span></label>
                                                <input type="tel" class="form-control" placeholder="MM" name="exp_month" value="{{old('exp_month')}}" required />
                                            </div>
                                            @if ($errors->has('exp_month'))
                                                <small class="text-danger">{{ $errors->first('exp_month') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 pull-right">
                                            <div class="form-group">
                                                <label><span class="hidden-lg">EXPIRATION YEAR</span></label>
                                                <input type="tel" class="form-control" placeholder="YY" name="exp_year" value="{{old('exp_year')}}" required />
                                            </div>
                                            @if ($errors->has('exp_year'))
                                                <small class="text-danger">{{ $errors->first('exp_year') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                                <label>CV CODE</label>
                                                <input type="tel" class="form-control" placeholder="CVC" name="cv_code" value="{{old('cv_code')}}" required />
                                            </div>
                                            @if ($errors->has('cv_code'))
                                                <small class="text-danger">{{ $errors->first('cv_code') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CARD OWNER</label>
                                                <input type="text" class="form-control" placeholder="Card Owner Names" name="card_name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();"  value="Subscribe" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
@endsection

@section('javascripts')
<script>
    $('#subscriptionmodal form').submit(function() {
        this.disabled=true;
        this.value='Submitting...';
    })
    $('.btn-customdelete').click(function(e){
        e.preventDefault()
            if (confirm('Are you sure you want to delete Coupon')) {
                $(e.target).closest('form').submit()
            }

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
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '387119268900181');
  fbq('track', 'PageView');

</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=387119268900181&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

@endsection
