@extends('layouts.master')

@section('content')
<div class="container registercontainer" style="margin-top: 125px;">
    <div class="phones-col">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/slider/vouchhome.png);">
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/slider/vouchbank.png);"> 
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/slider/vouchstatic.png);">
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/slider/vouchcoupon.png);">
                </div>
            </div>
        </div>
    </div>

    <div class=" tab-pan row justify-content-center">
        <div class="wrapper-pan  col-md-12">
            <div class="logo">
                <img src="/vouch.png" alt="logo" height="50px">
            </div>
        <center>  <h6 style="color: black; text-align:left; "> <b> Register your E-commerce business.</b></h6></center>
        <center>  <h6 style="color: black; text-align:left;"> <b> Earn monthly income from your Discount Codes.</b></h6></center>
        <center>  <h6 style="color: black; text-align:left; "> <b> Build a Following for your business.</b></h6></center>
        <center>  <h6 style="color: #B8606E; text-align:left; "> <b>Trusted Marketplace for online businesses</b></h6></center>

         {{-- <center>  <h5 style="color: black ">Sign up to make money and interact with your customers!</h5></center> --}}
          {{-- <center>  <h5 style="color: black "><b> Earn up to: $500/month </b> </h5></center> --}}
          {{-- <center>  <h5 style="color: #B8606E ">Earn money from posting your business deals!</h5></center> --}}
            {{-- <div class="ecom-types">
                <img src="/etsy.png" alt="etsy" height="30px" width="30px">
                <img src="/shopify.jpg" alt="shop" height="30px" width="30px">

            </div> --}}
         {{-- <center>  <h6 class="loginh1" style="margin-top: -9px" style="color: black; opacity:0.8%; text-align:left;"> <b>Trusted Marketplace for online businesses</b> </h6></center>  --}}

     {{-- <h4 class="loginh1" style="margin-top: -9px" style="color: black"> <b> Sign Up To Enter Marketplace!</b> </h4> --}}
            <div>
                <ul class="tab-login">
                 
                    <div style="width: 100%;">
                        <li rel="vouchpanel4" class="vouchpanel4" style="background-color: #B8606E; color:white;"> <b>Merchant</b> </li>
                    </div>
                </ul>
            </div>
        <div id="vouchpanel3" class="pan vouchpanel3-content ">

            <form method="POST" action="{{ route('customer.register') }}" style="margin-top:8%;">
            @csrf
            
            <div class="form-group row">

                <div class="col-md-12">
                    <input id="name1" style="height:3rem;font-size:16px;font-weight:400" placeholder="Enter Name"
                    type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                  <input id="username1" placeholder="Enter a UserName (No Spaces & No Special Characters)" style="height:3rem;font-size:16px;font-weight:400"
                  type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                  @if ($errors->has('username'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email1" placeholder="Enter a Email" style="height:3rem;font-size:16px;font-weight:400"
                     type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="password1" placeholder="Enter Password" style="height:3rem;font-size:16px;font-weight:400"
                    type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <input id="password-confirm1" placeholder="Password Confirmation" style="height:3rem;font-size:16px;font-weight:400"
                     type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

       
            <div class="col-md-12">
                <label for="register-term">
                    By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                </label>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="loginandregister" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0;">
                        Register
                    </button>
                </div>
            </div>
            <div class="col-md-12 m-auto" style="width:fit-content">
                <label for="sign-up">Don't have an account yet?</label>
                <div class="m-auto" style="width:fit-content">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </form>
    </div>

        <div id="vouchpanel4" class="pan vouchpanel4-content active" style="margin-top:8%;">

            <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" placeholder="Enter Name" style="height:3rem;font-size:16px;font-weight:400"
                             maxlength="20" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                          <input id="company" placeholder="Enter Company Name (No Spaces & No Special Characters)" style="height:3rem;font-size:16px;font-weight:400"
                          maxlength="16" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required autofocus>

                          @if ($errors->has('company'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('company') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" placeholder="Enter Email" style="height:3rem;font-size:16px;font-weight:400"
                             type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" placeholder="Enter Password" style="height:3rem;font-size:16px;font-weight:400"
                            type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="Password Confirmation" style="height:3rem;font-size:16px;font-weight:400"
                            type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

         

                    <div class="col-md-12">
                        <label for="register-term">
                            By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                        </label>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0;" class="loginandregister">
                                Register
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 m-auto" style="width:fit-content">
                        <label for="sign-up">Do you have an Account?</label>
                        <div class="m-auto" style="width:fit-content">
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection




