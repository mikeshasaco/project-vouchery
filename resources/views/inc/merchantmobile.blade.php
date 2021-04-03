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

  {{-- <div class="nav__bottom">
    <ul>
        @if(!auth()->guard('web')->check())
        <li><a class="nav-link" href="{{ route('customer.login') }}">Login</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
  
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

        <button type="button" class="custom-createbutton-mobile" data-toggle="modal" data-target="#productmodal">
      Create 
    </button>
    @endif
    </ul>
  </div> --}}
</nav>



<div class="vertical-nav bg-white" id="sidebar" >
    <div class="overflow-sidebar">

     <div class="py-3 px-3" style="margin-top: 75px;">
        <div class="media d-flex align-items-start" id="user">
            <img class="companyimage-sidenavbar rounded-circle" style ="background-image: url(https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{ auth()->user()->avatar  }})"/>

            {{-- <img loading="lazy" src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{ auth()->user()->avatar }}" alt="profile" width="60" height="60" class="mr-3 rounded-circle img-thumbnail shadow-sm user-photo" /> --}}
            <div class="media-body mt-1">
                {{-- <h5 class="m-0"> <a href="{{ route('myaccount', auth()->user()->slug) }}" style="color:#b35464;">{{Auth::user()->company}}  </a> </h5> --}}

                <div class="followers mt-2" style="font-weight: 450;">
                    <span id="fans"><a href="{{ route('myaccount', auth()->user()->slug) }}" style="color: #b35464;"> {{Auth::user()->company}}</a> </span> |
                    <span id="following"> <a style="color: black;"   href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }}  </a></span> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
                    {{-- <span id="following">{{Auth::user()->Followings()->count()}} <a  style="color: black;" href="{{ route('myactivity', auth()->user()->slug) }}"> Following  </a> </span> --}}

                </div>
                {{-- <p class="font-weight-normal text-muted mb-0 mt-1"> {{Auth::user()->company}}</p> --}}
                <div class="followers mt-2" style="font-weight: 450;">
                    <span id="fans">{{Auth::user()->subscribercount()}} <a href="{{ route('subscription.statistic', auth()->user()->slug) }}" style="color: black;">Subscribers</a> </span> |
                    <span id="following">{{Auth::user()->followers()->count()}} <a style="color: black;"  href="{{ route('myactivity', auth()->user()->slug) }}">Followers  </a></span> 
                    {{-- <span id="following">{{Auth::user()->Followings()->count()}} <a  style="color: black;" href="{{ route('myactivity', auth()->user()->slug) }}"> Following  </a> </span> --}}

                </div>
            </div>
        </div>
    </div>

        <hr id="divider">


        <ul class="nav flex-column bg-white mb-0" id="sidebar-nav-id" style="font-weight: 500;font-size: 15px;">
    @if(Auth::user()->admin== 'admin')

        <li class="nav-item">
                <a id="list" href="{{ url('/admin')}}" class="nav-link text-dark">
                    <span class="material-icons"> https</span>
                    Admin Dashboard
                </a>
            </li>
     @endif

            <li class="nav-item">
                <a id="list" href="{{ route('myaccount', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">account_circle</span>
                    My profile
                </a>
            </li>
               <li class="nav-item">
                <a id="list" href="{{ route('myads', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">settings</span>
                    Edit Profile
                </a>
            </li>
               <li class="nav-item">
                <a id="list" href="{{ route('mynotification', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">notifications</span>
                    Notifications
                </a>
            </li>
            <li class="nav-item">
                <a id="list" href="{{ route('mytracker', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">visibility</span>
                    Clicks Tracker
                </a>    
            </li>
            <li class="nav-item">
                <a id="list" href="{{ route('myadvertise', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">equalizer</span>
                    Advertise
                </a>
            </li>

            <hr id="divider">

            <li class="nav-item">
                <a id="list" href="{{ route('setsubscription', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">credit_card</span>
                    Setup Subscription
                </a>
            </li>
            <li class="nav-item">
                <a id="list" href="{{ route('subscription.statistic', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">monetization_on</span>
                    Earnings
                </a>
            </li>

             <hr id="divider">

             <li class="nav-item">
                <a id="list" href="{{ route('subscription.coupons', auth()->user()->slug) }}" class="nav-link text-dark">
                    <span class="material-icons">local_offer</span>
                    Coupon Subscriptions
                </a>
            </li>


            <hr id="divider">

            <li class="nav-item">
                <a id="list" href="{{route('faqroute')}}" class="nav-link text-dark">
                    <span class="material-icons">help_outline</span>
                    Help and support
                </a>
            </li>
        

            <hr id="divider">

                {{-- <li class="nav-item" style="margin-bottom: 80px;"> 
                  <a id="list" class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="material-icons">             
                        logout
                    </span>
                     {{ __('Logout') }}
                    </a>
                </li>
    --}}
              

            {{-- <li class="nav-item" style="margin-bottom: 80px;">
                <a id="list" href="" class="nav-link text-dark">
                    <span class="material-icons">logout</span>    
                    Log out                
                </a>
            </li> --}}

        </ul>
    </div>

 </div>
    <!-- End vertical navbar -->
    
    
    
    <!-- Bottom Nav Bar -->
    <footer class="footer d-block d-lg-none">
        <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example" style="margin-top: -9px; margin-left: -20;">
           <button id="home" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('homepage') }}'>
              <div class="selector-holder">
                 <i class="material-icons">home</i>      
                  <h6>Home</h6>           
              </div>
           </button>
           <button id="feed" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('AllBusinesses') }}'>
              <div class="selector-holder">
                 <i class="material-icons">explore</i>
                  <h6>Categories</h6>
              </div>
           </button>
             <button id="create" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('generate.product') }}'>
              <div class="selector-holder">
                 <i class="material-icons">add_box</i>
                  <h6>Create</h6>
              </div>
           {{-- <button id="create" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('mynotification', auth()->user()->slug) }}'>
              <div class="selector-holder">
                 <i class="material-icons">notifications</i>
                    <h6>Notifications</h6>                
              </div>
           </button> --}}
           <button id="account" type="button" class="btn btn-secondary button-inactive sidebarCollapse">
              <div class="selector-holder">
                 <i class="material-icons">account_circle</i> 
                    <h6>Profile</h6>                
              </div>
           </button>
        </div>
     </footer>

@section('javascript')
<script src="{{asset('js/tabreload.js')}}"></script>
@stop