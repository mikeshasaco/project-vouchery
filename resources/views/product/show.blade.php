@extends('layouts.master')
@section('content')

<style>
.show-image .userimageshow{
    height: 364px;
    width: 100%;

}
.show-category-name{
    font-weight:bold; 
    font-size:20px;
     margin:0; 
     cursor:pointer;
      color:#B35464;
}

#icon-id-show{
    font-weight:bold; 
    font-size:10px;
     opacity:0.8; 
     margin:0; 
     cursor:pointer;
     font-size:18px; 
     margin-top:-25px;
}

.dealbody{
margin-top: 120px; 
margin-bottom:140px;
}

@media (max-width: 768px){

    .dealbody{
        margin-top:230px;
    }
}

@media (max-width:430px) {
        .dealbody{
        margin-top:120px
    } 
}

@media (max-width:320px) {
         #icon-id-show{
            font-size: 14px;
            margin-top: -19px;

        }
        .show-category-name{
            font-size: 14px;
        }
}
</style>

<section class="dealbody">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-12">
            <div class="row">
            <div class="col-md-6">
                <div class="show-image">
                <img src="/images/{{$userproduct->image}}" class="userimageshow" alt="deal image">

                </div>
            </div>

            <div class="col-md-6">
                <div class="show-block" id="show-block-current" data-product-id="{{ $userproduct->id }}" >
                    <div class="title-show">
                     <h1 style="font-weight: bold; font-size:1.55rem;">{{$userproduct->title}}</h1>
                    </div>
                    <div class="price-show" style="display: flex; justify-content: space-between;">
                        <h3 class="discounth5" title="Original Price" style="cursor:pointer;"> <strike> ${{ number_format($userproduct->currentprice, 2) }}</h3></strike>
                        <h3 class="newprice5" style="cursor:pointer;color: green; margin-right:200px;" title="Discount Price"> ${{ number_format($userproduct->newprice, 2) }}</h3>
                        {{-- <h3 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$userproduct->percentageoff()}} OFF</h3> --}}
                    </div>
                    <div class="merchant-show">
                     <span style="text-transform: uppercase; line-height:20px;">By:  <a href="{{ url('account' .'/'. $userproduct->slug) }}"> {{$userproduct->company}}</a></span>

                    </div>
                    <div class="desc-show">
                      <p style="font-size: 24px;">{{$userproduct->desc}}</p>  
                    </div>
                    <div class="mini-show">
                            <p class="show-category-name" title="Category">{{$userproduct->categoryname}}</p>
                            <p><i class="far fa-eye icon-battery-percent " id="icon-id-show"  title="Clicks/PerView"> Number Of Clicks:  {{$userproduct->clicks}}</i> </p>
                    </div>

                    <div class="show-button" style="padding-top:20px;">
                        <a class="show-button-product" href="{{$userproduct->url}}" target="_blank" style="color: white; letter-spacing: 3px; cursor:pointer;">View Deal on Website</a>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</section>


@endsection

