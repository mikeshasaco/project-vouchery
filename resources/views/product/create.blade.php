
<center> <h3>Create Coupon</h3> <b style="color:b35464;"> Expiration Date: {{  \Carbon\Carbon::now()->addDays(7)->format('l, d F, Y') }}</b> </center>
    
     <div class="panel panel-default">
         <div class="panel-body">
            <hr>
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitches" name="exclusive" checked>
                <label class="custom-control-label" for="customSwitches">Subscription Coupon</label>
            </div>
            <hr>
            <div class="form-group">
                <label for="file"> Upload Coupon Image</label>
                <input type="file" class="form-control" name="image">
                @if ($errors->has('image'))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <input type="text" name="title" class="form-control" placeholder="Coupon Name" maxlength="60">
                @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>


            <div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
                <input type="text" name="desc" class="form-control" placeholder="Short Description of your Coupon." maxlength="100">
                @if ($errors->has('desc'))
                    <small class="text-danger">{{ $errors->first('desc') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('currentprice') ? 'has-error' : '' }}">
                <label for="">Coupon Original Price. <b>Do not put $ sign.</b></label>
                <input type="number" name="currentprice" class="form-control" step="any" placeholder="Example: 99.99">
                @if ($errors->has('currentprice'))
                    <small class="text-danger">{{ $errors->first('currentprice') }}</small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('newprice') ? 'has-error' : '' }}">
                <label for="">Coupon Discounted Price. <b>Do not put $ sign.</b></label>
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
                <label for="">Website Link to Coupon</label>
                <input type="url" name="url" class="form-control"   value="https://">
                @if ($errors->has('url'))
                    <small class="text-danger">{{ $errors->first('url') }}</small>
                @endif
            </div>
            <!-- so the category name is looking for the productcontroller and the store function category -->
            <div class="form-group">
                <label for="">Category Of Coupon</label>
                <select class="form-control" name="category">
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
