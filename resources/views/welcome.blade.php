@extends('master')

@section('title')
    welcome
@endsection
@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('signup') }}" method= "post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class = "form-control" type="text" name="email" id= 'email' value = {{ Request::old('email') }}>
                </div>
                <div class="form-group">
                    <label for="password">Your password</label>
                    <input class = "form-control" type="password" name="password" id= 'password'>
                </div>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input class = "form-control" type="text" name="name" id= 'name'>
                </div>
                <button type="submit" class="btn btn-primary">sign up</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{route('signin')}}" method= "post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class = "form-control" type="text" name="email" id= 'email' value = {{ Request::old('email') }}>
                </div>
                <div class="form-group">
                    <label for="password">Your password</label>
                    <input class = "form-control" type="password" name="password" id= 'password'>
                </div>
                <button type="submit" class="btn btn-primary">sing in</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection
    
