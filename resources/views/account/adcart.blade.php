@extends('layouts.master')
@section('title', $user->slug)

@section('content')


    <div class="container">

    <section id="merchantupdatesetting">
        <h5 style="color:#b35464;"> <b>Setting</b> </h5>
        <hr>

        <div class="row">
            <div class="col-md-12 col-12 ">

            <form  action="{{ route('update.edit') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="">
                <label for="avatar"> <b> Upload Company logo</b></label>
                <input type="file" name="avatar" class="form-control" accept="image/" >
            </div>
            <div class="{{ $errors->has('websitelink') ? 'has-error' : '' }}">
                <label > <b> Company Website:</b> </label>
                <input type="url" name="websitelink" class="form-control" placeholder="Enter Your Website Link"  value= {{   $userinfo->websitelink ?  : 'https://' }} >
                @if ($errors->has('websitelink'))
                    {!! $errors->first('websitelink', '<p class="help-blockerror"> Website Link is Required</p>') !!}
                @endif
            </div>
              <div class=" {{ $errors->has('accountinfo') ? 'has-error' : '' }}">
                  <label for="avatar"> <b><i>(200 char max)</i> Short Description of Company: </b> </label>

                  <textarea type="text" name="accountinfo"  class="form-control" placeholder="Short Description of your company" maxlength="200">{{ $userinfo->accountinfo }}</textarea>
                  @if ($errors->has('accountinfo'))
                      {!! $errors->first('accountinfo', '<p class="help-blockerror"> Short Description of your Company is required max(200 characters)</p>') !!}
                  @endif
              </div>

                      <button type="submit" class="updatepass-button">Submit Changes</button>

                  </form>

                  <img src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$user->avatar}}" class="img-updateprofile">

              </div>
          </div>
</section>




<section id="merchantpassword">
    <h5 style="color:#b35464;"> <b>Change Password</b></h5>
      <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                            <form class="form-horizontal" method="POST" action="{{ '/account/'.Auth::user()->slug . '/setting/'. 'changepassword'  }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12 col-12 col-lg-12">

                                        <ul id="password-box">
                                                <b> 1. Password must be minimum 6 characters. </b>
                                                <b> 2. Password must have at least one Uppercase Letter. </b>
                                                <b> 3. Password must have at least one Number. </b>
                                        </ul>

                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label"> <b>Current Password </b> </label>

                                            <div class="col-md-12">
                                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="col-md-4 control-label"><b> New Password</b></label>

                                            <div class="col-md-12">
                                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                                                @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group {{ $errors->has('new-password_confirmation') ? 'has-error' : ' ' }}">
                                            <label for="new-password-confirm" class="col-md-4 control-label"> <b> Confirm New Password</b></label>

                                            <div class="col-md-12">
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="updatepass-button">
                                                    Submit Change
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    </div>

                                </div>
                            </div>
                    </div>
        </section>

    <section id="merchantcouponsetting">
        <h5 style="color:#b35464;"><i class="fas fa-info-circle" title="Track your Coupons Advertisement Status"></i>  <b>My Coupon Advertisement Status</b></h5>
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




  <section id="merchantcouponsetting" >
      <h5 style="color:#b35464;"> <b> My Coupon Click Tracker</b></h5>
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


     
  <section id="merchantclicksetting" >
      <h5 style="color:#b35464;"> <i class="fas fa-info-circle" title="Every 1000 Clicks Per Coupon From Customers = $50USD"></i> <b>Click Tracker For My Rewards</b></h5>
          <div class="row">
              <div class="col-md-12 col-12">

              <table class="table">
                  <tr>
                      <th>Coupon Name</th>
                      <th> Click Per Coupon / Cents Per Click</th>
                      <th>Earn Reward <i>(1000 clicks per coupon = $50.00USD)</i> </th>
                  </tr>
                  @foreach ($usertracker as $tracker)

                  <tr>
                      <td>{{ $tracker->title }}</td>

                      <td>
                          
                          <span style="font-size:14px; font-weight:bold;"> {{ $tracker->total  }} / 1000</span>

                          {{-- <span class="badge badge-danger badge-pill"> {{ $tracker->total  }}</span> --}}
                      </td>
                      <td>  
                          @if($tracker->total > 1000)
                          <a class="btn btn-success" href="/help/questions">Claim</a>
                          @else 
                      <button type="button" disabled title="Claim $50USD after 1000 clicks">{{$tracker->total}} / 1000</button>
                      @endif
                    </td>

                  </tr>


              @endforeach


              </table>
          </div>


          </div>
     </section>



</div>

@endsection
