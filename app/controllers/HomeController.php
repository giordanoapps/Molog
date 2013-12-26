<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	*/

	public function index()
	{
		if(Session::has('user'))
		{
			return Redirect::to('/');
		}
		else
		{
			$user = null;

			return View::make('home.login')
										->with('user', $user);
		}
	}

	public function listPosts()
	{
		$posts = Post::take(10)->get();

		$user = null;

		if(Session::has('user'))
		{
			$user = User::find(Session::get('user'));
			
			$user->twitter_data = Twitter::usersShow($user->twitter->user_id, $user->username);
		}

		return View::make('home.list')
									->with('posts', $posts)
									->with('user', $user);
	}

}
