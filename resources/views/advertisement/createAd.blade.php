@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-6 offset-md-3 " style="background-color:white; padding:5%;" >
                <h3>Advertise Your Company Coupon</h3>

                        <form action="{{ route('adsubmissions.store') }}" method="post" enctype="multipart/form-data">
                                      {{ csrf_field() }}

                                      <div class="panel panel-default">
                                          <div class="panel-body">
                                              <div class="form-group">
                                                  <div class="form-group text-center">
                                                      <ul class="list-inline">
                                                          <li class="list-inline-item"> <img src="/mastercard.png" alt=""> </li>
                                                          <li class="list-inline-item"> <img src="/visa.png" alt=""></li>
                                                          <li class="list-inline-item"><img src="/express.png" alt=""></li>
                                                          <li class="list-inline-item"><img src="/discover.png" alt=""></li>
                                                      </ul>
                                                  </div>
                                               <label>Payment amount</label>
                                               <h2>$19.99</h2>
                                                </div>

                                              <div class="form-group">
                                                  <label>Coupon Image</label>
                                                 <input type="file" class="form-control" name="image">
                                               </div>

                                              <div class="form-group">
                                                  <label>Coupon Name</label>
                                                  <input type="text" name="title" class="form-control" placeholder="Enter your post title">

                                              </div>

                                              <div class="form-group">
                                                  <label>Coupon Description</label>
                                                  <input type="text" name="description" class="form-control" placeholder="Enter your description">

                                              </div>

                                              <div class="form-group ">
                                                  <label>Original Price</label>
                                                  <input type="number" name="current" class="form-control" step="any" placeholder="Enter your current price">

                                              </div>

                                              <div class="form-group">
                                                  <label>Discounted Price</label>
                                                  <input type="number" name="new" class="form-control" step="any" placeholder="Enter your new price">

                                              </div>

                                              <input type="hidden" name="submissionprice" value="19.99">

                                              <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_0pTcQ6w6V9JuLB7khUEmuTev" dat a-amount="19.99" data-name="" data-description=" expired" data-email="{{ auth::check() ? auth()->user()->email : null }}"
                                                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-panel-label=" Run Advertisement" data-locale="auto">
                                              </script>
                                              {{-- <input type="submit" value="Post" class="btn btn-outline-danger btn-block"> --}}
                                          </div>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>




@endsection
