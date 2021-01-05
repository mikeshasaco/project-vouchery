
{{-- <center><p style="color:b35464;"> Expiration Date: {{  \Carbon\Carbon::now()->addDays(7)->format('l, d F, Y') }}</p> </center> --}}
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
                <input type="text" name="title" class="form-control" placeholder="Deal Name" maxlength="60">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
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
                                <input type="hidden" name="producttype_id" value="1">

            <!-- so the category name is looking for the productcontroller and the store function category -->
            <div class="form-group">
                <label for="">Category Of Deal</label>
                <select class="form-control" name="category">
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
