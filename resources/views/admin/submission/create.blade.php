@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
                @include('admin._sidebar')
            <div class="col-md-9">

                        <form action="{{ route('submission.store') }}" method="post" enctype="multipart/form-data">
                                      {{ csrf_field() }}
                                      <div class="panel panel-default">
                                          <div class="panel-body">
                                              <div class="form-group">
                                                 <input type="file" class="form-control" name="image">
                                               </div>

                                              <div class="form-group">
                                                  <input type="text" name="title" class="form-control" placeholder="Enter your post title">

                                              </div>

                                              <div class="form-group">
                                                  <input type="text" name="description" class="form-control" placeholder="Enter your description">

                                              </div>

                                              <div class="form-group ">
                                                  <input type="number" name="current" class="form-control" step="any" placeholder="Enter your current price">

                                              </div>

                                              <div class="form-group">
                                                  <input type="number" name="new" class="form-control" step="any" placeholder="Enter your new price">

                                              </div>

                                              <div class="form-group ">
                                                  <input type="text" name="discountcode" class="form-control" placeholder="Enter couponcode">

                                              </div>


                                              <input type="submit" value="Post" class="btn btn-primary btn-block">
                                          </div>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>




@endsection
