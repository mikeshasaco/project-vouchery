@extends('layouts.master')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')

<h1>Create Ad</h1>
<div class="container">
    <div class="row">
        <div class="col-md-3">
             <div class="list-group" style="margin-top:138px;">
                 <a href="{{route('admin.dashboard')}}" class="list-group-item ">Dashboard</a>
                <a href="{{route('aduser')}}" class="list-group-item ">Merchant</a>
                <a href="{{route('adcustomer')}}" class="list-group-item ">Customer</a>
                <a href="{{route('category.create')}}" class="list-group-item ">Create Category</a>
                <a href="{{route('adproduct')}}" class="list-group-item ">Coupons</a>
                <a href="{{route('subscription.payout')}}" class="list-group-item">Subscription Statistic</a>
                 <a href="{{route('adtype.create')}}" class="list-group-item">Create Ad Type</a>
                <a href="{{route('gender.create')}}" class="list-group-item">Gender</a>


             </div>
        </div>
        <div class="col-md-9">
                <div class="well">
                  <h2 style="margin-top:85px;">Create Ad </h2>

         
                <form method="post" enctype="multipart/form-data" action="{{route('create.ad')}}"  style="margin-top:2%;" >
                        {{ csrf_field() }}
                <div class="form-group custom-file">
                                <input type="file" name="image" class="form-control custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Upload  Image</label>
                                @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>


                       <div class="form-group" >
                            <label for="name control-label">Company Name</label>
                            <input type="text" class="form-control" id="adtypename" placeholder="Enter Primary Text" name="company">
                        </div>

                        <div class="form-group" >
                            <label for="name control-label">Primary Text</label>
                            <input type="text" class="form-control" id="adtypename" placeholder="Enter Primary Text" name="primary">
                        </div>

                          <div class="form-group" >
                            <label for="name control-label">Secondary Text</label>
                            <input type="text" class="form-control" id="adtypename" placeholder="Enter Secondary Text optional" name="secondary">
                        </div>

                      
                         <div class="form-group">
                             <label for="">Category</label>
                             <select class="form-control" name="category">
                            @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                             @endforeach
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="">Ad Type</label>
                             <select class="form-control" name="adtype">
                            @foreach($adtype as $type)
                           <option value="{{ $type->id }}">{{ $type->name }}</option>
                             @endforeach
                             </select>
                         </div>

                        <div class="form-group">
                             <label for="">Gender</label>
                             <select class="form-control" name="gender">
                            @foreach($genders as $gender)
                           <option value="{{ $gender->id }}">{{ $gender->role }}</option>
                             @endforeach
                             </select>
                         </div>

                         
                        <div class="form-group">
                             <label for="">Detail Targeting</label>
                             <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                            @foreach($tags as $tag)
                           <option value="{{ $tag->id }}">{{ $tag->tagname }}</option>
                             @endforeach
                             </select>
                         </div>


                        <input type="submit" value="Submit" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $('.select2-multi').select2();
</script>

@endsection