@extends('layouts.app')

@section('content')
	<br><br><br>
	<div class="view-image">
		<div class="row">
			<div class="col-sm-4" style="width:auto;">
				<img src='{{ asset($image["path"]) }}' alt='{{ asset($image["title"]) }}' height="598" width="598" />
			</div>
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-4" style="width:auto;">
						<img class="view-avatar" width="60" height="60" src="<?php echo $poster['avatar'] ?>" alt="Profile Picture" />
					</div>
					<div class="col-sm-4 view-title">
						<h1><?php echo $image['title']; ?></h1>
					</div>
					<div class="col-sm-4 view-hours"><h4 class="view-title">
						<?php echo $posted_at . 'h'; ?></h4>
					</div>
				</div>
				<hr>
				<p class="view-text"><?php echo '<b class="view-author">' . $poster['name'] . ':</b> ' . $image['description']; ?></p>
			</div>
		</div>
	</div>
@endsection