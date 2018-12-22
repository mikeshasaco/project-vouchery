@extends('layouts.master')

@section('content')


    <div class="search-container">
        <div class="container">
            <h1 style="padding-top:10%;"> <center> Search Results '{{ request()->input('query') }}'</center> </h1>
            {{--allows for the query input to stay on screen  --}}
            <p style="font-size:16px;">({{ $products->count() }} result(s) for '{{ request()->input('query') }}')</p>
        </div>

    <section id="searchcoupon" style="padding-bottom:4%;">

        <div class="container">
          <div class="row">

              @if($products->total() > 0 )

              @foreach($products as $product)
              <div class="col-md-6 col-lg-4">
                  <div class="card" id="cardproduct" data-product-id="{{ $product->id }}">
                      <div class="card-header">
                          <ul class="nav nav-tabs card-header-tabs">
                              <li>
                                  <a href="{{ url('/account'.'/'. $product->user['slug']) }}" class="nav-link">
                                      <small class="badges">  {{$product->user['company']}}</small>
                                  </a>
                              </li>
                              @if($product->advertboolean == 1)
                                  <li>
                                      <span class="nav-link"> <small class="badge badge-warning"> Promoted Ad</small> </span>
                                  </li>
                                  @endif
                          </ul>
                      </div>
                      <div class="card-body">
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item" style="clear:both;">
                                  <h5 class="discountR5"> <strike> ${{ number_format($product->currentprice, 2) }}</h5></strike>
                                  <h5 class="newpriceR5"> ${{ number_format($product->newprice, 2) }}</h5>

                              </li>
                          </ul>

                          <span class="badge badge-danger" style="float:right; margin-right:-6%; margin-top:2%;">{{$product->percentageoff()}} OFF</span>

                          <a href="#" class="nav-link" style="color:red; float:right; margin-top:5%;  margin-right:-68px;"> <small class="badges">{{$product->category->categoryname}}</small> </a>


                          <h4 class="card-title">
                              <a href="{{ url('account' .'/'. $product->user['slug']) }}">{{$product->title}}</a>
                          </h4>

                          <br>
                          <p class="card-text" style="margin:0;">{{$product->desc}}</p>
                          <p style="font-weight:bold; font-size:12px; margin:0;">Coupon Code: {{$product->couponcode}} </p>
                          <p style="font-weight:bold; font-size:10px; opacity:0.8; margin:0;">
                              <i class="far fa-clock"></i> {{ Carbon\Carbon::parse($product->expired_date)->format('F d, Y') }} </p>
                      </div>
                      <img class="card-img-bottom" src="{{Storage::url($product->image)}}" height="283" width="180">

                      <!-- <img class="card-img-bottom" src="/images/{{ $product->image }}" height="210" width="160" > -->
                      <a href="{{$product->url}}" target="_blank" class="cardbutton-page"> View Deals</a>
                  </div>



              </div>
          @endforeach
            </div>
            {{ $products->appends(request()->input())->links() }}

        @endif
          </div>
</section>

    </div>

@endsection
