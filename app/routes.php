<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@listPosts');
Route::get('sign-in', 'HomeController@index');

Route::get('@{username}', 'UserController@userCollections');

Route::get('@{username}/profile', 'UserController@getUserProfile');
Route::post('@{username}/profile', 'UserController@postUserProfile');

Route::get('@{username}/new-collection', 'UserController@getNewCollection');
Route::post('@{username}/new-collection', 'UserController@postNewCollection');

Route::get('@{username}/{collection}/new-post', 'UserController@getNewPost');
Route::post('@{username}/{collection}/new-post', 'UserController@postNewPost');

Route::get('@{username}/{collection}', 'UserController@userCollection');
Route::get('@{username}/{collection}/{post}', 'UserController@userPost');

Route::get('twitter-redirect', 'AuthController@twitterRedirect');
Route::get('twitter-auth', 'AuthController@twitterCallback');

Route::get('logout', function()
{
	Session::forget('user');

	return Redirect::to('/');
});