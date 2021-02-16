@extends('layouts.master')

@section('content')
    <section style="margin-top:100px; padding-bottom:50px;">
        <div class="container">
            <div class="row">
                <h4 class="col-lg-8 offset-lg-2"><center> Question or Concerns Email US!</center></h4>

                <div class="col-lg-8 offset-lg-2 col-12" style="margin-top:2%;">
                    <div class="card-bodys">
                        <div class="card-body">
                            <form action="{{ route('help.store') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('sirname') ? 'has-error' : '' }}">
                                <label for="Enter your name">Enter Your Name</label>
                                <input type="text" name="sirname" class="form-control" >
                                {!! $errors->first('sirname', '<p class="help-blockerror"> Name is Required</p>') !!}

                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="Enter your email">Enter Your Email Address</label>
                                <input type="email" class="form-control"  name="email" placeholder="name@example.com">
                                {!! $errors->first('email', '<p class="help-blockerror"> Email Address is Required</p>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('bodymessage') ? 'has-error' : '' }}">
                                <label for="exampleFormControlTextarea1">What can we help you with?</label>
                                <textarea class="form-control" name="bodymessage" rows="3"></textarea>
                                {!! $errors->first('bodymessage', '<p class="help-blockerror"> Message is Required</p>') !!}

                                </div>

                                <button type="submit" class="help-button">Send Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
