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
	
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<br><br><br>
	<div id="view-image">
		<div class="row">
			<div class="col-sm-4" style="width:auto;">
				<img src='{{ asset($image["path"]) }}' alt='{{ $image["title"] }}' height="633" width="598" />
			</div>
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-4" style="width:auto;">
						<a href="../user/<?php echo $poster['name'] ?>"><img class="view-avatar" width="60" height="60" src="<?php echo $poster['avatar'] ?>" alt="Profile Picture" /></a>
					</div>
					<div class="col-sm-4 view-title">
						<h1><?php echo $image['title']; ?></h1>
					</div>
					<div class="col-sm-4 view-hours">
						<?php if($poster['name'] == $_SESSION['login_name']): ?>
							<a href="{{ url('image/') }}<?php echo '/delete/' . $image['id']; ?>">&#xf014;</a>
						<?php endif; ?>
						<h4 class="view-title">
							<?php echo $posted_at . 'h'; ?>
						</h4>
					</div>
				</div>
				<hr>
				<p class="view-text"><?php echo $image['description']; ?></p>
				<div class="view-info">
					<ul>
						<li>
							<?php if($loved == $_SESSION['login_name']): ?>
								<div id="love-button" class="view-info-button">
									<span class="love-icon view-info-awesome" style="color:#ed4956">&#xf004;</span>
									<span class="love-text view-info-text">Loved</span>
									
								</div>
							<?php else: ?>
								<div id="love-button" class="view-info-button">
									<span class="love-icon view-info-awesome">&#xf08a;</span>
									<span class="love-text view-info-text">Love it</span>
								</div>
							<?php endif; ?>
							
							<input type="hidden" class="view-lover" value="<?php echo $_SESSION['login_name'] ?>" />
							<input type="hidden" class="view-love-image" value='{{ $image["id"] }}' />
						</li>
						<li>
							<p><span class="view-info-awesome">&#xf007;</span> <?php echo $views ?></p>
						</li>
						<li>
							<div class="fb-share-button" data-href="http://localhost/laravel/public/image/2" data-layout="button_count" data-size="small" data-mobile-iframe="true">
								<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Flaravel%2Fpublic%2Fimage%2F2&amp;src=sdkpreparse">Share</a>
							</div>
						</li>
					</ul>
				</div>
				<div style="overflow:hidden;margin-right:-36px;">
					<div class="view-comments">
						@foreach($comments as $posts)
							<p class="view-post"><?php echo '<b class="view-author">' . $posts['name'] . ':</b>' . $posts['text']; ?></p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<form method="post" action="<?php echo $image['id']; ?>">
			<input type="text" name="comment" class="view-input" maxlength="90" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<input type="hidden" name="author" value="<?php echo $_SESSION['login_name'] ?>" />
			<input type="hidden" name="image_id" value='{{ $image["id"] }}' />
			<input type="submit" class="view-submit view-submit-text" value="&#xf0e5;"></input>
		</form>
	</div>
@endsection