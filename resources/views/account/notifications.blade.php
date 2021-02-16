@extends('layouts.master')

@section('content')
<section class="notfy-section">

    <div class="container">
        <h3 class="customerprofile"><b>Notifications</b></h3>
        <ul class="nav nav-tabs responsive" role="tablist">
          
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#subscription-names" role="tab" aria-controls="following" aria-selected="false">Following</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subscription-followers" role="tab" aria-controls="followers" aria-selected="false">Followers</a>
            </li>


            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#currentearning" role="tab" aria-controls="password" aria-selected="true">Subscribers</a>
            </li> 

              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subscriptionstatistic" role="tab" aria-controls="views" aria-selected="false">Subscribed</a>
            </li> 
        </ul>
        <div class="tab-content">
 <section id="subscription-names" class="tab-pane fade show active" role="tabpanel">
                {{-- <h5 style="color:#b35464;"> <b>Following</b></h5> --}}
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                     <h5> <b>Followings count ({{$merchantcount}})</b> </h5>

                        <table class="table">
                         
                            @foreach($merchantfollowing as $customeranuserinfo)
                                <tr>
                                    <td><a href="{{ url('/account/'.$customeranuserinfo->slug) }}"> {{$customeranuserinfo->company  }}
                                    </a>
                                </td>
                                <td> <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$customeranuserinfo->avatar }}); width:50px; height:50px;"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
               
            </section>

             <section id="subscription-followers" class="tab-pane fade show " role="tabpanel">
                {{-- <h5 style="color:#b35464;"> <b>Following</b></h5> --}}
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <h5> <b>Followers count ({{$merchantcountfollowers}})</b> </h5>
                            @foreach($merchantfollowers as $customeranuserinfo)
                                <tr>
                                    <td><a href="{{ url('/account/'.$customeranuserinfo->slug) }}"> {{$customeranuserinfo->company  }}
                                    </a>
                                </td>
                                <td> <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$customeranuserinfo->avatar }}); width:50px; height:50px;"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
               
            </section>

             <section id="currentearning" class="tab-pane fade " role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <h5 > <b>Current Month Earning </b></h5>
                        <hr>
                        <h6> <b>Current Number Of Subscribers: {{$user->count}}</b> </h6>       
                        <h6>  <b> Payout Date: {{$firstofmonth}} </b></h6> 
                        <table class="table">
                            <tr>
                                <th>Username</th>
                                <th>Subscription Price</th>
                            </tr>
                            @foreach($customers as $customer)
                                    <tr>
                                        <td> {{ $customer->name }}</td>
                                        <td>${{ number_format($user->subscription_price,2) }}</td>
                                    </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"> <b> Current Monthly Earnings: </b></td>
                                <td><b>${{ number_format($user->subscription_price*$user->count, 2) }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>

            <section id="subscriptionstatistic" class="tab-pane fade" role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <h5> <b>Subscribed</b> <i>(This feature is mechants you subscribe)</i> </h5>
                        <table class="table">
                            <tr>
                                <th>Company</th>
                                <th>Subscription Price</th>
                                <th>Subscription Cancel</th>
                                <th>End Date</th>
                            </tr>

                            @foreach ($customer_subscriptions as $subscription)
                                <tr>
                                    <td>{{ $subscription->company }}</td>
                                    <td>{{ number_format($subscription->plan->amount/100, 2)}}</td>
                                    @if($subscription->end_date)
                                        <td> <p  class="cancelledbutton" >Canceling</p></td>
                                        <td>{{ $subscription->end_date }}</td>
                                    @else
                                    @if($subscription)
                                    <td> <a href="{{route('subscription.cancel',$subscription->slug)}}" target=""  class="custsubbutton">Cancel</a> </td>
                                    <td></td>
                                    @endif
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>         
        </div>
    </div>
 </section>

@endsection
