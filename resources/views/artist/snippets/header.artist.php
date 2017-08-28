	<header class="node">
		<div class="image s64"><img src="{{artistOB_src.artist.64}}"></div>
		<div class="wrapper">
			<h1>{{artistOB_artistName}}</h1>
			<p>Artist profile</p>
		</div>
	</header>
	<ul class="tabs">
		<li class="tab {{#tab.profile}}active{{/tab.profile}}"><a href="{{artistOB_url.artist.profile}}"><i class="fa fa-fire" aria-hidden="true"></i> Profile</a></li>
		<li class="tab {{#tab.bands}}active{{/tab.bands}}"><a href="{{artistOB_url.artist.bands}}"><i class="fa fa-users" aria-hidden="true"></i> Bands</a></li>
	</ul>
