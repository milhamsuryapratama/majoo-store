@extends('web.master')

@section('content')
    <div class="i-am-centered">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                            <small id="nameHelp" class="form-text text-muted">{{ $errors ? $errors->first('name') : '' }}</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">{{ $errors ? $errors->first('email') : '' }}</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            <small>{{ $errors ? $errors->first('password') : '' }}</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password Confirmation</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Password Confirmation">
                        </div>
                        {{--                        <div class="form-check">--}}
                        {{--                            <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                        {{--                            <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                        {{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Register</button> | <a href="{{ route('login') }}">Login ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection