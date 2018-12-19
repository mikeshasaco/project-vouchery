
<div class="container">
  <div class="row">
       @foreach($productlower as $value)
        <div class="col-lg-6 col-xs-6 col-md-6">
          <div class="showcase-image">
            <img src="/images/{{ $value->image }}"  >
          </div>
        </div>

        <div class="col-lg-3 col-xs-3 col-md-3 ">
          <div class="showcase-info">
            <h3 class="show-title">{{$value->title}}</h3>
            <p class="show-desc">{{$value->desc}}</p>
            <h5 class="show-currentprice"> Current Price: <strike>${{$value->currentprice}}</h5></strike>
            <h5 class="show-newprice"> You Pay: ${{$value->newprice}}</h5>
            <a href="#" class="btn btn-outline-danger btn-block weblink" style="margin-left:-120%; margin-top:80px;">View Deal</a>


          </div>

        </div>

      @endforeach

        </div>
      </div>
