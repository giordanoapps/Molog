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
		$posts = Post::take(10)->orderBy('updated_at', 'DESC')->get();

		$user = null;

		if(Session::has('user'))
		{
			$user = User::find(Session::get('user'));
			
			$user->logged = true;

			try {
			
				$user->twitter_data = Twitter::usersShow($user->twitter->user_id, $user->username);
			
			} catch(Exception $e) {
				
				switch($e->getCode())
				{
					case 0:
						return View::make('home.list')
													->with('posts', $posts)
													->with('user', $user)
													->with('message','Couldn\'t make a connection.');
						break;
				}

			}
		}

		return View::make('home.list')
									->with('posts', $posts)
									->with('user', $user);
	}

}
