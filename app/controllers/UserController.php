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
			$user->logged = true;
			
			if($user->id == Session::get('user'))
			{
				$user->isHim = true;
			}
			else
			{
				$user->isHim = false;
			}
		}
		else
		{
			$user->logged = false;
		}
	}

	public function getUserProfile($username)
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

	public function postUserProfile($username)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			if(!$user->isHim)
			{
				return View::make('user.profile')
											->with('user', $user);
			}
			else
			{
				if($user->settings != null)
				{
					$setting = $user->settings;
				}
				else
				{
					$setting = new Setting;

					$setting->user_id = $user->id;
				}

				$setting->font_face = Input::get('font_face');
				$setting->font_size = Input::get('font_size');
				$setting->font_weight = Input::get('font_weight');
				$setting->text_align = Input::get('text_align');
				$setting->font_color = Input::get('font_color');

				$setting->save();

				return View::make('user.profile')
											->with('user', $user)
											->with('message', 'Reading settings updated!');
			}
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

	public function getNewPost($username,$collection_id)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			if(!$user->isHim)
			{
				return Redirect::to('/');
			}

			$collection = Collection::find($collection_id);

			if(!$collection)
			{
				return Redirect::to('/');
			}

			if($collection->user->id != $user->id)
			{
				return Redirect::to('/');
			}
			else
			{
					return View::make('user.new_post')
											->with('user', $user)
											->with('collection', $collection);
			}
		}
	}

	public function postNewPost($username,$collection_id)
	{
		$user = User::where('username','=',$username)->first();

		if(!$user)
		{
			return Redirect::to('/');
		}
		else
		{
			$this->detect($user);

			if(!$user->isHim)
			{
				return Redirect::to('/');
			}

			$collection = Collection::find($collection_id);

			if(!$collection)
			{
				return Redirect::to('/');
			}
			
			if($collection->user->id != $user->id)
			{
				return Redirect::to('/');
			}
			else
			{

				$validation = Validator::make(Input::all(), array(
					'title' => array('required'),
					'text' => array('required'),
				));

				if(!$validation->fails())
				{
					$post = new Post;

					$post->user_id = $user->id;
					$post->collection_id = $collection->id;
					$post->title = Input::get('title');
					$post->content = Input::get('text');

					$minutes = strlen(Input::get('text'));
					$minutes = $minutes/350;

					$post->minutes = (int) $minutes;

					$post->save();

					return Redirect::to('@'.$user->username.'/'.$collection->id.'/'.$post->id);
				}
				else
				{
					return View::make('user.new_post')
											->with('user', $user)
											->with('collection', $collection);
				}
			}
		}
	}

}
