@extends('layouts.master')

@section('title', 'Welcome!')

@section('content')
    @if( count($errors) > 0 )
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    @foreach($errors->all() as $error)
                        <ul>{{ $error }}</ul>
                    @endforeach
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h3>User Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <label for="username">Your Name</label>
                    <input class="form-control" type="text" name="username" id="username" value="{{ Request::old('username') }}">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Your Password</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="{{ Request::old('confirm_password') }}">
                </div>
                <button class="btn btn-primary" type="submit">Sign Up</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>User Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <button class="btn btn-primary" type="submit">Sign In</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@endsection