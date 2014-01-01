@extends('layouts.default')

@section('content')
<div class="settingsTrigger">
Aa
</div>
<header>
	<div class="title">
		<div class="collection-title">
			<a class="light" href="{{ URL('@'.$post->user->username.'/profile') }}">
				{{ '@'.$post->user->username }}
			</a> / 
			<a class="light" href="{{ URL('@'.$post->user->username.'/'.$post->collection_id) }}">
				{{ $post->collection->title }}
			</a>
		</div>
		{{ $post->title }}
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<div class="progress opaque"></div>
<section>
	<article class="postContent">
		{{ $post->content }}
	</article>
</section>
@if($post->next() != null)
<a class="for-footer" href="{{ URL('@'.$user->username.'/'.$post->collection_id.'/'.$post->next()->id) }}">
	<footer>
		<div class="next">
			Next history
		</div>
		<div class="title">
			{{ $post->next()->title }}
		</div>
	</footer>
</a>
@else
<a class="for-footer" href="{{ URL('@'.$user->username.'/'.$post->collection_id) }}">
	<footer>
		<div class="see-collection">
			See hole collection
		</div>
	</footer>
</a>
@endif
@stop