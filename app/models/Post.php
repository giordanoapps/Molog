<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	protected $next = false;

	public $timestamps = true;

  public function user()
	{
		return $this->belongsTo('User');
	}

  public function collection()
	{
		return $this->belongsTo('Collection');
	}

	public function next()
	{
		if($this->next)
		{
			return $this->next;
		}

		$posts = Post::where('collection_id','=',$this->collection_id)->orderBy('id','DESC')->get();

		$found = false;
		$this->next = null;

		foreach($posts as $post)
		{
			if($found)
			{
				$this->next = $post;
				break;
			}
			if($post->id == $this->id)
			{
				$found = true;
			}
		}

		return $this->next;
	}

}