@extends('layouts.master')
@section(': title')

    @section('content')
@if($user == null)
    <div class="col-md-12" align="center">
        <h1 align="center" style="margin:20%; margin-top:18%;"> User <b style="color:red;">{{ $usernotexist }}</b> Not Found </h1>
    </div>

@else

{{--style="height:128px; width:128px;"  --}}

<div class="container">
    <div class=" profileheaderrow"  >
        <div class="col-md-12">
            <div class="content" >

                <div class="card profile-info ">
                    <div class="firstinfo">
                        <img src="https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Avatar/{{$user->avatar }}" class="companyimage" >

                        <div class="profileinfo" style=" margin-left:30%;margin-top:-25%;" >
                            <h4 class="profilecompany" > <b style="color:#b35464;"> Company:</b> {{ $user->company }}</h4>
                            <p class="profilebio"> <b style="color:#b35464;">Description: </b>{{$user->accountinfo}}</p>
                            <a href="{{$user->websitelink}}" class="websitebutton" target="_blank">Website Link</a></h6>
                            <h6 class="subscriberh6"> <b>Subscriber Count: {{ $followercount }}</b></h6>
                            @if(Auth::id() == $user->id)
                                  <!-- Button trigger modal -->
                                  {{-- <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal" style="position:absolute; left:6%; bottom:34%;">
                                      Edit Account
                                  </button> --}}
                                  <a href="{{ route('myads', auth()->user()->slug) }}" class="editaccount"> Edit</a>
                            @endif

                                @if(Auth::guard('customer')->user())
                                    @if(Auth::guard('customer')->user()->isfollowing($user))
                                        <a href="{{ url('account/'.$user->slug.'/unfollow') }}" class="unfollow_button ">
                                             UNSUBSCRIBE</a>
                                    @else
                                        <a href="{{ url('account/'.$user->slug.'/follow') }}" class="follow_button"> SUBSCRIBE</a>
                                    @endif
                                @elseif (Auth::user())

                                @else
                                    <a href="/register" class="follow_button">SUBSCRIBE</a>
                                @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@foreach($userproduct as $p)
<div class="container">
    <div class="row">
        <div class="col-md-6">
                {{$p->title}}

        </div>

    </div>

</div>
@endforeach

    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form class="" action="{{ route('update.edit') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="modal-body">
                                @include('edit.editform')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
        @endif
	@include('inc.signupblocker')

@endsection

@section('javascripts')
<script>
    $('.btn-customdelete').click(function(e){
        e.preventDefault()
            if (confirm('Are you sure you want to delete Coupon')) {
                $(e.target).closest('form').submit()
            }

    });
</script>

@endsection
