@extends('layouts.master')

@section('content')
    <div class="container">
    <h3 class="earnings-statistics"><b>Earnings Statistics</b></h3>
        <ul class="nav nav-tabs responsive" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#currentearning" role="tab" aria-controls="current" aria-selected="true">Current</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
            </li>
        </ul>
        <div class="tab-content">
            <section id="currentearning" class="tab-pane fade show active" role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <h5 style="color:#b35464;"> <b>Current Statistics</b></h5>
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
                                        <td> {{ $customer->username }}</td>
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
            <section id="history" class="tab-pane fade" role="tabpanel">
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <h5 style="color:#b35464"> <b>Earning History</b></h5>
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
    </div>

@endsection
