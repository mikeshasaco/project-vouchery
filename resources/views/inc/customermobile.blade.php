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
        @if(!auth()->guard('customer')->check())
        <li><a class="nav-link" href="{{ route('customer.login') }}">Login</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth()->guard('customer')->user()->name }}</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('customerprofile', Auth()->guard('customer')->user()->customerslug) }}"> My Profile</a>
            <a class="dropdown-item" href="{{ route('subscription.coupons', Auth()->guard('customer')->user()->customerslug) }}">Subscription Coupons</a>
          </div>
        </li>
           <li><a href="{{ route('AllBusinesses') }}">Categories</a></li>
           <li><a class="nav-link" href="{{route('faqroute')}}"> Help</a></li>
        <li>
          <a  href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
    @endif

    </ul>
  </div>
</nav>
