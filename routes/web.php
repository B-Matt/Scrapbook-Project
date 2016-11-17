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
Route::get('/'				, 'IndexController@index');
Route::get('/user/{name}'	, 'IndexController@user');

/** FORM CONTROLERS **/
Route::get('/login'			, 'FormController@login');
Route::post('/login'		, 'FormController@loginsubmit');
Route::get('/register'		, 'FormController@register');
Route::post('/register'		, 'FormController@registersubmit');

/** IMAGE CONTROLERS **/
Route::get('/upload'		, 'ImageController@upload');
Route::post('/upload'		, 'ImageController@uploadsubmit');