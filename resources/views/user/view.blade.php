@extends('layouts.app')

@section('content')
	<br><br><br>
	<div class="view-image">
		<div class="row">
			<div class="col-sm-4" style="width:auto;">
				<img src='{{ asset($image["path"]) }}' alt='{{ asset($image["title"]) }}' height="600" width="480" />
			</div>
			<div class="col-sm-4" style="width:auto;">
				<h1 class="view-header"><?php echo $image['title']; ?></h1>
				<p class="view-subtitle"><?php echo '<b>' . $poster['name'] . '</b> | ' . $image['created_at']; ?></p>
				<hr>
				<span class="view-text"><?php echo $image['description']; ?></span>
			</div>
		</div>
	</div>
@endsection