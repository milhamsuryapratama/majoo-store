@extends('web.master')

@section('content')
    <div class="i-am-centered">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        </div>
{{--                        <div class="form-check">--}}
{{--                            <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                            <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Login</button> | <a href="{{ route('register') }}">Register ?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection