@extends('layouts.master')
@section('content')
<div class="container-reset">
    <style>
    body{
        background-color: white;
    }

    </style>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="loginh1">Reset Password</h1>


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ route('password.email') }}" style="margin-top:3%;">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6 col-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-email" name="email" value="{{ old('email') }}"placeholder="Enter Current Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3  col-12">
                                <button type="submit" class="resetanpass"  style="width:100%; height:3rem; font-size:18px; padding:2px 0px 2px 0;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
