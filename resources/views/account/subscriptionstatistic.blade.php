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
                <div class="col-md-12 col-12 table-responsive">
                    <h3 style="color:#b35464;"> <b>Earnings Statistics</b></h3>
                    <hr> 
                    <h5 style="margin:2.5em auto"> <b>Current Number Of Subscribers: {{$user->count}}</b> </h5>       
                    <h6>  <b> Payout Date: {{$firstofmonth}} </b></h6> 
                    <table class="table">
                         <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Subscription Price</th>
                        </tr>
                        @foreach($customers as $customer)
                                <tr>
                                    <td> {{ $customer->username }}</td>
                                    <td> {{ $customer->email }}</td>
                                    <td>${{ number_format($user->subscription_price,2) }}</td>
                                </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"> <b> Current Monthly Earnings: </b></td>
                            <td><b>${{ number_format($user->subscription_price*$user->count, 2) }}</b></td>
                        </tr>
                    </table>
                    <h5 style="margin:2.5em auto"> <b>Earning History</b></h5>
                    <table class="table">
                        <tr>
                            <th>Month</th>
                            <th>Earning</th>
                        </tr>
                        @foreach($monthlyearnings as $earning)
                            <tr>
                                <td>{{$earning->month}}</td>
                                <td>${{number_format($earning->earning,2)}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
