@extends('layouts.master')

@section('content')

<h1>Category</h1>
<div class="container">
    <div class="row">
        <div class="col-md-3">
             <div class="list-group" style="margin-top:138px;">
                 <a href="{{route('admin.dashboard')}}" class="list-group-item ">Dashboard</a>
                <a href="{{route('aduser')}}" class="list-group-item ">Merchant</a>
                <a href="{{route('adcustomer')}}" class="list-group-item ">Customer</a>
                <a href="{{route('category.create')}}" class="list-group-item ">Create Category</a>
                <a href="{{route('adproduct')}}" class="list-group-item ">Coupons</a>
             </div>
        </div>
        <div class="col-md-9">
                <div class="well">
                  <h2 style="margin-top:85px;">Create A Category</h2>

                    <form method="post" style="margin-top:2%;">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('categoryname') ? 'has-error' : '' }}" >
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
        </div>
    </div>

@endsection
