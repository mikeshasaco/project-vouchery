@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        @include('admin._sidebar')

        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-borderless" style="margin-top: 10%;">
                    <thead>
                        <tr>
                            <th>ID</th><th>Name</th><th> Company</th> <th>Delete User Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adminallusers as $ad)
                            <tr>
                                <td>{{ $ad->id }}</td>
                                <td>{{ $ad->name }}</td>
                                <td>{{ $ad->company }}</td>

                                <td>
                                    <form method="POST" action="{{ url('/admin' . '/users/all/' . $ad->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                </td>
                            </tr>
                    </tbody>
                @endforeach

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
