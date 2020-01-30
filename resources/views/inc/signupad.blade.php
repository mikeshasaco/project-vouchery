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
                    <div class="col-md-6 col-6">
                        <img src="/moneyline.png" >
                    </div>

                    <div class="col-md-6 col-6">
                        <h5><b> SignUp Your Business an Earn $5 USD.</b></h5>
                        <h5><b> Expose your Business to 1000+ Customers.</b></h5>
                        <h5><b> Track your Business Analytics.</b></h5>
                    </div>
             </div>
          </div>

        </section>
        
      </div>
      <div class="modal-footer">
                 {{-- <img src="/vouch.png" alt="logo" height="24px"> --}}
                     {{-- <a href="/register" class="customer-letter-button" style="float:left;"> Customer</a> --}}
                         <a href="/register" class="merchant-letter-button">Click to Sign Up</a>
      </div>
    </div>
  </div>
</div>
@endif

