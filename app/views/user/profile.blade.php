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
	<article id="profile">
		@if(count($user->settings) == 0)
		<div id="active-settings" class="warning">
			<p>It seems that you didn't setup your <b>reading settings</b> yet!</p>
			<a href="#">Click here to start</a>
		</div>
		@endif
		<div class="full-profile">
			<h1>{{ "@".$user->username }}</h1>
			<img src="{{ $user->picture }}"/>
		</div>
	</article>
	<article id="settings">
		<div class="controls">
			<h1>Reading settings</h1>
			<div class="input">
				<label>Font family</label>
				<select name="font_face">
					<option value="open_sans">Open Sans</option>
					<option value="open_sans_condensed">Open Sans Condensed</option>
					<option value="lato">Lato</option>
				</select>
			</div>
			<div class="input">
				<label>Font weight</label>
				<input type="text" name="font_weight" data-slider="true" data-slider-highlight="true" data-slider-values="300,400,700,800">
			</div>
			<div class="input">
				<label>Font size</label>
				<input type="text" name="font_size" data-slider="true" data-slider-highlight="true" data-slider-range="1,2.5">
			</div>
			<div class="input">
				<label>Text align</label>
				<select name="text_align">
					<option value="left">Left</option>
					<option value="center">Center</option>
					<option value="right">Right</option>
					<option value="justify" selected>Justify</option>
				</select>
			</div>
		</div>
		<div class="sample">
			<h1>Sample text</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu neque sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget accumsan sapien. Quisque erat felis, volutpat sodales pellentesque non, blandit ut tellus. Nullam rhoncus facilisis risus, in gravida elit laoreet ut. Sed volutpat neque nibh, a interdum dolor bibendum ultricies. Nullam lobortis ornare elit ac sodales. Praesent consequat, augue sit amet scelerisque aliquet, velit odio sagittis augue, et sagittis lectus massa non sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam at nulla a lorem varius pellentesque. Fusce tempor, arcu sit amet condimentum laoreet, metus velit interdum nunc, in ultrices odio magna vitae augue. Donec pellentesque arcu eu tincidunt convallis. Quisque eget purus nec diam consectetur condimentum non eu ligula. Vestibulum bibendum neque quis congue pharetra.</p>

			<p>Quisque id accumsan odio. Ut tempus arcu nec ligula dignissim, sed mollis turpis bibendum. Nullam tincidunt sapien nisi, eget pharetra justo gravida at. Praesent in faucibus purus. Suspendisse id ante quis diam tempor vehicula. Donec eu tristique libero. Phasellus rutrum tempus neque, id hendrerit massa pharetra a. Fusce nec quam auctor lorem malesuada semper in non dolor. Nulla non enim eget nulla luctus fringilla. Nam tempor ligula at consequat vulputate. Nunc facilisis lectus vel tortor euismod sollicitudin. Morbi porttitor, odio quis adipiscing congue, erat purus elementum mi, sed dapibus nunc velit nec magna.</p>
		</div>
	</article>
</section>
@stop