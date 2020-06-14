@extends('layouts.master')
@section(': title')

    @section('content')
@if($user == null)
    <div class="col-md-12" align="center">
        <h1 align="center" style="margin:20%; margin-top:18%;"> User <b style="color:red;">{{ $usernotexist }}</b> Not Found </h1>
    </div>

@else

{{--style="height:128px; width:128px;"  --}}

<div class="container">
    <div class=" profileheaderrow"  >
        <div class="col-md-12">
            <div class="content" >

                <div class="profile-info ">
                    <div class="firstinfo">
                        <div class="compayavarta">
                            <img src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$user->avatar }}" class="companyimage rounded-circle" >
                        </div>
                        <div class="profileinfo">
                            <h4 class="profilecompany" > <b style="color:#b35464;"></b> {{ $user->company }}</h4>
                            <p class="profilebio"> <b style="color:#b35464;"></b>{{$user->accountinfo}}</p>
                            <div class="profile-bottom">
                                <a href="{{$user->websitelink}}" class="websitebutton" target="_blank">Website Link</a>
                                <h6 class="subscriberh6"> <b>Follower Count: {{ $followercount }}</b></h6>
                                @if(Auth::id() == $user->id)
                                      <!-- Button trigger modal -->
                                      {{-- <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="position:absolute; left:6%; bottom:34%;">
                                          Edit Account
                                      </button> --}}
                                      <a href="{{ route('myads', auth()->user()->slug) }}" class="editaccount">Edit</a>
                                @endif

                                    @if(Auth::guard('customer')->user())
                                        @if(Auth::guard('customer')->user()->isfollowing($user))
                                            <a href="{{ url('account/'.$user->slug.'/unfollow') }}" class="unfollow_button ">
                                                 UNFOLLOW</a>
                                        @else
                                            <a href="{{ url('account/'.$user->slug.'/follow') }}" class="follow_button"> FOLLOW</a>
                                        @endif
                                        <a href="#" class="subscribe_button" data-toggle="modal" data-target="#subscriptionmodal">SUBSCRIBE</a>
                                    @elseif (Auth::user())

                                    @else
                                        <a href="/register" class="follow_button">FOLLOW</a>
                                        <a href="/register" class="subscribe_button">SUBSCRIBE</a>
                                    @endif
                            </div>
                        </div>
                    </div>

                </div>
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
                    <div class="content-button" style="position:relative;">


                    {{-- Delete link --}}
                    @if(Auth::id() == $product->user_id)
                    <form class="deleteaccount"  action="{{ '/account/'.Auth::user()->slug .'/'. $product->id }}" method="post">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button type="submit" class="btn-customdelete"><i class="far fa-trash-alt"></i> Delete</button>
                    </form>

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
                    @endif
                </div>

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
                        <p style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                         @endif
                        <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">
                        <i class="far fa-clock" title="Expiration Date"></i> Expires: {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                         <p  style="font-weight:bold; font-size:10px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>
                        <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:13px; margin-top:-5px;" title="Category">{{$product->categoryname}}</small> </a>
            
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
                                                    <input type="tel" class="form-control" placeholder="Valid Card Number" name="card[number]" />
                                                    <span class="input-group-text"><span class="fa fa-credit-card"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7">
                                            <div class="form-group">
                                                <label><span class="hidden-lg">EXPIRATION</span><span class="visible-lg-inline">EXP</span> DATE</label>
                                                <input type="tel" class="form-control" placeholder="MM / YY" name="card[exp]" />
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 pull-right">
                                            <div class="form-group">
                                                <label>CV CODE</label>
                                                <input type="tel" class="form-control" placeholder="CVC" name="card[cvc]" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CARD OWNER</label>
                                                <input type="text" class="form-control" placeholder="Card Owner Names" name="card[name]" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit(); return false;" value="Subscribe" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
	@include('inc.signupmodal')

@endsection

@section('javascripts')
<script>
    $('.btn-customdelete').click(function(e){
        e.preventDefault()
            if (confirm('Are you sure you want to delete Coupon')) {
                $(e.target).closest('form').submit()
            }

    });
</script>

@endsection
