@extends('layouts.master')


@section('content')
<section id="admin-main" style="postion:relative; margin-top:150px;">
    <div class="container">
        <div class="row">
                {{-- @include('admin._sidebar') --}}
            <div class="col-md-3">
                <div class="list-group">
                <a href="{{route('aduser')}}" class="list-group-item active">Merchant</a>
                <a href="{{route('adcustomer')}}" class="list-group-item ">Customer</a>
                <a href="{{route('category.create')}}" class="list-group-item ">Create Category</a>
                <a href="{{route('adproduct')}}" class="list-group-item ">Coupons</a>
                <a href="{{route('submission.create')}}" class="list-group-item">Banner</a>

                </div>

            </div>
               <div class="col-md-3">
                 <div class="card" title="Merchant" style="width: 13rem !important; height: 10rem !important;">
                 <h2 style="margin-top: 60px; margin-left: 46px;"> <span><i class="fa fa-user-plus" aria-hidden="true"></i> {{$adminusercount}}</span> </h2>
                 </div>
             </div>     
            <div class="col-md-3">
                 <div class="card" title="Customer" style="width: 13rem !important; height: 10rem !important;">
                 <h2 style="margin-top: 60px; margin-left: 46px;"> <span><i class="fa fa-user" aria-hidden="true"></i> {{$admincustomercount}}</span> </h2>
                 </div>
             </div>     
             <div class="col-md-3">
                 <div class="card" title="Coupon" style="width: 13rem !important; height: 10rem !important;">
                 <h2 style="margin-top: 60px; margin-left: 46px;"> <span><i class="fa fa-tag" aria-hidden="true" ></i>{{$adminproductcount}}</span> </h2>
                 </div>
             </div>      
        </div>
    </div>
</section>

<section style="margin-top:40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Merchants <i>({{$adminusercount}})</i>  </h5>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($adminallusers as $adminusers)
                    <tr>
                    <th scope="row">{{$adminusers->id}}</th>
                    <th scope="row">{{$adminusers->name}}</th>
                    <th scope="row">{{$adminusers->company}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            
            <div class="col-md-6">
            <h5>Customers <i>({{$admincustomercount}})</i> </h5>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($adminallcustomers as $admincustomer)
                    <tr>
                    <th scope="row">{{$admincustomer->id}}</th>
                    <th scope="row">{{$admincustomer->name}}</th>
                    <th scope="row">{{$admincustomer->username}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>


@endsection
