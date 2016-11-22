@extends('layouts.app')

@section('cover')
<div class="carousel-inner" role="listbox">
	<div class="carousel-item active">
		<div class="container">
			<div class="carousel-caption text-xs-left">
				<?php if(isset($user['avatar'])): ?>
					<img class="profile-avatar" width="145" height="145" src="<?php echo $user['avatar'] ?>" alt="Profile Picture" />
				<?php else: ?>
					<img class="profile-avatar" width="145" height="145" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Profile Picture" />
				<?php endif; ?>
				<h1><?php echo $user['name'] ?></h1>
				<p><?php echo $user['bio'] ?></p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
	<br><br><br>
	<div class="gallery">
		<ul id="items">
			@foreach($images as $photo)
				<li class="item">
					<a class="gallery-image-link" href='../image/{{ $photo->id }}'>
						<img src='{{ asset($photo->path) }}' alt='{{ $photo->title }}' height=293 width=293 />
					</a>
				</li>
			@endforeach
		</ul>
		{{ $images->links() }}
	</div>
@endsection