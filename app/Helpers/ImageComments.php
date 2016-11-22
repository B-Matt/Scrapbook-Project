<?php
/*use App\User;
use App\Comments;
	
if(isset($_GET['comment']) && isset($_GET['author']) && isset($_GET['image_id'])) {
	$text = htmlspecialchars($_GET['comment']);
	
	$user = new User();
	$poster = $user->where('name', '=', $_GET['author'])->first();
	
	try{
		$comments = new Comments();
		$comments->poster_id 	= $poster['original']['id'];
		$comments->image_id		= $_GET['image_id'];
		$comments->text			= $text;
		$comments->save();
    }
    catch(Exception $e){
       echo $e->getMessage();
    }
}*/