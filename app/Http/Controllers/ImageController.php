<?php
namespace App\Http\Controllers;

use App\User;
use App\Photos;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;

define("TYPE_FULLPHOTO", 1);	// 1080x1080
define("TYPE_THUMBNAIL", 2);	// 293x293

session_start();
class ImageController extends Controller
{	
    public function upload()
    {	
		if( !isset($_SESSION['login_name'])) return redirect("login");
		return view('user.upload');
    }
    
	function saveImageWithFilter($path, $filter, $name, $type)
	{
		$image = Image::make($path);
		if($type == TYPE_THUMBNAIL) 		$image->resize(293, 293);
		else if($type == TYPE_FULLPHOTO) 	$image->resize(1080, 1080);
		
		switch($filter) {
			case 'antique':
				$image->filter(new Filters\AntiqueFilter());
				break;
			case 'blur':
				$image->filter(new Filters\BlurFilter());
				break;
			case 'chrome':
				$image->filter(new Filters\ChromeFilter());
				break;
			case 'monopin':
				$image->filter(new Filters\MonopinFilter());
				break;
			case 'retro':
				$image->filter(new Filters\RetroFilter());
				break;
			case 'velvet':
				$image->filter(new Filters\velvetFilter());
				break;
			case 'blackwhite':
				$image->filter(new Filters\BlackWhiteFilter());
				break;
			case 'boost':
				$image->filter(new Filters\boostFilter());
				break;
			case 'dreamy':
				$image->filter(new Filters\DreamyFilter());
				break;
			case 'sepia':
				$image->filter(new Filters\SepiaFilter());
				break;
			case 'syncity':
				$image->filter(new Filters\SynCityFilter());
				break;
		}
		
		if($type == TYPE_THUMBNAIL) 	 $image->save(public_path('images') . '/thumbnail/' . $name . '_thumb.jpg');
		else if($type == TYPE_FULLPHOTO) $image->save(public_path('images') . '/' . $name . '_full.jpg');
	}
	
    public function uploadsubmit(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|string|max:30',
            'description'     => 'required|string|max:60',
			'isPrivate'		  => 'required',
            'filter'          => 'required'
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $name = uniqid() . md5($file->getClientOriginalName(). time() . date("d/m/Y") . 'ScrapbookImageUpload' );
			$path = $file->move(public_path('images'), $name . '.jpg');
			
            ImageController::saveImageWithFilter($path, $request->filter, $name, TYPE_THUMBNAIL);
			ImageController::saveImageWithFilter($path, $request->filter, $name, TYPE_FULLPHOTO);
			
			//File::delete($name . '.jpg');
			$path = public_path('images') . '/' . $name . '_full.jpg';
            $path = str_replace("\\", "/", $path);
            
            $parts = explode('/', $path);
            $path  = $parts[5] . "/" . $parts[6];
            
            // MySQL - Get ID
            $user = new User();
            $poster = $user->where('name', '=', $_SESSION['login_name'])->first();

            // MySQL - Save
            $photo = new Photos();
            $photo->poster_id      	= $poster['original']['id'];
            $photo->title          	= $request->name;
            $photo->description    	= $request->description;
			$photo->isPrivate		= $request->isPrivate;
            $photo->path           	= $path;

            $photo->save();
            return redirect("user/" . $_SESSION['login_name']);
        }
    }
}