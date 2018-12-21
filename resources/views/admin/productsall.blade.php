@extends('layouts.master')
@section('content')
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
            <div class="table-responsive">
                <table class="table table-borderless" style="margin-top:17%;">
                    <thead>
                        <tr>
                            <th>ID</th> <th>Product Name</th> <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminallproducts as $adminproduct)
                    <tr>
                        <td>{{$adminproduct->id}}</td>
                         <td>{{$adminproduct->title}}</td>
                    <td>
                    <form method="POST" action="{{url('/admin' . '/products/all/' . $adminproduct->id)}}">
                    {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    </td>
                    </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

</div>


@endsection