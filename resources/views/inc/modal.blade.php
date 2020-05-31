<div class="modal fade form-prevent-multiple-submits" id="productmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('product.create')
      </div>
      <div class="modal-footer">
        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Post" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
    </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade form-prevent-multiple-submits" id="subscriptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
                <h4 class="text-center">Subscription Setting...</h4>
                <div>
                  <div  class="">
                    <label for="merchant" class="col-lg-6">Merchant: </label>
                    <div class="col-lg-6 pull-right">Name</div>
                  </div>
                  <div class="">
                    <label for="type" class="col-lg-6">Type of Subscription: </label>
                    <div class="col-lg-6 pull-right">Monthly</div>
                  </div>
                  <div class="subscription_price">
                    <label for="price" class="col-lg-6">Price of Subscription:</label>
                    <div class="col-lg-6 pull-right">$35</div>
                  </div>
                </div>
                <div class="panel-heading">
                    <div class="row">
                        <div><h5>Please Input Your Card Number</h5></div>
                        <img style='width:100%;'class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>CARD NUMBER</label>
                                    <div class="input-group mb-3">
                                        <input type="tel" class="form-control" placeholder="Valid Card Number" />
                                        <span class="input-group-text"><span class="fa fa-credit-card"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="form-group">
                                    <label><span class="hidden-lg">EXPIRATION</span><span class="visible-lg-inline">EXP</span> DATE</label>
                                    <input type="tel" class="form-control" placeholder="MM / YY" />
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label>CV CODE</label>
                                    <input type="tel" class="form-control" placeholder="CVC" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>CARD OWNER</label>
                                    <input type="text" class="form-control" placeholder="Card Owner Names" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Subscribe" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
    </div>
      </form>
    </div>
  </div>
</div>
