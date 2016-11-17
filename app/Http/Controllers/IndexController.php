<?php

namespace App\Http\Controllers;

use App\User;
use App\Photos;

session_start();
class IndexController
{
    public function index()
    {
		if(isset($_SESSION['login_name'])) return redirect("user/" . $_SESSION['login_name']);
        return view('index', []);
    }
	
	public function user($name) 
	{        
            $user = new User();
            $poster = $user->where('name', '=', $name)->first();
            $photo = new Photos();
            $images = $photo->select()->where('poster_id', '=', $poster['original']['id'])->get();
            return view('user.index', ['user' => $poster['original'], 'images' => $images]);
	}
}