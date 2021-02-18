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
                        <h3 class="titleallcategory"  > <b> All Categories</b></h3>
                            <h5> <b>(Coupon Count <i>{{ $categorycountallbusy->count() }})</b> </i></h5>
                        
                    <div class="selectagcategory">
                    <select onchange="if (this.value) window.location.href=this.value" style="margin-top:5%; " class="media-select form-control">
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
                                    <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/{{$product->image}}" height="283" width="180">
                                 
                          <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                            </h4>
                            <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description"> <b> {{$product->desc}}</b></p>
                          <ul class="list-group list-group-flush">
                                    <div class="" style="display: flex;justify-content: space-between; padding-top:12px;">
                                        <div class="" style="display: flex;">
                                            <h5 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                            <h5 class="newprice5" style="cursor:pointer;color: green;margin-left: 5px;" title="Discount Price"> ${{ number_format($product->newprice, 2) }}</h5>
                                            <h5 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$product->percentageoff()}} OFF</h5>
                                        </div>
                                        
                                        @if(auth::user() || auth::guard('customer')->user())
                                        <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal
                                        </a>
                                        @else
                                            <a href="/register" class="cardbutton-page">View Deal</a>
                                        @endif
                                    </div>

                            </ul>

                                <hr style="margin-top: 0.1rem; margin-bottom: 3px;">

                            <p style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">

                            @if(empty($product->couponcode))
                            <i class="fas fa-tags" title="Discount Code"> </i>No Discount Code
                        @else
                          @if($product->coupon)
                            <i class="fas fa-tags" title="Discount Code"></i>Discount Code: {{$product->couponcode}}
                            @else
                            <i class="fas fa-tags" title="Discount Code"> </i>Discount Code: ******
                            @endif
                        @endif

                            </p>
                        
                            <p  style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>

                            <hr style="margin-top: 0.1rem; margin-bottom:14px;">


                       
                            <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:0px; margin-top:-20px; font-size: 13px;" title="Category">{{$product->categoryname}}</small> </a>
                                @if($product->exclusive)
                                <p  class="subscriberonly" style=" margin-top: -10px;">Subscriber Only</p>
                                @endif    

                                
                                   @if($product->advertboolean == 1)
                                <hr style="margin-top: 1.8rem; margin-bottom: 0rem;">
                                <p class="advertise">Promoted Ad</p>
                                @endif
                                <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:0; left:0; color:black;" > <b>View More:</b>  <b style="  text-transform: capitalize;">{{$product->company}}</b> </a>

                                {{-- <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:0; left:0" >View More: <b>{{$product->company}}</b> </a> --}}

                                    <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }}); position:absolute; bottom:0; right:8px; width:50px; height:50px; "></div>
                            
                        </div>                        
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
                    <div class="col-md-6 col-lg-4 col-12">
                        <div class="card"  id="cardproduct" data-product-id="{{ $product->id }}">
                            <img class="card-img-bottom" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/{{$product->image}}" height="283" width="180">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ url('account' .'/'. $product->slug) }}" title="Coupon Name" >{{$product->title}}</a>
                                </h4>
                                <p class="card-text"style="margin:0; margin-top:-10px;" title="Coupon Description"><b> {{$product->desc}}</b></p>
                                  <ul class="list-group list-group-flush">
                                    <div class="" style="display: flex;justify-content: space-between; padding-top:12px;">
                                        <div class="" style="display: flex;">
                                            <h5 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                            <h5 class="newprice5" style="cursor:pointer;color: green;margin-left: 5px;" title="Discount Price"> ${{ number_format($product->newprice, 2) }}</h5>
                                            <h5 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$product->percentageoff()}} OFF</h5>
                                        </div>
                                        
                                        @if(auth::user() || auth::guard('customer')->user())
                                        <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deal
                                        </a>
                                        @else
                                            <a href="/register" class="cardbutton-page">View Deal</a>
                                        @endif
                                    </div>

                            </ul>
      <hr style="margin-top: 0.1rem; margin-bottom: 3px;">

                            <p style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;" title="Expiration Date">

                            @if(empty($product->couponcode))
                            <i class="fas fa-tags" title="Discount Code"> </i>No Discount Code
                        @else
                          @if($product->coupon)
                            <i class="fas fa-tags" title="Discount Code"></i>Discount Code: {{$product->couponcode}}
                            @else
                            <i class="fas fa-tags" title="Discount Code"> </i>Discount Code: ******
                            @endif
                        @endif

                            </p>
                        
                            <p  style="font-weight:bold; font-size:13px; opacity:0.8; margin:0; cursor:pointer;"><i class="far fa-eye icon-battery-percent" title="Clicks/PerView"><b> {{$product->clicks}}</b></i></p>

                            <hr style="margin-top: 0.1rem; margin-bottom:14px;">


                       
                            <a href="{{ route('catBusinesses', $product->catslug) }}" class="nav-link" style="color:#B35464;"> <small class="badges" style="position:absolute; left:0px; margin-top:-20px; font-size: 13px;" title="Category">{{$product->categoryname}}</small> </a>
                                @if($product->exclusive)
                                <p  class="subscriberonly" style=" margin-top: -10px;">Subscriber Only</p>
                                @endif    

                                
                                   @if($product->advertboolean == 1)
                                <hr style="margin-top: 1.8rem; margin-bottom: 0rem;">
                                <p class="advertise">Promoted Ad</p>
                                @endif
                            
                                <a href="{{ url('account' .'/'. $product->slug) }}" style="position: absolute; bottom:0; left:0; color:black;" > <b>View More:</b>  <b style="  text-transform: capitalize;">{{$product->company}}</b> </a>

                                    <div class="companyimage rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$product->avatar }}); position:absolute; bottom:0; right:8px; width:50px; height:50px; "></div>
                            
                            </div>                        
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
