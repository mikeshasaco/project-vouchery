@extends('layouts.master')

@section('content')
<div class="container logincontainer" >
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
    <div class="phones-col">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(/voucheryhubimg.PNG);">
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(/vouchbank.PNG);"> 
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(/vouchstatic.PNG);">
                </div>
                <div class="swiper-slide" data-swiper-autoplay="3000" style="background-image: url(/vouchcoupon.PNG);">
                </div>
            </div>
        </div>
    </div>
    <div class=" tab-pan row justify-content-center">
        <div class="wrapper-pan col-md-12">
            <div class="logo">
                <img src="/vouch.png" alt="logo" height="50px">
            </div>
          <center>  <h5 style="color: #B8606E ">Earn money from posting coupoons!</h5></center>

            <h4 class="loginh1">Sign In To Your Account!</h4>
            <div>
                <ul class="tab-login">
                    <div>
                        <li rel="vouchpanel3" class=" vouchpanel3 active"> <b> Customer</b></li>
                    </div>
                    <div>
                        <li rel="vouchpanel4" class="vouchpanel4"> <b> Merchant</b></li>
                    </div>
                </ul>
            </div>
            
            <div id="vouchpanel3" class="pan vouchpanel3-content ">

                    <form method="POST" action="{{ route('customer.login') }}" style="margin-top:8%;">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" style="height:3rem;font-size:16px;font-weight:400" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" style="height:3rem; font-size:16px;font-weight:400" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <a class="btn btn-link" style="margin-left:-1%;" href="{{ route('customer.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label style="font-size:20px;line-height:20px;">
                                        <input type="checkbox" name="remember" class="logincheckbox" style="" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkbox-placeholder"></span>
                                        Keep Me Signed In
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="register-term">
                                By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                            </label>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="loginandregister">
                                    Sign In
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12 m-auto" style="width:fit-content">
                            <label for="sign-up">Don't have an account yet?</label>
                            <div class="m-auto" style="width:fit-content">
                                <a href="{{ route('register') }}">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>

            <div id="vouchpanel4" class="pan vouchpanel4-content active" style="margin-top:8%;">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email1" type="email" placeholder="Email" style="height:3rem;font-size:16px;font-weight:400" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="password1" placeholder="Password" style="height:3rem;font-size:16px;font-weight:400" type="password" class="form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a class="btn btn-link" style="font-size:1.2rem; margin-left:-1%;" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label style="font-size:20px;line-height:20px;">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Keep Me Signed In
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="register-term">
                            By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                        </label>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="loginandregister">
                                Sign In
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 m-auto" style="width:fit-content">
                        <label for="sign-up">Don't have an account yet?</label>
                        <div class="m-auto" style="width:fit-content">
                            <a href="{{ route('register') }}">Sign up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script type="text/javascript">
        var Swipes = new Swiper('.swiper-container', {
                autoplay: {
                    delay: 3000,
                },
                speed: 500,
                slidesPerView: 'auto',
                loop: true,
            });
        $(document).ready(function() {
            $('.tab-login li, .pan').removeClass('active');

            var current_tab = localStorage.getItem("current_tab") || 'vouchpanel4',
                element     = $(".tab-login li")
                            .parent('div')
                            .find("[rel="+current_tab+"]")
                            .addClass('active');

        // new .pan code
        var pan = $('.pan')
            .parent('.wrapper-pan') // <-- This used to be .tab-pan (old parent)
            .find('.' + current_tab + '-content')
            .addClass('active')

            // this code is switching from tab to tab
        // im in the class tab-panels > ul tab-vouch > grabing the li
        $('.tab-pan .tab-login li').on('click', function() {
            var $panels = $(this).closest('.tab-pan');
            $panels.find('.tab-login li.active').removeClass('active');
            $(this).addClass('active');

            // use if to check which tab has class of current_tab
            if ($('.pan').hasClass(current_tab)) {
                $(this).addClass('active');
            }

            var loginpanelshow = $(this).attr('rel');

            $('.tab-pan .pan.active').stop().slideUp(300, function(){
            $(this).removeClass('active');
            $('#'+ loginpanelshow).slideDown(300, function(){
                $(this).addClass('active');
            });
            });

            // this is the code that i attempted to use local storage to save on refresh
            var relAtt = $(this).attr('rel');
            localStorage.setItem("current_tab", relAtt);
            /* console.log(relAtt); */
            });
        });
    </script>
@endsection
