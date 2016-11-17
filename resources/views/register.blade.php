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
    <form class="form-signin" method="post" action="{{ url('/register') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<h2 class="navbar-brand form-signin-heading">Scrapbook</h2>
		<input type="text" name="name" class="form-control" placeholder="Username" required autofocus>
		<input type="email" name="email" class="form-control" placeholder="Email address" required>
		<input type="password" name="password" class="form-control" placeholder="Password" required>
		<hr>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		<span class="form-muted">Already have account? <a class="nav-link" href="{{ url('/login') }}">Login</a>!</span>
    </form>
@endsection