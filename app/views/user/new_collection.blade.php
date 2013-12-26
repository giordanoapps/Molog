@extends('layouts.default')

@section('content')
<header class="collection">
	<div class="title">
		New collection
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<form action="{{ URL('@'.$user->username.'/new-collection') }}" method="POST">
			<p>Here we will create a new collection for you.</p>
			<div class="input">
				<label>What do you want to talk about?</label>
				<input type="text" name="title" placeholder="Collection title"/>
			</div>
			<div class="input">
				<label>Want to give some description about the collection?</label>
				<textarea name="description" placeholder="Collection description"></textarea>
			</div>
			<div class="input">
				<button type="submit">I'm done!</button>
			</div>
		</form>
	</article>
</section>
@stop