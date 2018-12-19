@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin._sidebar')

            <div class="col-md-9">
                <div class="card" style="margin-top:5%;">
                    <div class="card-header">Instant Ads</div>
                    <div class="card-body">


                        <form class="" action="{{ route('adcount') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search..." value="{{ request()->input('search') }}" >
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Company</th><th>Name</th><th>Product Title</th> <th> Ad Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instantad as $ad)
                                        <tr>
                                            <td>{{ $ad->company }}</td>
                                            <td>{{ $ad->name }}</td>
                                            <td>{{ $ad->title }}</td>
                                            <td>{{ $ad->adprice }}</td>
                                        </tr>
                                </tbody>
                            @endforeach

                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
