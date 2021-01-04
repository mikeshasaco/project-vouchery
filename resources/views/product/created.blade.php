@extends('layouts.master')

@section('content')
<div class="col-md-12 " style="margin-top: 125px;" >


    <div class=" tab-pan row justify-content-center">
        <div class="wrapper-pan-productordiscountcode  col-md-12">
          
       
         <center>  <h6 class="loginh1" style="margin-top: -9px" style="color: black; opacity:0.8%;"> <b>Choose between a  Discount Code or a Product?</b> </h6></center> 
                  {{-- <center>  <h6 class="loginh1" style="margin-top: -9px" style="color: black; opacity:0.8%;"> <b>Discount Code are for business owners that have website coupons and want to drive customers to there website</b> </h6></center> 

                           <center>  <h6 class="loginh1" style="margin-top: -9px" style="color: black; opacity:0.8%;"> <b>Choose between a  Discount Code or a Product.</b> </h6></center>  --}}


     {{-- <h4 class="loginh1" style="margin-top: -9px" style="color: black"> <b> Sign Up To Enter Marketplace!</b> </h4> --}}
            <div>
                <ul class="tab-login">
                    <div>
                        <li rel="vouchpanel3" class=" vouchpanel3 "> <b>  Discount Code</b></li>
                    </div>
                    <div>
                        <li rel="vouchpanel4" class="vouchpanel4 active"> <b> Product</b> </li>
                    </div>
                </ul>
            </div>
        <div id="vouchpanel3" class="pan vouchpanel3-content ">

    <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
          <center><h3 style="font-family: Brush Script MT, Brush Script Std, cursive">Create Deal</h3></center>
     <div class="panel panel-default">
         <div class="panel-body">
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitches" name="exclusive">
                <label class="custom-control-label" for="customSwitches"> <b>Subscription Coupon</b> <i>(checkbox create subscribers only coupon code)</i> </label>
            </div>
            <div class="form-group custom-file">
                <input type="file" name="image" class="form-control custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Upload Deal Image</label>
                @if ($errors->has('image'))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="">Deal Name</label>
                <input type="text" name="title" class="form-control" placeholder="Deal Name" maxlength="60">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                 <label for="">Description of Deal</label>
                <input type="text" name="desc" class="form-control" placeholder="Short Description of your Deal." maxlength="100">
                @if ($errors->has('desc'))
                    <small class="text-danger">{{ $errors->first('desc') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('currentprice') ? 'has-error' : '' }}">
                <label for="">Deal Original Price. <b>Do not put $ sign.</b></label>
                <input type="number" name="currentprice" class="form-control" step="any" placeholder="Example: 99.99">
                @if ($errors->has('currentprice'))
                    <small class="text-danger">{{ $errors->first('currentprice') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('newprice') ? 'has-error' : '' }}">
                <label for="">Deal Discounted Price. <b>Do not put $ sign.</b></label>
                <input type="number" name="newprice" class="form-control" step="any" placeholder="Example: 59.99">
                @if ($errors->has('newprice'))
                    <small class="text-danger">{{ $errors->first('newprice') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('couponcode') ? 'has-error' : '' }}">
                <label for="">Coupon Code</label>
                <input type="text" name="couponcode" class="form-control" placeholder="Enter Coupon Code. (Optional)" maxlength="20">
                @if ($errors->has('couponcode'))
                    <small class="text-danger">{{ $errors->first('couponcode') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                <label for="">Website Link to Deal</label>
                <input type="url" name="url" class="form-control"   value="https://">
                @if ($errors->has('url'))
                    <small class="text-danger">{{ $errors->first('url') }}</small>
                @endif
            </div>
            <!-- so the category name is looking for the productcontroller and the store function category -->
            <div class="form-group">
                <label for="">Category Of Deal</label>
                <select class="form-control" name="category">
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                 <label for="">Your Subscription price</label>
                <input type="text" value="{{Auth::user()->subscription_price ? Auth::user()->subscription_price : 'You have Not Set Your Subscription Price'}}" class="form-control">
            </div>
           
        </div>
    </div>

                    <input type="hidden" name="producttype_id" value="1">

        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Post" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
      </form>
     </div>

        <div id="vouchpanel4" class="pan vouchpanel4-content active" >

              <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
          <center><h3 style="font-family: Brush Script MT, Brush Script Std, cursive">Create Product</h3></center>
     <div class="panel panel-default">
         <div class="panel-body">
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitches" name="exclusive">
                <label class="custom-control-label" for="customSwitches"> <b>Subscription Coupon</b> <i>(checkbox create subscribers only coupon code)</i> </label>
            </div>
            <div class="form-group custom-file">
                <input type="file" name="image" class="form-control custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Upload Product Image</label>
                @if ($errors->has('image'))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="">Product Name</label>
                <input type="text" name="title" class="form-control" placeholder="Product Name" maxlength="60">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                 <label for="">Product Description</label>
                <input type="text" name="desc" class="form-control" placeholder="Short Description of your Product." maxlength="100">
                @if ($errors->has('desc'))
                    <small class="text-danger">{{ $errors->first('desc') }}</small>
                @endif
            </div>
           
            <!-- so the category name is looking for the productcontroller and the store function category -->
            <div class="form-group">
                <label for="">Category Of Product</label>
                <select class="form-control" name="category">
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

        <div class="form-group">
                 <label for="">Your Subscription price</label>
                <input type="text" value="{{Auth::user()->subscription_price ? Auth::user()->subscription_price : 'You have Not Set Your Subscription Price'}}" class="form-control">
            </div>
           

                    <input type="hidden" name="producttype_id" value="2">

        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Post" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
      </form>

            
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script type="text/javascript">
    $(document).ready(function() {
        var Swipes = new Swiper('.swiper-container', {
            autoplay: {
                delay: 3000,
            },
            speed: 500,
            slidesPerView: 'auto',
            loop: true,
        });
        $('.tab-login li, .pan').removeClass('active');

        var current_tab = localStorage.getItem("current_tab") || 'vouchpanel4',
            element     = $(".tab-login li")
                        .parent('div')
                        .find("[rel="+current_tab+"]")
                        .addClass('active');

    // new .pan code
    var pan = $('.pan')
        .parent('.wrapper-pan-productordiscountcode ') // <-- This used to be .tab-pan (old parent)
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



