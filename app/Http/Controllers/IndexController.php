<?php

namespace App\Http\Controllers;

use App\User;
use App\Photos;

session_start();
class IndexController
{
    public function index() {
		if(isset($_SESSION['login_name'])) return redirect("user/" . $_SESSION['login_name']);
        return view('index', []);
    }
	
	public function user($name) { 
		$user = new User();
		$poster = $user->where('name', '=', $name)->first();
		$photo = new Photos();
		$images = $photo->select()->where('poster_id', '=', $poster['original']['id'])->paginate(6);
		return view('user.index', ['user' => $poster['original'], 'images' => $images]);
	}
	
	public function explore() {
		$photo = new Photos();
		$images = $photo->select()->where('isPrivate', '=', '0')->orderBy('views', 'desc')->paginate(15);
		return view('user.explore', ['images' => $images]);
	}
	
	public function search() {
		if(!isset($_GET['query']))
			return redirect("user/" . $_SESSION['login_name']);
		
		// Load photo
		$photo = new Photos();
		$image = $photo->join('accounts', 'images.poster_id', '=', 'accounts.id')->select('accounts.name', 'images.*')->where([['images.title', '=', $_GET['query']], ['images.isPrivate', '=', '0']])->paginate(6);
		return view('user.tags', ['images' => $image, 'hashtag' => 'Search results: ' . $_GET['query']]);
	}
	
	public function showtag($hashtag) {
		// Sanitize query
		$hashtag = preg_replace('#[^a-z0-9_]#i', '', $hashtag);
		
		// Load photo
		$photo = new Photos();
		$image = $photo->join('accounts', 'images.poster_id', '=', 'accounts.id')->select('accounts.name', 'images.*')->where([['images.description', 'like', '%#' . $hashtag . '%'], ['images.isPrivate', '=', '0']])->paginate(15);
		return view('user.tags', ['images' => $image, 'hashtag' => '#'. $hashtag]);
	}
}