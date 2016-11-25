<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/** INDEX CONTROLERS **/
Route::get('/'							, 'IndexController@index');
Route::get('/user/{name}'				, 'IndexController@user');
Route::get('/explore'					, 'IndexController@explore');

/** USER CONTROLERS (form) **/
Route::get('/login'						, 'FormController@login');
Route::post('/login'					, 'FormController@loginsubmit');
Route::get('/register'					, 'FormController@register');
Route::post('/register'					, 'FormController@registersubmit');
Route::get('/logout'					, 'FormController@logout');

/** IMAGE CONTROLERS **/
Route::get('/upload'					, 'ImageController@upload');
Route::post('/upload'					, 'ImageController@uploadsubmit');
Route::get('/image/{imageid}'			, 'ImageController@image')->where('imageid', '[0-9]+');
Route::post('/image/{imageid}'			, 'ImageController@commentsubmit')->where('imageid', '[0-9]+');
Route::get('/image/delete/{imageid}'	, 'ImageController@deleteimage');