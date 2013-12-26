@extends('layouts.default')

@section('content')
<header class="sign-in">
	<div class="title">
		Sign In
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<section>
	<article>
		<div class="sign-in">
			<ul>
				<li>
					<a href="{{ URL('twitter-redirect') }}" class="bt-icon icon-twitter twitter">
						Sign in using twitter account
					</a>
				</li>
				<li>
					<a href="#" class="bt-icon icon-gplus gplus">
						Sign in using google+ account
					</a>
				</li>
			</ul>
		</div>
	</article>
</section>
@stop