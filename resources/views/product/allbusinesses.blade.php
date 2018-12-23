@extends('layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@endsection

@section('title', 'All Coupons')




@section('content')


<section id="albusysection" style="margin-bottom:90px;">
    <?php $cats = DB::table('categoriess')->orderby('categoryname','ASC')->get(); ?>

    <div class="container">
        <div class="row">

            <div class="col-md-12 col-12">
                    <h2 class="titleallcategory"  > <b> All Categories</b></h2>
                    <h5> <b>(Coupon Count <i>{{ $categorycountallbusy->count() }})</b> </i></h5>
                    <div class="selectagcategory">

                    <select onchange="if (this.value) window.location.href=this.value" style="margin-top:5%; " class="media-select">
                        <option value="{{ route('AllBusinesses') }}">Select Category</option>
                        @foreach($cats as $categoryselect)
                        <option value="{{ url('/businesses'.'/'. $categoryselect->catslug)  }}">{{ $categoryselect->categoryname }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="row">

                    @foreach($products->chunk(2) as $chunk)
                        @foreach( $chunk as $product)
                        <div class="col-md-6 col-lg-4 col-12">
                            <div class="card"  id="cardproduct" data-product-id="{{ $product->id }}">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li>
                                            <a href="{{ url('/account' .'/'. $product->user['slug']) }}" class="nav-link"> <small class="badges">  {{$product->user['company']}}</small></a>
                                        </li>
                                        @if($product->advertboolean == 1)
                                            <li>
                                                <span class="nav-link" style="position:absolute; right:4%;"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                            </li>
                                            @endif
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="clear:both;">
                                            <h5 class="discounth5"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                            <h5 class="newprice5"> ${{ number_format($product->newprice, 2) }}</h5>

                                        </li>
                                    </ul>
                                    <div>
                                        <span class="badge badge-danger" style="float:right; margin-right:-6%; margin-top:2%;">{{$product->percentageoff()}} OFF</span>
                                        <a href="#" class="nav-link" style="    color: #B35464;float: right; margin-right:-68px;margin-top: 5%;"> <small class="badges">{{$product->category['categoryname']}}</small> </a>
                                    </div>

                                    <h4 class="card-title" >
                                        <a href="{{ url('account' .'/'. $product->user['slug']) }}" >{{$product->title}}</a>
                                    </h4>

                                    <br>
                                    <p class="card-text" style="margin:0;">{{$product->desc}}</p>
                                    <p style="font-weight:bold; font-size:12px; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                                    <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0;">
                                        <i class="far fa-clock"></i> {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                                </div>
                                <img class="card-img-bottom" src="{{$product->image}}" height="283" width="180">
                                <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal</a>
                            </div>

                        </div>

                        @endforeach
                        @endforeach
                </div>
                {{ $products->links() }}
            </div>


        </div>
    </div>
</section>

<section id="advert-section" class="d-none d-lg-block">
    <div class="container">
        <h3 style=" margin-bottom: 5%; margin-top: 4%;"> <center><b>Advertised Coupons</b></center></h3>

        <div class="row">

            @forelse($alladproducts as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card" id="cardproduct" data-product-id="{{ $product->id }}" >
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li>
                                <a href="{{ url('/account' .'/'. $product->slug) }}" class="nav-link" style="color:red;"> <small class="badges"> {{$product->company}}</small></a>
                            </li>
                            <li>
                                <span class="nav-link" style="position:absolute; right:4%;"> <small class="badge badge-warning">Promoted AD</small> </span>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="clear:both;">
                                <h5 class="discounth5"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                <h5 class="newprice5"> ${{ number_format($product->newprice, 2) }}</h5>

                            </li>
                        </ul>

                        <div>
                            <span class="badge badge-danger" style="float:right; margin-right:-6%; margin-top:2%;">{{$product->percentageoff()}} OFF</span>
                            <a  href="#" class="nav-link" style="    color: #B35464;float: right;    margin-right:-68px;    margin-top: 5%;"> <small class="badges">{{$product->categoryname}}</small> </a>
                        </div>

                        <h4 class="card-title">
                            <a href="{{ url('account' .'/'. $product->slug) }}" >{{$product->title}}</a> </h4>
                        <br>
                        <p class="card-text" style="margin:0;">{{$product->desc}}</p>
                        <p style="font-weight:bold; font-size:12px;margin:0;">Coupon Code: {{$product->couponcode}} </p>
                        <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0;">
                            <i class="far fa-clock"></i> {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                    </div>
                <img class="card-img-bottom" src="{{Storage::url($product->image)}}" height="283" width="180">
                    <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal</a>
                </div>


            </div>


            @empty
            <h4 style="margin-left:40%; padding-top:4%; padding-bottom:4%;"> <i> (No Advertisement Running)</i></h4>
            @endforelse
        </div>
    </div>
</section>


<section style="margin-top:10%; margin-bottom: 4%;" class="d-none d-lg-block">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <table class="table-border" id="myTable" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Coupons</th>
                            <th>Company Page</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($users as $user)
                        <tr>
                            <td>{{$user->company}} </td>
                            <td>{{$user->products}} Coupons</td>
                            <td><a href="{{ url('/account/'.$user->slug) }}" class=""> Visit Page</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascripts')
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );
</script>




@endsection
