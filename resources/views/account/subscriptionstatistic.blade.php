@extends('layouts.master')

@section('content')

    {{-- <style >
    body{
        background-color: white;
    }

    </style> --}}
    <div class="container">
        <section id="subscriptionstatstic">
            <div class="row">
                <div class="col-md-12 col-12">
                    <table class="table">
                        <h3 style="color:#b35464;"> <b>Subscription Statistic</b></h3>
                        <hr> 
                    <h5> <b>Current Number Of Subscribers: {{$activecustomers}}</b> </h5>       
                        <h6>Payout Date: {{$firstofmonth}} </h6>               
                         <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Subscription Price</th>
                            <th>Subscribed/UnSubscribed</th>
                        </tr>
                        @foreach($customers as $customer)
                                <tr>
                                    <td> {{ $customer->username }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>${{ number_format($user->subscription_price,2) }}</td>
                                    @if(is_null($customer->ends_at))
                                        <td>Subscribed</td>
                                    @else
                                        <td>Unsubscribed</td>
                                    @endif
                                </tr>
                        @endforeach
                        <tr>
                            <td>Total Price</td>
                            <td></td>
                            <td>${{ number_format($user->subscription_price*$user->count, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
