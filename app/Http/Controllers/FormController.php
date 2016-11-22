<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;

session_start();
class FormController extends Controller
{
    public function login()
    {
		if(isset($_SESSION['login_name'])) return redirect("user/" . $_SESSION['login_name']);
        return view('login');
	}
	
	public function logout()
    {
		if(isset($_SESSION['login_name'])) {
			session_unset();
			session_destroy();
			return redirect("login");
		}
		return redirect("user/" . $_SESSION['login_name']);
	}
	
    public function register()
    {
		if(isset($_SESSION['login_name'])) return redirect("user/" . $_SESSION['login_name']);
        return view('register');
    }

    public function loginsubmit(Request $request)
    {
		$this->validate($request, [
            'password'  => 'required',
            'name'      => 'required|max:50'
        ]);
		
        $user = new User();
        $results = $user->select()->where('name', '=', $request->name)->where('password', '=', hash("Whirlpool", $request->password))->get();
        if(count($results)) { $_SESSION['login_name'] = $request->name; return redirect("user/$request->name"); }
        else return redirect('login');
    }
	
    public function registersubmit(Request $request)
    {
        $this->validate($request, [
            'name'      		=> 'required|max:30',
            'password'     		=> 'required',
            'email' 			=> 'required|email|max:50'
        ]);
		
        $user = new User();
		
		$user->name         = $request->name;
		$user->email        = $request->email;
		$user->password     = hash("Whirlpool", $request->password);
		
		$user->save();
		$_SESSION['login_name'] = $request->name;		
		return redirect("user/$request->name");
    }

}