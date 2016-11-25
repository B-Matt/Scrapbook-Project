<?php
namespace App\Http\Controllers;

use App\User;
use App\Photos;
use App\Comments;
use App\Loves;

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
		if($type == TYPE_THUMBNAIL) 		$image->fit(293);
		else if($type == TYPE_FULLPHOTO) 	$image->fit(1080);
		
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
            'description'     => 'required|string|max:256',
			'isPrivate'		  => 'required',
            'filter'          => 'required'
        ]);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            $name = uniqid() . md5($file->getClientOriginalName(). time() . 'ScrapbookImageUpload' );
			$path = $file->move(public_path('images'), $name . '.jpg');
			
            ImageController::saveImageWithFilter($path, $request->filter, $name, TYPE_THUMBNAIL);
			ImageController::saveImageWithFilter($path, $request->filter, $name, TYPE_FULLPHOTO);
			
			unlink(public_path('images') . '/' . $name . '.jpg');
			
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
	
	public function image($imageid) {
		// Load photo
		$photo = new Photos();
		$image = $photo->join('accounts', 'images.poster_id', '=', 'accounts.id')->select('accounts.name', 'images.*')->where('images.id', '=', $imageid)->first();
		
		// Is valid and private checking
		if($image['original']['poster_id'] == 0) 
			return redirect("user/" . $_SESSION['login_name']);
		
		if($image['original']['name'] != $_SESSION['login_name'])
			return redirect("user/" . $_SESSION['login_name']);

		// Photo poster
		$user = new User();
        $poster = $user->where('id', '=', $image['original']['poster_id'])->first();
		
		// Time created
		$diff = time() - $image['original']['created_at'];
		$hours = $diff / 3600 % 24;
		
		// Comments
		$comments = new Comments();
		$posts = $comments->join('accounts', 'comments.poster_id', '=', 'accounts.id')->select('accounts.name', 'comments.*')->where('image_id', '=', $imageid)->get();
		
		// Loves
		$loves = new Loves();
		$love_data = $loves->join('accounts', 'loves.lovers_id', '=', 'accounts.id')->select('accounts.name', 'loves.*')->where([['image_id', '=', $imageid], ['accounts.name', '=', $_SESSION['login_name']]])->first();
		
		// Views counter
		$image->views = $image->views + 1;
		$image->save();
		
		
		$views 			= number_format($image->views);
		$input_count 	= substr_count($views, ',');
		
		if($input_count != '0'){
			if($input_count == '1'){
				$views = substr($views, 0, -4).'k';
			} else if($input_count == '2'){
				$views = substr($views, 0, -8).'mil';
			} else if($input_count == '3'){
				$views = substr($views, 0,  -12).'bil';
			}
		}
		
		$options = [ 
			'image' 	=> $image['original'], 
			'poster' 	=> $poster['original'], 
			'posted_at' => $hours, 
			'comments' 	=> $posts, 
			'loved' 	=> $love_data['original']['name'],
			'views'		=> $views
		];
		return view('user.view', $options);
	}
	
	public function commentsubmit($imageid, Request $request) {
		$this->validate($request, [
            'comment'	=> 'required|string|max:90',
        ]);
		$text = htmlspecialchars($_POST['comment']);
	
		$user = new User();
		$poster = $user->where('name', '=', $_POST['author'])->first();
		
		$comments = new Comments();
		$comments->poster_id 	= $poster['original']['id'];
		$comments->image_id		= $_POST['image_id'];
		$comments->text			= $text;
		$comments->save();
		
		$photo = new Photos();
		$image = $photo->select()->where('id', '=', $imageid)->first();
        $poster = $user->where('id', '=', $image['original']['poster_id'])->first();

		$diff = time() - $image['original']['created_at'];
		$hours = $diff / 3600 % 24;
		
		$comments = new Comments();
		$posts = $comments->join('accounts', 'comments.poster_id', '=', 'accounts.id')->select('accounts.name', 'comments.*')->where('image_id', '=', $imageid)->get();
		return view('user.view', ['image' => $image['original'], 'poster' => $poster['original'], 'posted_at' => $hours, 'comments' => $posts]);
	}
	
	public function deleteimage($imageid) {
		$photo = new Photos();
		$photo = $photo->find($imageid);
		
		$string = explode('/', $photo->path);
		$string = explode('_full', $string[1]);
		
		unlink(public_path() . '/images/thumbnail/' . $string[0] . '_thumb' . $string[1]);
		unlink(public_path($photo->path));
		$photo->delete();
		return redirect("user/" . $_SESSION['login_name']);
	}
}