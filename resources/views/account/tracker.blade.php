@extends('layouts.master')
@section('title', $user->slug)

@section('content')
<section class="click-tracer-section" style="margin-top: 100px;">

    <div class="container">
        <h3 class="profile-edit"><b>Coupon Tracker</b></h3>
            
            <section id="merchantclicksetting" class="tab-pane" role="tabpanel">
                <h5 style="color:#b35464;"> <b> My Coupon Click Tracker</b></h5>
                <h6>Keep track of each of your coupon results with click tracker which trackers the number of times your coupon has been clicked on.</h6>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <table class="table">
                            <tr>
                                <th>Coupon Name</th>
                                <th> Total Clicks Per Coupon</th>
                                <th>Category Name</th>
                            </tr>
                            @foreach ($usertracker as $tracker)

                            <tr>
                                <td>{{ $tracker->title }}</td>

                                <td>
                                    <span style="font-size:14px; font-weight:bold;"> {{ $tracker->total  }}</span>

                                    {{-- <span class="badge badge-danger badge-pill"> {{ $tracker->total  }}</span> --}}
                                </td>
                                <td>  <span class="badge badge-danger badge-pill"> {{ $tracker->categoryname  }}</span></td>

                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </section>
    </div>
</section>

@endsection
