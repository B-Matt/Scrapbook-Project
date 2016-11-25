@extends('layouts.app')

@section('content')
	<br><br><br>
	<div class="gallery">
		<ul id="items">
			@foreach($images as $photo)
				<li class="item">
					<a style="margin:.2vw;" class="gallery-image-link" href='image/{{ $photo->id }}'>
						<img src='{{ asset($photo->path) }}' alt='{{ $photo->title }}' height=186 width=186 />
					</a>
				</li>
			@endforeach
		</ul>
		{{ $images->links() }}
	</div>
@endsection