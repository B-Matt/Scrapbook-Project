<?php
require("../../vendor/autoload.php");

use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters;
	
if(isset($_POST['filter']) && isset($_POST['path'])) {
	$image 	= Image::make($_POST['path']);
	$image->fit(292);
	
	switch($_POST['filter']) {
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
			$image->filter(new Filters\VelvetFilter());
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
	echo $image->encode('data-url');
}