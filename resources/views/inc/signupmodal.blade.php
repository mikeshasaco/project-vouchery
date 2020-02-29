
@if(auth::user() ||  auth::guard('customer')->user() )

@else
<div class="modal fade-scale " id="overlay">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
       <img src="/vouch.png" alt="logo" height="24px">
       <a href="/login" style="margin-left: 20%;"> Sign In</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <div class="welcome-title-vouch" style="padding-top:8px; padding-bottom:8px; background:mistyrose;">
                  <h4 style="text-align:center; font-style:italic; color:#B35464">Register your Business to Voucheryhub Marketplace</h4>
            <h5 style="color:#B35464;text-align:center; font-weight:bold;">Earn extra money you can put back into your business</h5>
             <h5 style="color:#B35464;text-align:center; font-weight:bold;">Expose your business to our 1000+ Customers!</h5>
            <h5 style="color:#B35464;text-align:center; font-weight:bold;">Grow an audience!</h5>


          </div>
      <div class="modal-body">
       
        <section class="merchant-newsletter">
         <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" placeholder="Enter Full Name" style="height:3rem;font-size:16px;font-weight:400"
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

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>

                                    </span>
                                @endif
                            </div>


                        </div>

                    </div>

                    <div class="col-md-12">
                        <a href="/register" > Want to register as a customer?</a>
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
                </form>

        </section>

         
        
      </div>
    </div>
  </div>
</div>
@endif

