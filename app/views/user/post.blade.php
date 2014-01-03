@extends('layouts.default')

@section('content')

<div class="bt-settings-trigger">
	<a href="#">
		Aa
	</a>
</div>
<div class="settings-menu">
	<div class="settings-content">
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
	</div>
</div>
<header>
	<div class="title">
		<div class="collection-title">
			<a class="light" href="{{ URL('@'.$post->user->username.'/profile') }}">
				{{ '@'.$post->user->username }}
			</a> / 
			<a class="light" href="{{ URL('@'.$post->user->username.'/'.$post->collection_id) }}">
				{{ $post->collection->title }}
			</a>
		</div>
		{{ $post->title }}
	</div>
	<div class="white left"></div>
	<div class="white right"></div>
</header>
<div class="progress opaque"></div>
<section>
	<article class="postContent">
		{{ $post->content }}
	</article>
</section>
@if($post->next() != null)
<a class="for-footer" href="{{ URL('@'.$user->username.'/'.$post->collection_id.'/'.$post->next()->id) }}">
	<footer>
		<div class="next">
			Next history
		</div>
		<div class="title">
			{{ $post->next()->title }}
		</div>
	</footer>
</a>
@else
<a class="for-footer" href="{{ URL('@'.$user->username.'/'.$post->collection_id) }}">
	<footer>
		<div class="see-collection">
			See hole collection
		</div>
	</footer>
</a>
@endif
@stop