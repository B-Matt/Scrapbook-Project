<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Scrapbook is image sharing community">
		<meta name="author" content="Matej Arlović (B-Matt)">
		<link rel="icon" href="">
		
		<!-- Facebook tags -->
		<meta property="og:url"           content="http:/localhost/laravel/public" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Scrapbook" />
		<meta property="og:description"   content="Scrapbook is image sharing community" />
		<meta property="og:image"         content="" /> <!-- Icon -->
	
		<!-- End Facebook tags -->
		<title>Scrapbook - Image Fantasy</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-static-top navbar-light bg-faded">
		  <a href="{{ url('/') }}" class="navbar-brand">Scrapbook</a>
		  <ul class="nav navbar-nav">
			<li class="nav-item">
				<div class="nav-spacing"></div>
			</li>
			<?php if(isset($_SESSION['login_name']) && $_SESSION['login_name']): ?>
			<li class="nav-item">
			  <a class="nav-link" href="{{ url('/explore') }}">Explore</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="{{ url('/upload') }}">Upload</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="{{ url('/logout') }}">Log out</a>
			</li>
			<?php else: ?>
			<li class="nav-item">
			  <a class="nav-link" href="{{ url('/login') }}">Login</a>
			</li>
			<?php endif; ?>
		  </ul>
		</nav>
		@yield('cover')

		<div class="container marketing">
			@yield('content')
		</div>
		<footer class="footer">
			<div class="container">
				<span style="float:right"><a href="#">Back to top</a></span>
				<span>&copy; 2016. Scrapbook, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></span>
			</div>
		</footer>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="{{asset('js/scrapbook.js')}}"></script>
  </body>
</html>