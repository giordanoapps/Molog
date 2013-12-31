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
	@if(isset($message))
	<article>
		<div class="message">
			{{ $message }}
		</div>
	</article>
	@endif
	<article id="profile">
		@if(count($user->settings) == 0)
		<div id="active-settings" class="warning">
			<p>It seems that you didn't setup your <b>reading settings</b> yet!</p>
			<a href="#">Click here to start</a>
		</div>
		@endif
		<div class="full-profile">
			<img src="{{ $user->picture }}"/>
			<h1>{{ $user->name }}</h1>
			<h3>
				<span>{{ '@'.$user->username }}</span>
				<span>
					<a class="dark" href="{{ URL('@'.$user->username) }}">
						{{ count($user->collections) }} collections
					</a>
				</span>
				<span>{{ count($user->posts) }} posts</span>
			</h3>
		</div>

		@if($user->isHim)
		<nav>
			<ul>
				<li id="active-settings">Reading settings</li>
			</ul>
		</nav>
		@endif
	</article>

	@if($user->isHim)
	<article id="settings">
		<div class="controls">
			<h1>Reading settings</h1>
			<form action="{{ URL('@'.$user->username.'/profile') }}" method="POST">
				<div class="input">
					<label>Font family</label>
					<select name="font_face">
					@if($user->settings != null)

						@if($user->settings->font_face == "Lora")
						<option value="Lora" selected>Lora</option>
						@else
						<option value="Lora">Lora</option>
						@endif

						@if($user->settings->font_face == "Merriweather")
						<option value="Merriweather" selected>Merriweather</option>
						@else
						<option value="Merriweather">Merriweather</option>
						@endif

						@if($user->settings->font_face == "PT Serif")
						<option value="PT Serif" selected>PT Serif</option>
						@else
						<option value="PT Serif">PT Serif</option>
						@endif

						@if($user->settings->font_face == "Open Sans")
						<option value="Open Sans" selected>Open Sans</option>
						@else
						<option value="Open Sans" >Open Sans</option>
						@endif
					@else
						<option value="Lora">Lora</option>
						<option value="Merriweather">Merriweather</option>
						<option value="PT Serif">PT Serif</option>
						<option value="Open Sans">Open Sans</option>
					@endif
					</select>
				</div>
				<div class="input">
					<label>Font weight</label>
					@if($user->settings != null)
						<input type="text" name="font_weight" data-slider="true" data-slider-highlight="true" data-slider-values="300,400,700,800" value="{{ $user->settings->font_weight }}">
					@else
						<input type="text" name="font_weight" data-slider="true" data-slider-highlight="true" data-slider-values="100,300,400,700,800" value="300">
					@endif
				</div>
				<div class="input">
					<label>Font color</label>
					@if($user->settings != null)
						<input type="text" name="font_color" data-slider="true" data-slider-highlight="true" data-slider-range="0,1" value="{{ $user->settings->font_color }}">
					@else
						<input type="text" name="font_color" data-slider="true" data-slider-highlight="true" data-slider-range="0,1" value="0.8">
					@endif
				</div>
				<div class="input">
					<label>Font size</label>
					@if($user->settings != null)
						<input type="text" name="font_size" data-slider="true" data-slider-highlight="true" data-slider-range="1,2.5" value="{{ $user->settings->font_size }}">
					@else
						<input type="text" name="font_size" data-slider="true" data-slider-highlight="true" data-slider-range="1,2.5" value="1.5">
					@endif
				</div>
				<div class="input">
					<label>Text align</label>
						<select name="text_align">
						@if($user->settings != null)
							@if($user->settings->text_align == "left")
								<option value="left" selected>Left</option>
							@else
								<option value="left">Left</option>
							@endif

							@if($user->settings->text_align == "center")
								<option value="center" selected>Center</option>
							@else
								<option value="center">Center</option>
							@endif

							@if($user->settings->text_align == "right")
								<option value="right" selected>Right</option>
							@else
								<option value="right">Right</option>
							@endif

							@if($user->settings->text_align == "justify")
								<option value="justify" selected>Justify</option>
							@else
								<option value="justify">Justify</option>
							@endif
						@else
							<option value="left">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
							<option value="justify" selected>Justify</option>
						@endif
						</select>
				</div>
				<div class="input">
					<button type="submit">That's fine!</button>
				</div>
			</form>
		</div>
		<div class="sample postContent">
			<h1>Sample text</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu neque sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget accumsan sapien. Quisque erat felis, volutpat sodales pellentesque non, blandit ut tellus. Nullam rhoncus facilisis risus, in gravida elit laoreet ut. Sed volutpat neque nibh, a interdum dolor bibendum ultricies. Nullam lobortis ornare elit ac sodales. Praesent consequat, augue sit amet scelerisque aliquet, velit odio sagittis augue, et sagittis lectus massa non sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam at nulla a lorem varius pellentesque. Fusce tempor, arcu sit amet condimentum laoreet, metus velit interdum nunc, in ultrices odio magna vitae augue. Donec pellentesque arcu eu tincidunt convallis. Quisque eget purus nec diam consectetur condimentum non eu ligula. Vestibulum bibendum neque quis congue pharetra.</p>

			<p>Quisque id accumsan odio. Ut tempus arcu nec ligula dignissim, sed mollis turpis bibendum. Nullam tincidunt sapien nisi, eget pharetra justo gravida at. Praesent in faucibus purus. Suspendisse id ante quis diam tempor vehicula. Donec eu tristique libero. Phasellus rutrum tempus neque, id hendrerit massa pharetra a. Fusce nec quam auctor lorem malesuada semper in non dolor. Nulla non enim eget nulla luctus fringilla. Nam tempor ligula at consequat vulputate. Nunc facilisis lectus vel tortor euismod sollicitudin. Morbi porttitor, odio quis adipiscing congue, erat purus elementum mi, sed dapibus nunc velit nec magna.</p>
		</div>
	</article>
	@endif
</section>
@stop