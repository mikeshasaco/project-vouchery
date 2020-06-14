@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
             <div class="list-group" style="margin-top:138px;">
                <a href="{{route('admin.dashboard')}}" class="list-group-item ">Dashboard</a>
                <a href="{{route('aduser')}}" class="list-group-item ">Merchant</a>
                <a href="{{route('adcustomer')}}" class="list-group-item ">Customer</a>
                <a href="{{route('category.create')}}" class="list-group-item ">Create Category</a>
                <a href="{{route('adproduct')}}" class="list-group-item ">Coupons</a>
                <a href="{{route('subscription.payout')}}" class="list-group-item">Subscription Statistic</a>
             </div>
        </div>
        <div class="col-md-9">
            <form  action="{{ route('subscription.payout') }}" method="GET" style="margin-top:17%;">
                <div class="input-group">
                    <input type="text" class="form-control" name="Qsearch" id="" placeholder="Search..." value="{{ request()->input('Qsearch') }}" >
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-borderless subscriptionpayout" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Payout(USD)</th>
                            <th>Subscribers Count</th>
                            <th>Bank Name</th>
                            <th>Routing Number</th>
                            <th>Account Number</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->company}}</td>
                            <td>{{$user->subscription_price}}</td>
                            <td>{{$user->count}}</td>
                            <td>{{$user->bank_accountname}}</td>
                            <td>{{$user->bank_routingnumber}}</td>
                            <td>{{$user->bank_accountnumber}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

</div>


@endsection