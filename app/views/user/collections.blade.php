@extends('layouts.default')

@section('content')
<header class="collection">
	<div class="title">
		{{ "@".$user->username }}
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<h1>Collections</h1>
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

			@if($user->isHim)
			<a href="{{ URL('@'.$user->username.'/new-collection') }}">Click here to create a collection.</a>
			@endif
		@else
			@if($user->isHim)
			<p>You don't have a collection.</p>
			<a href="{{ URL('@'.$user->username.'/new-collection') }}">Click here to create a collection.</a>
			@else
			<p>This user doesn't have any collection.</p>
			@endif
		@endif
	</article>
</section>
@stop