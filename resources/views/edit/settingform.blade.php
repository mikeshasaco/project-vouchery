<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
<label for="new-password" class="col-md-4 control-label">Current Password</label>
<div class="col-md-6">
<input id="current-password" type="password" class="form-control" name="current-password" required>
@if ($errors->has('current-password'))
<span class="help-block">
<strong>{{ $errors->first('current-password') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
<label for="new-password" class="col-md-4 control-label">New Password</label>
<div class="col-md-6">
<input id="new-password" type="password" class="form-control" name="new-password" required>
@if ($errors->has('new-password'))
<span class="help-block">
<strong>{{ $errors->first('new-password') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group">
<label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
<div class="col-md-6">
<input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
</div>
</div>
