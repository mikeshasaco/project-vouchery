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
        <div class="col-md-10 offset-col-1 col-12">
            <div class="content" >

                <div class="card profile-info ">
                    <div class="firstinfo">
                        <img src="{{$user->avatar }}" class="companyimage" >

                        <div class="profileinfo" style=" margin-left:30%;margin-top:-25%;" >
                            <h4 class="profilecompany" > <b style="color:#b35464;"> Company:</b> {{ $user->company }}</h4>
                            <p class="profilebio"> <b style="color:#b35464;">Description: </b>{{$user->accountinfo}}</p>
                            <a href="{{$user->websitelink}}" class="websitebutton" target="_blank">Website Link</a></h6>
                            <h6 class="subscriberh6"> <b>Subscriber Count: {{ $followercount }}</b></h6>
                            @if(Auth::id() == $user->id)
                                  <!-- Button trigger modal -->
                                  {{-- <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="position:absolute; left:6%; bottom:34%;">
                                      Edit Account
                                  </button> --}}
                                  <a href="{{ route('myads', auth()->user()->slug) }}" class="editaccount"> Edit Account</a>
                            @endif

                                @if(Auth::guard('customer')->user())
                                    @if(Auth::guard('customer')->user()->isfollowing($user))
                                        <a href="{{ url('account/'.$user->slug.'/unfollow') }}" class="unfollow_button ">
                                             UNSUBSCRIBE</a>
                                    @else
                                        <a href="{{ url('account/'.$user->slug.'/follow') }}" class="follow_button"> SUBSCRIBE</a>
                                    @endif
                                @elseif (Auth::user())

                                @else
                                    <a href="/register" class="follow_button">SUBSCRIBE</a>
                                @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>


    <section id="accountsection" style="margin-bottom:4%;">

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
                            data-key="pk_test_0pTcQ6w6V9JuLB7khUEmuTev"
                            data-amount="2.99"
                            data-name="{{ $product->title }} Coupon"
                            data-description=" Run Advertisement on coupon"
                            data-email="{{ auth::check() ? auth()->user()->email : null }}"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-panel-label=" Pay: $2.99"
                            data-label="Advertise"
                            data-locale="auto">
                            </script>

                            <input type="hidden" name="adname" value="{{ $product->title }}">
                            <input type="hidden" name="adprice" value="2.99">
                            <input type="hidden" name="prod_id" value="{{$product->id }}">
                        </form>
                        @endif
                    @endif
                </div>

                        <div class="card" id="cardproduct" data-product-id="{{ $product->id }}">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li>
                                        <a href="{{ url('/account'.'/'. $product->slug) }}" class="nav-link"> <small class="badges">  {{$product->company}}</small></a>
                                    </li>
                                    @if($product->advertboolean == 1)
                                        <li>
                                            <span class="nav-link" style="position:absolute; right:4%;"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                        </li>
                                        @endif
                                </ul>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="clear:both;">
                                        <h5 class="discounth5"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                        <h5 class="newprice5"> ${{ number_format($product->newprice, 2) }}</h5>

                                    </li>
                                </ul>
                                <span class="badge badge-danger" style="float:right; margin-right:-6%; margin-top:2%;">{{$product->percentageoff()}} OFF</span>
                                <a href="#" class="nav-link" style="color:red; float:right; margin-top:5%;  margin-right:-68px;"> <small class="badges">{{$product->categoryname}}</small> </a>

                                <h4 class="card-title" >
                                    <a href="{{ url('account' .'/'. $product->slug) }}">{{$product->title}}</a>
                                </h4>

                                <br>
                                <p class="card-text" style="margin:0;">{{$product->desc}}</p>
                                <p style="font-weight:bold; font-size:12px; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                                <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0;">
                                    <i class="far fa-clock"></i> {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                            </div>

                            <img class="card-img-bottom" src="{{$product->image}}" height="283" width="180">

                            <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal</a>
                        </div>

                </div>
            @empty
                <h4>  <b>Create Your First Coupon Today!</b></h4>
                <h4> <i>(Click Edit Account to setup your Business Information!)</i> </h4>
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

        </div>
    </div>
        @endif
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
