<?php

class AuthController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Auth Controller
	|--------------------------------------------------------------------------
	|
	| Here we will do all steps to authenticate to Twitter oAuth.
	|
	*/

 /**
	* twitterRedirect()
	*
	*	Here we will redirect the user for twitter authentication.
	*/
	public function twitterRedirect()
	{
		// Reqest tokens
		$tokens = Twitter::oAuthRequestToken();

		// Redirect to twitter
		Twitter::oAuthAuthenticate(array_get($tokens, 'oauth_token'));
		exit;
	}

 /**
	* twitterCallback()
	*
	*	Here we will receive the twitter callback for oAuth.
	*/
	public function twitterCallback()
	{
		// Oauth token
		$token = Input::get('oauth_token');

		// Verifier token
		$verifier = Input::get('oauth_verifier');

		// Request access token
		$accessToken = Twitter::oAuthAccessToken($token, $verifier);

		$twitter = TwitterModel::where('user_id','=',$accessToken["user_id"])->first();

		if(!$twitter)
		{
			$twitter = new TwitterModel;

			$twitter->oauth_token = $accessToken["oauth_token"];
			$twitter->oauth_token_secret = $accessToken["oauth_token_secret"];
			$twitter->user_id = $accessToken["user_id"];
			$twitter->screen_name = $accessToken["screen_name"];

			$twitter->save();

			$user = new User;

			$user->twitter_id = $twitter->id;
			$user->username = $twitter->screen_name;

			$twitter_data = Twitter::usersShow($twitter->user_id, $twitter->screen_name);
			$picture = explode('_normal',$twitter_data->profile_image_url);

			$user->picture = $picture[0].$picture[1];
			$user->name = $twitter_data->name;

			$user->save();
		}
		else
		{
			$twitter->oauth_token = $accessToken["oauth_token"];
			$twitter->oauth_token_secret = $accessToken["oauth_token_secret"];
			$twitter->user_id = $accessToken["user_id"];
			$twitter->screen_name = $accessToken["screen_name"];

			$twitter->save();

			$user = $twitter->user;
		}

		Session::put('user', $user->id);

		return Redirect::to('/');
	}

}