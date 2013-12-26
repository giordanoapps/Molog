@extends('layouts.default')

@section('content')
<header class="profile">
	<div class="title">
		Profile
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<div class="full-profile">
			<h1>{{ "@".$user->username }}</h1>
			<img src="{{ $user->picture }}"/>
		</div>
	</article>
</section>
@stop