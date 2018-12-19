<nav id="nav" class="d-block d-lg-none">
  <header class="nav__top">
    <div id="Logo-V">
        <a href="{{ route('homepage') }}" class="navbar-brand" style="cursor:pointer;"><img src="/vouch.png" alt="logo" height="32px"></a>
    </div>

    <div id="search_form" >
      <form action="{{ route('search') }}" method="GET">
          <input type="text"  name="query" id="query" value="{{ request()->input('query')}}" class="search-query form-control" placeholder="Search for latest Deals...">
       </form>
    </div>
  </header>

  <div class="nav__bottom">
    <ul>
      <li><a href="{{ route('login') }}" class="active">Login</a></li>
      <li><a  href="{{ route('register') }}">Register</a></li>
      <li><a href="{{ route('AllBusinesses') }}">Categories</a></li>
      <li><a class="nav-link" href="{{route('faqroute')}}"> Help</a></li>
    </ul>
  </div>
</nav>
