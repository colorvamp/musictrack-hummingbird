	<header class="node">
		<div class="image s64"><img src="{{albumOB_src.album.64}}"></div>
		<div class="wrapper">
			<h1>{{albumOB_albumName}}</h1>
			<p>Album profile</p>
		</div>
	</header>
	<ul class="tabs">
		<li class="tab {{#tab.profile}}active{{/tab.profile}}"><a href="{{albumOB_url.album.profile}}"><i class="fa fa-fire" aria-hidden="true"></i> Profile</a></li>
		<li class="tab {{#tab.members}}active{{/tab.members}}"><a href="{{albumOB_url.album.members}}"><i class="fa fa-users" aria-hidden="true"></i> Members</a></li>
	</ul>
