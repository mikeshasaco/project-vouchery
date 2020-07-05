<nav id="nav" class="d-block d-lg-none">
  <header class="nav__top">

    <div id="Logo-V">
        <a href="{{ route('homepage') }}" class="navbar-brand" style="cursor:pointer;"><img src="/vouch.png" alt="logo" height="32px"></a>
    </div>

    <div id="search_form" >
      <form action="{{ route('search') }}" method="GET">
          <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search Deals...">
       </form>
    </div>
  </header>

  <div class="nav__bottom">
    <ul>
        @if(!auth()->guard('web')->check())
        <li><a class="nav-link" href="{{ route('customer.login') }}">Login</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->company }}</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('myaccount', auth()->user()->slug) }}">My Account</a>
          <a class="dropdown-item" href="{{ route('setsubscription', auth()->user()->slug) }}">Set Subscription</a>
          <a class="dropdown-item" href="{{ route('subscription.statistic', auth()->user()->slug) }}">Earnings</a>
        </div>
      </li>
      <li><a href="{{ route('AllBusinesses') }}">Categories</a></li>

      <li> <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a></li>
   
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

        <button type="button" class="custom-createbutton-mobile" data-toggle="modal" data-target="#productmodal">
      Create 
    </button>
    @endif
    </ul>
  </div>
</nav>

@section('javascript')
<script src="{{asset('js/tabreload.js')}}"></script>
@stop