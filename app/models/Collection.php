<?php

class Collection extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'collections';

	public $timestamps = false;

  public function user()
	{
		return $this->belongsTo('User');
	}

  public function posts()
	{
		return $this->hasMany('Post')->orderBy('updated_at','DESC');
	}

}