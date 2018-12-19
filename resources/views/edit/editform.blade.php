

        <div class="form-group">
            <label for="avatar">Upload Company logo</label>
            <input type="file" name="avatar" class="form-control" accept="image/" >
        </div>



          <div class="form-group {{ $errors->has('accountinfo') ? 'has-error' : '' }}">
              <input type="text" name="accountinfo" class="form-control" placeholder="Short Description of your company" maxlength="80" value=" ">
              @if ($errors->has('accountinfo'))
                  <small class="text-danger">{{ $errors->first('accountinfo') }}</small>
              @endif
          </div>

          <div class="form-group {{ $errors->has('websitelink') ? 'has-error' : '' }}">
              <label for="">Website Link to Item</label>
              <input type="url" name="websitelink" class="form-control" placeholder="Enter Your Website Link"  value="https://">
              @if ($errors->has('websitelink'))
                  <small class="text-danger">{{ $errors->first('websitelink') }}</small>
              @endif
          </div>
