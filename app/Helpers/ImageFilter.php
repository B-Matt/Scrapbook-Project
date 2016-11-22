<?php
require("../../vendor/autoload.php");

use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;
	
if(isset($_POST['filter']) && isset($_POST['path'])) {
	$type 	= 'jpg';
	$image 	= Image::make($_POST['path']);
	switch($_POST['filter']) {
		case 'antique':{
			$type = 'png';
			$image->filter(new Filters\AntiqueFilter());
			break;
		}
		case 'blur': {
			$type = 'jpg';
			$image->filter(new Filters\BlurFilter());
			break;
		}
		case 'chrome':
			$image->filter(new Filters\ChromeFilter());
			break;
		case 'monopin':
			$image->filter(new Filters\MonopinFilter());
			break;
		case 'retro': {
			$type = 'jpg';
			$image->filter(new Filters\RetroFilter());
			break;
		}
		case 'velvet': {
			$type = 'png';
			$image->filter(new Filters\velvetFilter());
			break;
		}
		case 'blackwhite':
			$image->filter(new Filters\BlackWhiteFilter());
			break;
		case 'boost': {
			$type = 'gif';
			$image->filter(new Filters\boostFilter());
			break;
		}
		case 'dreamy': {
			$type = 'png';
			$image->filter(new Filters\DreamyFilter());
			break;
		}
		case 'sepia': {
			$type = 'png';
			$image->filter(new Filters\SepiaFilter());
			break;
		}
		case 'syncity': {
			$type = 'jpg';
			$image->filter(new Filters\SynCityFilter());
			break;
		}
	}
	echo 'data:image/' . $type . ';base64,' . base64_encode($image->response($type, 100)) . "==";
}