@extends('layouts.master')
@section('title', $user->slug)

@section('content')
<section class="advertise-section-ad">

    <div class="container">
        <h3 class="profile-edit"><b>Advertise</b></h3>
       

            <section id="merchantcouponsetting" class="tab-pane " role="tabpanel">
                <h5 style="color:#b35464;"><i class="fas fa-info-circle" title="Track your Coupons Advertisement Status"></i>  <b>My Coupon Advertisement Status</b></h5>
                <h6>Expand your coupon reach by advertising your deals to a greater audience. <a href="{{ route('myaccount', auth()->user()->slug) }}">Visit Here to Run Ads</a> </h6>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <table class="table">
                            <tr>
                                <th>Coupon Category</th>
                                <th>Expiration Date</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($userproduct as $adproduct)
                            <tr>
                                <td>{{ $adproduct->title }}</td>
                                <td> {{ Carbon\Carbon::parse($adproduct->expired_date)->format('F d, Y') }}</td>
                                @if($adproduct->advertboolean == 1)
                                <td><h6 style="color:#2edb2e;">Running</h6> </td>
                                @else
                                <td><h6 style="color:red;">Not Running</h6></td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>

    </div>
</section>

@endsection
