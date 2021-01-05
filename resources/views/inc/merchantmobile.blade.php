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
      {{-- <li><a class="nav-link" href="{{ route('myaccount', auth()->user()->slug) }}">My Account</a></li>   --}}
      {{-- <li>  <a class="nav-link" href="{{ route('myads', auth()->user()->slug) }}">Edit Profile</a></li> --}}

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->company }}</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('myaccount', auth()->user()->slug) }}">My Account</a>
          <a class="dropdown-item" href="{{ route('myads', auth()->user()->slug) }}">Edit Profile</a>
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

        {{-- <button type="button" class="custom-createbutton-mobile" data-toggle="modal" data-target="#productmodal">
      Create 
    </button> --}}
    @endif
    </ul>

  </div>
</nav>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav>
 {{-- <div id="side-menu" class="side-nav" style="margin-top: 91px;
    position: fixed;
    z-index: 99;
    width:250px;
    background-color:black;
    height:100px;">
    <a href="">home</a>
    <a href="">home</a>
    <a href="">home</a>

 </div> --}}

<div class="nav-bottom">
  <a href="{{route('homepage')}}" class="nav__link_bottom">
    <i class="material-icons nav__icon">dashboard</i>
    <span class="nav__text">Dashboard</span>
  </a>
  <a href="{{ route('AllBusinesses') }}" class="nav__link_bottom nav__link_bottom--active">
    <i class="material-icons nav__icon">explore</i>
    <span class="nav__text">Explore</span>
  </a>
  <a href="{{route('name.create')}}" class="nav__link_bottom">
    <i class="material-icons nav__icon">add_box</i>
    <span class="nav__text">Create</span>
  </a>
  <a href="{{ route('myads', auth()->user()->slug) }}" class="nav__link_bottom">
    <i class="material-icons nav__icon">settings</i>
    <span class="nav__text">Edit</span>
  </a>
  <a href="{{ route('myaccount', auth()->user()->slug) }}" id="profile_nav" class="nav__link_bottom dropdown">
    <i class="material-icons nav__icon">person</i>
    <span class="nav__text">Profile</span>
  </a>
</div>

</nav>

@section('javascript')
<script src="{{asset('js/tabreload.js')}}"></script>
@stop

