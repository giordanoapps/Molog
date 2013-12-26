<?php

class Setting extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';

	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('User');
	}
}