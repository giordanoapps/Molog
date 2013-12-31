<?php

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public $timestamps = true;

	public function twitter()
	{
		return $this->belongsTo('TwitterModel');
	}

	public function collections()
	{
		return $this->hasMany('Collection');
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function settings()
	{
		return $this->hasOne('Setting');
	}
}