@extends('layouts.default')

@section('content')
<header class="contact">
	<div class="title">
		Contact us
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
		<h1>About the creator</h1>
		<div class="profile">
			<img src="{{ asset('img/creator.jpg') }}"/>
			<div class="info">
				<h3>Maurício Giordano</h3>
				<p>
					<a class="bt-icon icon-twitter" href="http://twitter.com/mauriciogior"> Twitter</a>
					 · 
					<a class="bt-icon icon-facebook" href="http://facebook.com/mauriciogior"> Facebook</a>
				</p>
			</div>
		</div>
		<p>Brazilian grown at Piracicaba - São Paulo, studies Computer Engineering at University of São Paulo. A newcomer to entrepreneurship world, he won several <em>Hackathons</em> and general computing marathons.</p>
		<h1>About Molog</h1>
		<p>Molog was made focused on simplicity and readability. We were inspired by <a target="_blank" href="http://medium.com/">Medium</a> blog system. Almost everything of simplicity were inspired on them and, looking on the reader satisfaction, we implemented a <em>reading setting</em> for each user.</p>
		<p>Molog is <b>open source</b> (under MIT license) and can be found at <a target="_blank" href="https://github.com/giordanoapps/Molog">github</a>.</p>
	</article>
</section>
<footer class="contact">
</footer>
@stop