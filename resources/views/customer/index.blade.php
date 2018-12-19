@extends('layouts.master')

@section('content')

    {{-- <style >
    body{
        background-color: white;
    }

    </style> --}}
    <div class="container">
        <section id="customersettingpass">
                <h5> <b>Account:</b> {{ $customer->username }} </h5>

        <hr>
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

    <section id="customerclickssection">
        <h5 style="color:#b35464;"> <b>My Recent Coupon website viewed</b> <i>(This feature is when you click view deal and takes you to the merchant website)</i> </h5>
        <hr>
        <div class="row">
            <div class="col-md-12 col-12">
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

    <section id="subscription-names">
        <h5 style="color:#b35464;"> <b>My Subscriptions</b> <i>(Subscriptions allow you to follow your favorite merchants.)</i> </h5>
        <hr>
        <div class="row">
            <div class="col-md-12 col-12">
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

    </section>

                <section style="margin-bottom:10%;">
                <div class="row">
                    <div class="col-md-12 col-12">
                    <table class="table">
                        <h5 style="color:#b35464;"> <b>Most Recent Coupons from my Subscriptions</b> <i>(Latest Coupons)</i> </h5>
                        <hr>                        <tr>
                            <th>Company</th>
                            <th>Coupon Name</th>
                            <th>Current Price</th>
                            <th>Discounted Price</th>
                        </tr>

                        @foreach ($customersubcoupons as $subscribercoupons)
                            <tr>
                                <td><a href="/account/{{ $subscribercoupons->slug }}">{{ $subscribercoupons->company }}</a></td>
                                <td> {{ $subscribercoupons->title }}</a></td>
                                <td>{{ $subscribercoupons->currentprice }}</td>
                                <td style="color:red;">{{ $subscribercoupons->newprice }}</td>
                                {{-- <td> <a href="{{ $subscribercoupons->url }}" target="_blank"  class="custsubbutton">View Deal</a> </td> --}}
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </section>

    </div>

@endsection
