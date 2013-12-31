@extends('layouts.default')

@section('content')
<header class="collection">
	<div class="title">
		<a class="light" href="{{ URL('@'.$user->username) }}">
		{{ "@".$user->username }}
		</a> / {{ $collection->title }}
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<h1>Posts</h1>
		@if($user->isHim)
		<div class="input">
			<a href="{{ URL('@'.$user->username.'/'.$collection->id.'/new-post') }}">
				<button>New post</button>
			</a>
		</div>
		@endif
		@if(count($collection->posts) > 0)
			@foreach($collection->posts as $post)
			<a href="{{ URL('@'.$user->username.'/'.$collection->id.'/'.$post->id) }}">
				<div class="collection">
					<div class="title">{{ $post->title }}</div>
					<div class="data">
						<div class="posts">
							5 min read
						</div>
					</div>
				</div>
			</a>
			@endforeach
		@else
			@if($user->isHim)
			<p>You don't have a post.</p>
			<a href="{{ URL('@'.$user->username.'/'.$collection->id.'/new-post') }}">Click here to create a new post.</a>
			@else
			<p>This collection doesn't have any posts.</p>
			@endif
		@endif
	</article>
</section>
@stop