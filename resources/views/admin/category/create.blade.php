@extends('layouts.master')

@section('content')

<h1>Category</h1>
<div class="col-md-6 offset-md-3" style="margin-top:10%;">
    <h2><center>Create A Category</center> </h2>

          <div class="well">
              <form method="post">
                  {{ csrf_field() }}
                  <div class="form-group {{ $errors->has('categoryname') ? 'has-error' : '' }}">
                    <label for="name control-label">Name</label>
                    <input type="text" class="form-control" id="categoryname" placeholder="Enter your category name" name="categoryname">
                    @if ($errors->has('categoryname'))
                        <small class="text-danger">{{ $errors->first('categoryname') }}</small>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('catslug') ? 'has-error' : '' }}">
                    <label for="slug control-label">Category Slug</label>
                    <input type="text" class="form-control" name="catslug" id="catslug" placeholder="Slug">

                  </div>
                  <input type="submit" value="Submit" class="btn btn-success btn-block">
              </form>
          </div>
      </div>


@endsection
