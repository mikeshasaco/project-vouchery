{{-- fixed-top  Merchant navbar--}}
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom d-none d-lg-block " id="navbarfix">
    <div class="container">
        <a href="{{ route('homepage') }}" class="navbar-brand" style="cursor:pointer;"><img src="/vouch.png" alt="logo" height="32px"></a>
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

                <li class="nav-item active" class=" d-none d-lg-block">
                    <a class="nav-link" href="{{route('faqroute')}}" style="color: #B35464; font-size:16px;"> Help</a>
                </li>
                {{-- name saves the query result to the bar && id query print the result--}}

            </ul>

            {{-- search bar --}}
            <form class="navbar-form" action="{{ route('search') }}" method="GET">
                    <div id="custom-search-input">
                        <div class="input-group  col-md-12">
                            <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search for latest Deals... ">
                        </div>
                    </div>

            </form>



            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <li class="nav-item">

                    <button type="button" class="custom-createbutton" data-toggle="modal" data-target="#productmodal">
                      Create 
                    </button>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->company }} <span class="caret"></span>
                                </a>




                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(auth()->guard('web')->check())
                            @if(Auth::user()->admin== 'admin')

                            <a class="dropdown-item" href="{{ url('/admin')}}">
                                            Admin DashBoard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('myaccount', auth()->user()->slug) }}">My Account</a>
                            <a class="dropdown-item" href="{{ route('myads', auth()->user()->slug) }}">Setting</a>


                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
