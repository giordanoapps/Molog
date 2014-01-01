<!DOCTYPE html>
<html>
	<head>
		<title>Molog</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="{{ asset('css/common.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/icons.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/menu.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/molog.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/molog-responsive.css') }}"/>
		@if($user != null)
			@if($user->logged)
				<script>
				var settings = {
					font_size : {{ $user->settings->font_size }},
					font_face : {{ $user->settings->font_face }},
					font_weight : {{ $user->settings->font_weight }},
					text_align : {{ $user->settings->text_align }},
					color : {{ $user->settings->font_color }}
				}
				</script>
				@if($user->settings != null)
				<style>
				.postContent p {
					font-size: {{ $user->settings->font_size }}em;
					font-family: '{{ $user->settings->font_face }}', 'Book Antiqua', Palatino, serif;
					font-weight: {{ $user->settings->font_weight }};
					text-align: {{ $user->settings->text_align }};
					color: rgba(0,0,0,{{ $user->settings->font_color }});
				}
				.postContent h1 {
					font-size: {{ 2*$user->settings->font_size }}em;
				}
				.postContent h2 {
					font-size: {{ 1.7*$user->settings->font_size }}em;
				}
				.postContent h3 {
					font-size: {{ 1.5*$user->settings->font_size }}em;
				}
				.postContent h4 {
					font-size: {{ 1.3*$user->settings->font_size }}em;
				}
				.postContent h5 {
					font-size: {{ 1.2*$user->settings->font_size }}em;
				}
				.postContent h6 {
					font-size: {{ 1.1*$user->settings->font_size }}em;
				}
				.postContent h1,
				.postContent h2,
				.postContent h3,
				.postContent h4,
				.postContent h5,
				.postContent h6 {
					font-family: '{{ $user->settings->font_face }}', 'Book Antiqua', Palatino, serif;
					font-weight: bolder;
					text-align: {{ $user->settings->text_align }};
					color: rgba(0,0,0,{{ $user->settings->font_color }});
				}
				</style>
				@endif
			@else
			<script>
			var settings = {
				font_size : 1,
				font_face : 'Lora',
				font_weight : '300',
				text_align : 'justify',
				color : 'rgba(0,0,0,.8)'
			}
			</script>
			@endif
		@else	
		<script>
		var settings = {
			font_size : 1,
			font_face : 'Lora',
			font_weight : '300',
			text_align : 'justify',
			color : 'rgba(0,0,0,.8)'
		}
		</script>
		@endif
	</head>
	<body>
		<div id="topBar"></div>
		<nav id="bt-menu" class="bt-menu">
			<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
			<ul id="fst-menu" class="closed">
				@if($user != null)
					@if($user->logged)
						@section('left-menu')
							<li><a href="{{ URL('/') }}">Recent</a></li>
							<li><a href="{{ URL('@'.$user->username.'/profile') }}">My profile</a></li>
							<li><a href="{{ URL('@'.$user->username) }}">My collections</a></li>
							<li><a href="{{ URL('contact') }}">Contact</a></li>
							<li><a href="{{ URL('logout') }}">Sign out</a></li>
						@show
					@else
						@section('left-menu')
							<li><a href="{{ URL('/') }}">Recent</a></li>
							<li><a href="{{ URL('sign-in') }}">Sign in</a></li>
							<li><a href="{{ URL('contact') }}">Contact</a></li>
						@show
					@endif
				@else
					@section('left-menu')
						<li><a href="{{ URL('/') }}">Recent</a></li>
						<li><a href="{{ URL('sign-in') }}">Sign in</a></li>
						<li><a href="{{ URL('contact') }}">Contact</a></li>
					@show
				@endif
			</ul>
			<ul>
				<li><a target="_blank" href="https://twitter.com/molog_us" class="bt-icon icon-twitter">Twitter</a></li>
				<!--<li><a href="https://plus.google.com/101095823814290637419" class="bt-icon icon-gplus">Google+</a></li>-->
				<li><a target="_blank" href="https://www.facebook.com/molog.us" class="bt-icon icon-facebook">Facebook</a></li>
				<!--<li><a href="https://github.com/codrops" class="bt-icon icon-github">icon-github</a></li>-->
			</ul>
		</nav>
		@yield('content')
	</body>
	<script src="{{ asset('js/markdown.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery.cookie.js') }}"></script>
	<script src="{{ asset('js/simple-slider.min.js') }}"></script>
	<script src="{{ asset('js/classie.js') }}"></script>
	<script src="{{ asset('js/template.js') }}"></script>
	<script src="{{ asset('js/molog.js') }}"></script>
</html>