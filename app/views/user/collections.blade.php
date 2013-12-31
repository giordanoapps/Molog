@extends('layouts.default')

@section('content')
<header class="collection">
	<div class="title">
		<a class="light" href="{{ URL('@'.$user->username.'/profile') }}">
		{{ "@".$user->username }}
		</a>
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<h1>Collections</h1>
		@if($user->isHim)
		<div class="input">
			<a href="{{ URL('@'.$user->username.'/new-collection') }}">
				<button>New collection</button>
			</a>
		</div>
		@endif
		@if(count($user->collections) > 0)
			@foreach($user->collections as $collection)
			<a href="{{ URL('@'.$user->username.'/'.$collection->id) }}">
				<div class="collection">
					<div class="title">{{ $collection->title }}</div>
					<div class="description">{{ $collection->description }}</div>
					<div class="data">
						<div class="posts">
							{{ count($collection->posts) }} posts
						</div>
					</div>
				</div>
			</a>
			@endforeach
		@else
			@if($user->isHim)
			<p>You don't have a collection.</p>
			@else
			<p>This user doesn't have any collection.</p>
			@endif
		@endif
	</article>
</section>
@stop