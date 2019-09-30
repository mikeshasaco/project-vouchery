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
             <h3 style="text-align:center; font-style:italic; color:#B35464">Welcome to VoucheryHub</h3>
             <h5 style="color:#B35464;text-align:center; font-weight:bold;">Sign Up Today For FREE!</h5>
          </div>
      <div class="modal-body">
       
        <section class="merchant-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h5 style="color:#B35464"> Sign Up as Merchant</h5>
                        <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">1</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/diagram.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                             <p style="font-weight:bold; font-size:14px;">Post your coupons and grow your business.</p>
                        </div>
                   </div>
                        <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">2</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/analytics.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                        <p style="font-weight:bold; font-size:14px;">Track your Coupons analytics</p>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">3</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/adsv.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                        <p style="font-weight:bold; font-size:14px;">Advertise Coupons to Increase Coupon Growth</p>
                        </div>
                   </div>
                   {{-- <a href="" class="btn btn-danger" style="width:100%;">Sign Up</a> --}}
                 </div>
             </div>
          </div>

        </section>
        <hr>
        <section class="customer-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h5 style="color: #6699ff;"> Sign Up as Customer</h5>
                        <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">1</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/follow.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                             <p style="font-weight:bold; font-size:14px;">Follow your favorite companies!</p>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">2</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/love.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                             <p style="font-weight:bold; font-size:14px;">You can track coupons that interest you!</p>
                        </div>
                   </div>
                       <div class="row">
                        <div class="col-md-3 col-3">
                        <div class="numbers">3</div>
                        </div>
                        <div class="col-md-3 col-3">
                            <img src="/gold-medal.png" style="width:40px;" >
                        </div>
                        <div class="col-md-6 col-6">
                             <p style="font-weight:bold; font-size:14px;">Be the first to know when your favorite companies post coupons!</p>
                        </div>
                   </div>
                </div>
            </div>

            </div>

        </section>

         
        
      </div>
      <div class="modal-footer">
                 {{-- <img src="/vouch.png" alt="logo" height="24px"> --}}
                  <h5><b>Register: </b></h5>
                     <a href="/register" class="customer-letter-button" style="float:left;"> Customer</a>
                      <h5><b>Register: </b></h5>
                         <a href="/register" class="merchant-letter-button" style="float:right;"> Merchant</a>
      </div>
    </div>
  </div>
</div>
@endif

