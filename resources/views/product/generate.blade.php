@extends('layouts.master')

@section('content')
<style>
    #subscriptiondiv{
        display: none;
    }
    #subscriptionbold{
        display: none;
        color: red;
    }
</style>

<section class="dealsection">

<div class="container " >
    <div class="row">
        <div class="col-md-8 offset-md-2">



  <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
{{-- <center><p style="color:b35464;"> Expiration Date: {{  \Carbon\Carbon::now()->addDays(7)->format('l, d F, Y') }}</p> </center> --}}

<h5 style="text-align: center; "> Create Deal</h5>
    
     <div class="panel panel-default">
         <div class="panel-body">
            <div class="form-group custom-control custom-switch">
                                <h6 style="margin-left:-24px; font-size 0.8rem;"> <b> ( Toggle on for coupon codes only visible  to subscribers.)</b></h6>

                <input type="checkbox" class="custom-control-input" id="customSwitches1" name="exclusive">
                <label class="custom-control-label" for="customSwitches1"> <b>Subscribers Only Mode</b> <i class="fas fa-info-circle" title="Turn Toggle On - Allows coupon codes to be only visible to your subscribers. 
                    Turn Toggle Off - Allows coupon code to visible to everyone."></i>  </label>

            </div>

            @if(empty(Auth::user()->subscription_price))

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}" id="subscriptiondiv">
                <label for=""> <b> My Subscription Price</b> <b style="color: red;">( Coupon Code will visible only to subscribers)</b> </label>
                <input type="text" id="instruction"  class="form-control" placeholder="Please Setup your subscription price" disabled >
                <a href="{{route('setsubscription', Auth::user()->slug)}}">Follow instructions setup your subscription price.</a>
             </div>
             @else

            <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }}" id="subscriptiondiv">
                <label for=""> <b> Your Current Subscription Price</b> <br> <b style="color: red;">(Coupon Codes only visible to subscribers)</b> </label>
                <input type="text"  id="subscriptionprice"  class="form-control" placeholder="${{Auth::user()->subscription_price}}/ Monthly" disabled >
             </div>
             @endif

            <div class="form-group custom-file">
                <input type="file" name="image" class="form-control custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Upload Coupon Image</label>
                @if ($errors->has('image'))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for=""><b>Coupon Name</b></label>
                <input type="text" name="title" class="form-control" placeholder="Coupon Name" maxlength="60">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                <label for=""><b>Coupon Description</b></label>
                <input type="text" name="desc" class="form-control" placeholder="Short Description of your Coupon." maxlength="110">
                @if ($errors->has('desc'))
                    <small class="text-danger">{{ $errors->first('desc') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('currentprice') ? 'has-error' : '' }}">
                <label for="">Product Original Price. <b>Do not put $ sign.</b></label>
                <input type="number" name="currentprice" class="form-control" step="any" placeholder="Example: 99.99">
                @if ($errors->has('currentprice'))
                    <small class="text-danger">{{ $errors->first('currentprice') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('newprice') ? 'has-error' : '' }}">
                <label for="">Product Discounted Price. <b>Do not put $ sign.</b></label>
                <input type="number" name="newprice" class="form-control" step="any" placeholder="Example: 59.99">
                @if ($errors->has('newprice'))
                    <small class="text-danger">{{ $errors->first('newprice') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('couponcode') ? 'has-error' : '' }}">
                <label for="" > <i class="fas fa-info-circle" title=""></i>  <b>Coupon Code (Optional)</b> <b id="subscriptionbold">Subscribers Only</b> </label>
                <input type="text" name="couponcode" class="form-control" placeholder="Enter Coupon Code. (Optional)" maxlength="20">
                @if ($errors->has('couponcode'))
                    <small class="text-danger">{{ $errors->first('couponcode') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for=""> <b> Website Link to Coupon </b></label>
                <input type="url" name="url" class="form-control"   value="https://">
                @if ($errors->has('url'))
                    <small class="text-danger">{{ $errors->first('url') }}</small>
                @endif
            </div>
            <!-- so the category name is looking for the productcontroller and the store function category -->
            <div class="form-group">
                <label for=""> <b> Category Of Coupon </b></label>
                <select class="form-control" name="category">
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Post" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
      </form>
              </div>
          </div>
    </div>
</section>

@endsection

@section('javascripts')
   
     <script type="text/javascript">
        $("#customSwitches1").click(function () {
            $("#subscriptiondiv").toggle();
            $("#subscriptionbold").toggle();

        });



     </script>


@endsection