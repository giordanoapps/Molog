@extends('layouts.default')

@section('content')
<header class="list">
	<div class="title">
		Molog
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	@if(isset($message))
	<article>
		<div class="message">
			{{ $message }}
		</div>
	</article>
	@endif
	<article>
		<ul class="list">
			@foreach($posts as $post)
			<li>
				<div class="profile">
					<img src="{{ $post->user->picture }}"/>
					<div class="info">
						<h1>
							<a href="{{ URL('@'.$post->user->username.'/'.$post->collection->id.'/'.$post->id) }}">
								{{ $post->title }}
							</a>
						</h1>
						<p>
							<a href="{{ URL('@'.$post->user->username.'/profile') }}">
								{{ "@".$post->user->username }}
							</a> · 
							<a href="{{ URL('@'.$post->user->username.'/'.$post->collection->id) }}">
								{{ $post->collection->title }}
							</a> · {{ $post->minutes }} min read
						</p>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</article>
</section>
@stop