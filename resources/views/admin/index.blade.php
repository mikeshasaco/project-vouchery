@extends('layouts.master')


@section('content')
<h1> <center> Admin Panel</center> </h1>
<div class="container">
    <div class="row">
            @include('admin._sidebar')

        <div class="col-md-9">
         <h1 style="margin-left: 25%; margin-top:6%;">Admin DashBoard</h1>

        </div>
    </div>

</div>



@endsection
