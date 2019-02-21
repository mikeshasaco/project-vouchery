@extends('layouts.master')

@section('content')
<section id="admin-main" style="postion:relative; margin-top:150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                <a href="{{route('admin.dashboard')}}" class="list-group-item ">Dashboard</a>
                <a href="{{route('aduser')}}" class="list-group-item active">Merchant</a>
                <a href="{{route('adcustomer')}}" class="list-group-item ">Customer</a>
                <a href="{{route('category.create')}}" class="list-group-item ">Create Category</a>
                <a href="{{route('adproduct')}}" class="list-group-item ">Coupons</a>

                </div>

            </div>
            <div class="col-md-9">
                <form action="{{ route('submission.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <input type="url"  class="form-control" name="weblink"  value="https://">
                            </div>


                            <input type="submit" value="Post" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
        </div>
       
        </div>
        
    </div>
</section>



@endsection
