@if($user != null)
<h1>Hello {{ $user->username }}!</h1>
<img src="{{ $user->twitter_data->profile_image_original_url }}"/>
<br/>
<a href="{{ URL('logout') }}">Logout</a>
@else
<h1>Please <a href="{{ URL('twitter-redirect') }}">log-in</a></h1>
@endif