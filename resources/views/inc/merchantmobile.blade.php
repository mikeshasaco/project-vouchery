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
            <div class="btn-group">
  <button type="button" class="custom-account-mobile-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    MY ACCOUNT
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item"  href="{{ route('myaccount', auth()->user()->slug) }}">Profile</a>
    <a class="dropdown-item" href="{{ route('myads', auth()->user()->slug) }}">Setting</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>
        <li><a href="{{ route('AllBusinesses') }}">Categories</a></li>
        <li><a class="nav-link" href="{{route('faqroute')}}"> Help</a></li>

        <button type="button" class="custom-createbutton-mobile" data-toggle="modal" data-target="#productmodal">
      Create 
    </button>
    @endif
    </ul>
  </div>
</nav>
