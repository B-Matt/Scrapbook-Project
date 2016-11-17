<?php
namespace App\Http\Controllers;

use App\User;
use App\Photos;
use Illuminate\Http\Request;

session_start();
class ImageController extends Controller
{
    public function upload()
    {	
		if( !isset($_SESSION['login_name'])) return redirect("login");
		return view('user.upload');
    }
    
    public function uploadsubmit(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|max:30',
            'description'     => 'required|max:60',
            'filter'          => 'required'
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $name = uniqid() . md5($file->getClientOriginalName(). time() . date("d/m/Y") . 'ScrapbookImageUpload' ) . '.jpg';
            $path = $file->move(public_path('images'), $name);
            $path = str_replace("\\", "/", $path);
            
            $parts = explode('/', $path);
            $path  = $parts[5] . "/" . $parts[6];
            
            // MySQL - Get ID
            $user = new User();
            $poster = $user->where('name', '=', $_SESSION['login_name'])->first();

            // MySQL - Save
            $photo = new Photos();

            $photo->poster_id      = $poster['original']['id'];
            $photo->title          = $request->name;
            $photo->description    = $request->description;
            $photo->path           = $path;

            $photo->save();
            return redirect("user/" . $_SESSION['login_name']);
        }
    }
}