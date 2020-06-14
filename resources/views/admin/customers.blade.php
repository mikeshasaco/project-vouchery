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
        {{-- @include('admin._sidebar') --}}

        <div class="col-md-9">
              <form  action="{{ route('adcustomer') }}" method="GET" style="margin-top:17%;">
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
                <table class="table table-borderless" style="margin-top: 1%;">
                    <thead>
                        <tr>
                            <th>ID</th><th>Name</th><th> Company</th> <th>Delete User Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customersonadmin as $adcustomer)
                            <tr>
                                <td>{{ $adcustomer->id }}</td>
                                <td>{{ $adcustomer->name }}</td>
                                <td>{{ $adcustomer->username }}</td>

                                <td>
                                    <form method="POST" action="{{ url('/admin' . '/customers/all/' . $adcustomer->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                </td>
                            </tr>
                    </tbody>
                @endforeach

                </table>

            </div>

        </div>

    </div>

</div>

@endsection