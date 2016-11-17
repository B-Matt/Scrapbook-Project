@extends('layouts.app')

@section('cover')
<div class="carousel-inner" role="listbox">
	<div class="carousel-item active">
		<img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
		<div class="container">
			<div class="carousel-caption text-xs-left">
				<h1>Example headline.</h1>
				<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
    <br><br><br>
	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">Enter in the world of <span class="text-muted">Photos</span>!</h2>
			<p class="lead">Join to our community of people who capture and share the most beatiful moments of your life! Express your creativity through photos and meet new photo enthusiasts! Stay calm and join Scrapbook!</p>
		</div>
		<div class="col-md-5">
			<div class="featurette-icon" style="margin-top: 20%;">
				<i class="fa fa-camera-retro fa-5x"></i>
			</div>
		</div>
	</div>

	<hr class="featurette-divider">
	<div class="row featurette">
		<div class="col-md-5 pull-md-7">
			<div class="featurette-icon" style="margin-left: 10%;">
				<i class="fa fa-tachometer fa-5x"></i>
			</div>
		</div>
		<div class="col-md-7 push-md-5" style="right: 10%;">
			<h2 class="featurette-heading">Fast upload, good filters and <span class="text-muted">great photos</span>!</h2>
			<p class="lead">Scrapbook has really simple to use and fast upload mechanism, good filters and great photos without any major image compression. Anybody can upload photos to our service because it's too simple to use! Don't belive us? Try it yourself!</p>
		</div>
	</div>

	<hr class="featurette-divider">
	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">Great <span class="text-muted">image galleries</span>!</h2>
			<p class="lead">Your photos can be public or private, your choice! If your photos are public they can be seen in your image gallery. Photos can be commented and "love it" from other people.</p>
		</div>
		<div class="col-md-5">
			<div class="featurette-icon" style="margin-top: 20%;">
				<i class="fa fa-th fa-5x"></i>
			</div>
		</div>
	</div>
@endsection