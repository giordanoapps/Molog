<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	*/

	protected function detect(&$user)
	{
		$user->isHim = false;

		if(Session::has('user'))
		{
			if($user->id == Session::get('user'))
			{
				$user->isHim = true;
			}
			else
			{
				$user->isHim = false;
			}
		}
	}

	public function userProfile($username)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			return View::make('user.profile')
										->with('user', $user);
		}
	}

	public function userCollections($username)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			return View::make('user.collections')
										->with('user', $user);
		}
	}

	public function userCollection($username, $collection_id)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			$collection = Collection::find($collection_id);

			if($collection->user->id != $user->id)
			{
				return Redirect::to('/');
			}

			return View::make('user.collection')
										->with('user', $user)
										->with('collection', $collection);
		}
	}

	public function userPost($username, $collection_id, $post_id)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			$collection = Collection::find($collection_id);

			if($collection->user->id != $user->id)
			{
				return Redirect::to('/');
			}
			else
			{
				$post = Post::find($post_id);

				if($post->collection->id != $collection->id)
				{
					return Redirect::to('/');
				}

				return View::make('user.post')
											->with('user', $user)
											->with('post', $post);
			}
		}
	}

	public function getNewCollection($username)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);
			
			if($user->isHim)
			{
				return View::make('user.new_collection')
											->with('user', $user);
			}
			else
			{
				return Redirect::to('/');
			}
		}
	}

	public function postNewCollection($username)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);
			
			if($user->isHim)
			{
				$validation = Validator::make(Input::all(), array(
					'title' => array('required')
				));

				if(!$validation->fails())
				{
					$collection = new Collection;

					$collection->user_id = $user->id;
					$collection->title = Input::get('title');
					$collection->description = Input::get('description');

					$collection->save();

					return View::make('user.collections')
											->with('user', $user);
				}

				return View::make('user.new_collection')
											->with('user', $user)
											->withErrors($validation);
			}
			else
			{
				return Redirect::to('/');
			}
		}
	}

}
