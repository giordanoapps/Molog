@extends('layouts.default')

@section('content')
<header>
	<div class="title">
		{{ $post->title }}
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		{{ $post->content }}
	</article>
</section>
<footer>
</footer>
@stop