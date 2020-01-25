{{-- fixed-top  guest navbar --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom d-none d-lg-block " id="navbarfix" >
        <div class="container">
        <a href="{{ route('homepage') }}" class="navbar-brand" style="cursor:pointer;"><img src="/vouch.png" alt="logo" height="32px"></a>
        {{-- <a class="navbar-brand" href="{{route('homepage')}}">VoucheryHub</a> --}}
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown " class="nav-link dropdown-toggle " href="{{ route('AllBusinesses') }}" style="color:#B35464; font-size:16px;" role="button" aria-haspopup="true" aria-expanded="false" v-pre> Categories <span class="caret"></span> </a>
                    <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <?php $categories = App\Category::orderBy('categoryname', 'ASC')->get(); ?>

                            <div class="row">
                                @foreach($categories->chunk(5) as $chunk)
                                    @foreach($chunk as $categories)
                                    <div class="col-lg-3 ">
                                        <p style="font-size:16px;"><a style="color:black;" href="/businesses/{{$categories->catslug}}"> {{$categories->categoryname}}</a> </p>

                                    </div>
                                    @endforeach
                                    @endforeach

                            </div>
                        </div>
                    </div>

                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{route('faqroute')}}" style="color: #B35464; font-size:16px;">Help</a>
                </li>


                {{-- name saves the query result to the bar && id query print the result--}}





            </ul>

            <form class="navbar-form" action="{{ route('search') }}" method="GET">
                    <div id="custom-search-input">
                        <div class="input-group  col-md-12">
                            <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search for latest Deals...">
                        </div>
                    </div>

            </form>


            <ul class="navbar-nav ml-auto">


                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>

            </ul>

        </div>
    </div>
</nav>
