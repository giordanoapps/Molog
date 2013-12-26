<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	public $timestamps = true;

  public function user()
	{
		return $this->belongsTo('User');
	}

  public function collection()
	{
		return $this->belongsTo('Collection');
	}
}