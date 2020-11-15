@extends('layouts.master')
@section('content')

<style>
.show-block{
    margin-top: 29px;
}
.show-button{
    padding-top:20px;
}
.show-image .userimageshow{
    height: 364px;
    width: 100%;

}
.desc-show-page{
    padding-top: 10px;
    padding-bottom: 6px;
}

.title-show{
    padding-bottom: 8px;
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
.newprice5-show{
cursor:pointer;
color: green; 
margin-right:339px;
font-weight: bold;
}
.desc-show-page p{
font-size: 24px;
 line-height:40px;
  font-weight:bold;

}


.dealbody{
margin-top: 120px; 
margin-bottom:140px;
}


@media (max-width: 1024px){

    .show-block{
        margin-top:-1px;
    }

    .newprice5-show{

margin-right:253px;

}
}

@media (max-width: 768px){

    .dealbody{
        margin-top:230px;
    }
    .show-button{
        padding-top:8px;
    }

    .desc-show-page p{
font-size: 20px;
 line-height:33px;
  font-weight:bold;

    }
    .newprice5-show{

    margin-right:150px;

    }
}

@media (max-width:430px) {
        .dealbody{
        margin-top:120px
    } 

    .newprice5-show{

    margin-right:198px;

    }
}

@media (max-width:376px) {
    .newprice5-show{

    margin-right:168px;

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
                        <h3 class="discounth5" title="Original Price" style="cursor:pointer; font-weight:bold;"> <strike> ${{ number_format($userproduct->currentprice, 2) }}</h3></strike>
                        <h3 class="newprice5-show"  title="Discount Price"> ${{ number_format($userproduct->newprice, 2) }}</h3>
                        {{-- <h3 class="badge badge-danger" title="Percentage Off" style=" cursor:pointer;">{{$userproduct->percentageoff()}} OFF</h3> --}}
                    </div>
                    <div class="merchant-show">
                     <span style="text-transform: uppercase; line-height:20px;">By:  <a href="{{ url('account' .'/'. $userproduct->slug) }}"> {{$userproduct->company}}</a></span>

                    </div>
                    <div class="desc-show-page">
                      <p>{{$userproduct->desc}}</p>  
                    </div>
                    <div class="mini-show">
                            <p class="show-category-name" title="Category">{{$userproduct->categoryname}}</p>
                             <p><i class="far fa-eye icon-battery-percent " id="icon-id-show"  title="Clicks/PerView"> Number Of Clicks:  {{$userproduct->clicks}}</i> </p>

                    </div>

                    <div class="show-button" >
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

