@extends('layouts.master')

@section('content')
<section class="activity-section" style="margin-top: 100px;">

    <div class="container">
        <h3 class="customerprofile"><b>Following</b></h3>
        <ul class="nav nav-tabs responsive" role="tablist">
             {{-- <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#customersettingpass" role="tab" aria-controls="password" aria-selected="true">Password</a>
            </li> --}}
          
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#subscription-names" role="tab" aria-controls="following" aria-selected="false">Following</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#subscription-followers" role="tab" aria-controls="followers" aria-selected="false">Followers</a>
            </li>
              {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#customerclickssection" role="tab" aria-controls="views" aria-selected="false">Following Products</a>
            </li>  --}}
        </ul>
        <div class="tab-content">
 <section id="subscription-names" class="tab-pane fade show active" role="tabpanel">
                {{-- <h5 style="color:#b35464;"> <b>Following</b></h5> --}}
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <tr>
                                <th> Followings count ({{$merchantcount}})</th>
                                <th></th>
                            </tr>
                            @foreach($merchantfollowing as $customeranuserinfo)
                                <tr>
                                    <td><a href="{{ url('/account/'.$customeranuserinfo->slug) }}"> {{$customeranuserinfo->company  }}
                                    </a>
                                </td>
                                <td> <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$customeranuserinfo->avatar }}); width:50px; height:50px;"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
               
            </section>

             <section id="subscription-followers" class="tab-pane fade show " role="tabpanel">
                {{-- <h5 style="color:#b35464;"> <b>Following</b></h5> --}}
                <div class="row">
                    <div class="col-md-12 col-12 table-responsive">
                        <table class="table">
                            <tr>
                                <th> Followers count ({{$merchantcountfollowers}})</th>
                                <th></th>
                            </tr>
                            @foreach($merchantfollowers as $customeranuserinfo)
                                <tr>
                                    <td><a href="{{ url('/account/'.$customeranuserinfo->slug) }}"> {{$customeranuserinfo->company  }}
                                    </a>
                                </td>
                                <td> <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$customeranuserinfo->avatar }}); width:50px; height:50px;"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
               
            </section>

        </div>
    </div>
    </section>

@endsection
