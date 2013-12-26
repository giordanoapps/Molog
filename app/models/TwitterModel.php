<?php

class TwitterModel extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'twitters';

	public $timestamps = true;

  public function user()
	{
		return $this->hasOne('User', 'twitter_id');
	}
}