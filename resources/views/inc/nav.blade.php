{{-- fixed-top  Merchant navbar--}}
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom d-none d-lg-block "  id="navbarfix">
  
  <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example" style="margin-top: -9px; margin-left: -20;">
    <button id="home" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('homepage') }}'>
              <div class="selector-holder">
                     
                  <img src="/vouch.png" alt="logo" height="32px" width="121px;">     
              </div>

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
           <button id="create" type="button" class="btn btn-secondary button-inactive" onclick=window.location='{{ route('mynotification', auth()->user()->slug) }}'>
              <div class="selector-holder">
                 <i class="material-icons">notifications</i>
                    <h6>Notifications</h6>                
              </div>
           </button>
           <button id="account" type="button" class="btn btn-secondary button-inactive sidebarCollapse">
              <div class="selector-holder">
                 <i class="material-icons">account_circle</i> 
                    <h6>Profile</h6>                
              </div>
           </button>
        </div>

       
</nav>

@section('javascripts')
	<script type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@stop
