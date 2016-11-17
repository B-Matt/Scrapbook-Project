@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	
	<br><br><br><br>
    <form class="form-signin" method="post" action="{{ url('/login') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <h2 class="navbar-brand form-signin-heading">Scrapbook</h2>
        <input type="text" name="name" class="form-control" placeholder="name" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="password" required>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <span class="form-muted">Not registered? <a class="nav-link" href="{{ url('/register') }}">Register</a>!</span>
    </form>
@endsection