@extends('layouts.master')

@section('content')

    {{-- <style >
    body{
        background-color: white;
    }

    </style> --}}
    <div class="container">
        </section>

                <section id="subscriptionstatstic">
                <div class="row">
                    <div class="col-md-12 col-12">
                    <table class="table">
                        <h3 style="color:#b35464;"> <b>Subscription Statistic</b></h3>
                        <hr>                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>

                        @foreach($customers as $customer)
                                <tr>
                                    <td> {{ $customer->name }}</a></td>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>

    </div>

@endsection
