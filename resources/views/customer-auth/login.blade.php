@extends('layouts.master')

@section('content')
<div class="container logincontainer" >

    <style>
    body{
        background-color: white;
    }
    .tab-login{
        width: 100%;
        display: grid;
        grid-template-columns: 50% 50%;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .tab-login li{
        text-align: center;
        line-height: 3em;
        font-size: 20px;
        font-weight: 400;
        text-transform: uppercase;
        list-style: none;
        cursor: pointer;
    }
    .tab-pan ul li.active{
        border-bottom: solid #CA3F3F;
        border-width:  0px 0 3px  ;
        padding-top: 1px;
        padding-bottom: 3px;
    }
    .tab-pan ul li{
        border-bottom: solid #d9d9d9;
        border-width:  0px 0 3px  ;
        padding-top: 1px;
        padding-bottom: 3px;

    }

    .tab-pan .pan{
        display: none;
    }
    .tab-pan .pan.active{
        display: block;
    }

    </style>



    <div class=" tab-pan row justify-content-center">
        <div class="col-md-8">
                <h1 class="loginh1">Sign In To Your Account!</h1>
            <ul class="tab-login">
                <li rel="vouchpanel3" class=" vouchpanel3 active">Customer</li>
                <li rel="vouchpanel4" class="vouchpanel4">Merchant</li>
            </ul>
        <div id="vouchpanel3" class="pan vouchpanel3-content active">

                    <form method="POST" action="{{ route('customer.login') }}" style="margin-top:8%;">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" style="height:4rem;font-size:16px;font-weight:400" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" style="height:4rem; font-size:16px;font-weight:400" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <a class="btn btn-link" style="font-size:1.2rem; margin-left:-1%;" href="{{ route('customer.password.request') }}">
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
                                <button type="submit" class="loginandregister" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0;">
                                    Sign In
                                </button>


                            </div>
                        </div>
                    </form>
                </div>

        <div id="vouchpanel4" class="pan vouchpanel4-content" style="margin-top:8%;">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email1" type="email" placeholder="Email" style="height:4rem;font-size:16px;font-weight:400" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password1" placeholder="Password" style="height:4rem;font-size:16px;font-weight:400" type="password" class="form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

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
                                <button type="submit" class="loginandregister" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0;">
                                    Sign In
                                </button>
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
$(document).ready(function() {
	$('.tab-login li, .pan').removeClass('active');

	var current_tab = localStorage.getItem("current_tab") || 'vouchpanel3',
  		element     = $(".tab-login li")
                      .parent('ul')
                      .find("[rel="+current_tab+"]")
                      .addClass('active');

  // new .pan code
  var pan = $('.pan')
    .parent('.col-md-8') // <-- This used to be .tab-pan (old parent)
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
