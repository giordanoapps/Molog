@extends('layouts.default')

@section('content')
<header class="collection">
	<div class="title">
		{{ $collection->title }} / New post
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article id="write-post">
		<form action="{{ URL('@'.$user->username.'/'.$collection->id.'/new-post') }}" method="POST">
			<div class="input">
				<input type="text" name="title" placeholder="Post title"/>
			</div>
			<div class="input">
				<div class="post-left">
					<h3>Write your post here</h3>
					<textarea id="post-area"></textarea>
				</div>
				<div class="post-right">
					<h3>Preview</h3>
					<div id="post-preview" class="postContent"></div>
					<textarea name="text" class="hidden"></textarea>
				</div>
			</div>
			<div class="input">
				<button type="submit">I'm done!</button>
			</div>
		</form>
	</article>
</section>
@stop