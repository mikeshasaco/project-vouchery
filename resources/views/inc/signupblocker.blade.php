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
      <div class="modal-body">
          <div class="container">

       <div class=" tab-pan row justify-content-center">
        <div class="wrapper-pan  col-md-12">
            {{-- <div class="logo">
                <img src="/vouch.png" alt="logo" height="50px">
            </div> --}}
         <center>  <h5 style="color: black ">Sign up your business, earn a monthly income and interact with your customers!</h5></center>
          {{-- <center>  <h5 style="color: black "><b> Earn up to: $500/month </b> </h5></center> --}}
          {{-- <center>  <h5 style="color: #B8606E ">Earn money from posting your business deals!</h5></center> --}}
            {{-- <div class="ecom-types">
                <img src="/etsy.png" alt="etsy" height="30px" width="30px">
                <img src="/shopify.jpg" alt="shop" height="30px" width="30px">

            </div> --}}
         {{-- <center>  <h6 style="color: black ">Sign Up </h6></center> --}}

  <center>  <h5 class="loginh1" style="margin-top: -9px" style="color: black; opacity:0.8%;"> <b> Sign up to enter marketplace!</b> </h5></center> 
            <div>
                <ul class="tab-login">
                    <div>
                        <li rel="vouchpanel3" class=" vouchpanel3 "> <b> Customer</b></li>
                    </div>
                    <div>
                        <li rel="vouchpanel4" class="vouchpanel4 active"> <b>Merchant</b> </li>
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

            {{-- <div class="form-group row">
                <div class="col-md-12">
                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                        @if($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display:block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>

                            </span>
                        @endif
                    </div>


                </div>

            </div> --}}
            <div class="col-md-12">
                <label for="register-term">
                    By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                </label>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="loginandregister" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0; background-color:#b35464; color:white; font-weight:700;">
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
{{-- 
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

                    </div> --}}

                    <div class="col-md-12">
                        <label for="register-term">
                            By clicking an option below, I agree to the <a href="{{ route('termsof') }}">Term of Use</a> and the <a href="{{ route('privacy') }}">Privacy Statement</a>.
                        </label>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0; background-color:#b35464; color:white; font-weight:700;" class="loginandregister">
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
</div>
   </div>
    </div>
  </div>
</div>
@endif

