@extends('layouts.master')

@section('content')
    <div class="container">
        <h3 class="customerprofile"><b>My profile</b></h3>
        <ul class="nav nav-tabs responsive" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#customersettingpass" role="tab" aria-controls="password" aria-selected="true">Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#customerclickssection" role="tab" aria-controls="views" aria-selected="false">Views</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subscription-names" role="tab" aria-controls="following" aria-selected="false">Following</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subscriptionstatistic" role="tab" aria-controls="subscription" aria-selected="false">Subscription</a>
            </li>
        </ul>
        <div class="tab-content">
            <section id="customersettingpass" class="tab-pane fade show active" role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                <form  action="{{ route('update.customer', Auth()->guard('customer')->user()->customerslug) }}" method="post">
                                    {{ csrf_field() }}


                                    <div class="form-group">
                                        <label for="new-password" class=" control-label">Current Password</label>

                                        <div>
                                            <input id="current-password" type="password" class="form-control" name="current-password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password" class=" control-label">New Password</label>

                                        <div>
                                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password-confirm" class=" control-label">Confirm New Password</label>

                                        <div>
                                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>


                                    <button type="submit" class="updatepass-button">Update Profile</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="customerclickssection" class="tab-pane fade" role="tabpanel">
                <h5 style="color:#b35464;"> <b>My Recent Coupon website viewed</b> <i>(This feature is when you click view deal and takes you to the merchant website)</i> </h5>
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <tr>
                                <th>Company</th>
                                <th>Coupon Name</th>
                                <th> Original Price</th>
                                <th>Discounted Price</th>
                            </tr>

                            @foreach($customerclicks as $product)
                                <tr>
                                    <td> <a href="/account/{{ $product->slug }}">{{ $product->company }}</a></td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->currentprice }}</td>
                                    <td style="color:red;">{{ $product->newprice }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>

            <section id="subscription-names" class="tab-pane fade" role="tabpanel">
                <h5 style="color:#b35464;"> <b>My Following</b></h5>
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <tr>
                                <th>Company</th>
                                <th>Visit Website</th>
                            </tr>
                            @foreach($customerfollowing as $customeranuserinfo)
                                <tr>
                                    <td><a href="{{ url('/account/'.$customeranuserinfo->slug) }}"> {{$customeranuserinfo->company  }}
                                    </a>
                                </td>
                                <td><a href="{{$customeranuserinfo->websitelink}}" target="_blank" class="custsubbutton" style="width:80%;"> View Site</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <h5 style="color:#b35464;"> <b>Most recent coupon from merchant following</b> <i>(Latest Coupons)</i> </h5>
                            <tr>
                                <th>Company</th>
                                <th>Coupon Name</th>
                                <th>Original Price</th>
                                <th>Discounted Price</th>
                            </tr>

                            @foreach ($customersubcoupons as $customersubcoupon)
                                <tr>
                                    <td><a href="/account/{{ $customersubcoupon->slug }}">{{ $customersubcoupon->company }}</a></td>
                                    <td> {{ $customersubcoupon->title }}</a></td>
                                    <td>{{ $customersubcoupon->currentprice }}</td>
                                    <td style="color:red;">{{ $customersubcoupon->newprice }}</td>
                                    {{-- <td> <a href="{{ $customersubcoupon->url }}" target="_blank"  class="custsubbutton">View Deal</a> </td> --}}
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </section>


            {{-- <section id="subscriptionstatistic" class="tab-pane fade" role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <h5 style="color:#b35464;"> <b>Subscription Statistic</b> <i>(This feature is mechants you subscribe)</i> </h5>
                        <table class="table">
                            <tr>
                                <th>Company</th>
                                <th>Subscription Price</th>
                                <th>Subscription Cancel</th>
                                <th>End Date</th>
                            </tr>

                            @foreach ($subscriptions as $subscription)
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
            </section> --}}
        </div>
    </div>
@endsection
