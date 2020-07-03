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
                        <hr>                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Subscription Price</th>
                        </tr>
                        @foreach($customers as $customer)
                                <tr>
                                    <td> {{ $customer->username }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>${{ number_format($user->subscription_price,2) }}</td>
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
