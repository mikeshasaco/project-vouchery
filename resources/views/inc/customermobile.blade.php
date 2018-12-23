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
         <li> <a href="{{ route('customerprofile', Auth()->guard('customer')->user()->customerslug) }}"> My Profile</a>
         </li>
           <li><a href="{{ route('AllBusinesses') }}">Categories</a></li>
           <li><a class="nav-link" href="{{route('faqroute')}}"> Help</a></li>
        <li>
                    <a  href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                            </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
        </li>
    @endif

    </ul>
  </div>
</nav>
