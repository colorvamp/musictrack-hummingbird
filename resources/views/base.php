<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="{{w.indexURL}}/r/images/favicon.png" type="image/png"/>
	<title>{{PAGE.TITLE}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{META.DESCRIPTION}}"/>
	{{META.OG.IMAGE}}
	<link href="{{w.indexURL}}/r/css/index.css" rel="stylesheet"/>
	<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
	<script type="text/javascript" src="{{w.indexURL}}/r/js/coreJS.402.js"></script>
	<script type="text/javascript" src="{{w.indexURL}}/r/js/dropdown.js"></script>
	<script type="text/javascript" src="{{w.indexURL}}/r/js/widgets/widget.tabs.js"></script>
	{{#JS.WIDGETS}}
	<script type="text/javascript" src="{{w.indexURL}}/r/js/widgets/widget.list.js"></script>
	<script type="text/javascript" src="{{w.indexURL}}/r/js/widgets/widget.scroll.js"></script>
	{{/JS.WIDGETS}}
</head>
<body>
	<header>
		<div class="menu-button"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
		<h1>Music<span class="soft-orange">Track</span></h1>
		<nav>
			<a href="{{w.assisURL}}/band" {{#display.aband}}class="active"{{/display.aband}}><i class="fa fa-users" aria-hidden="true"></i>Bands</a>
			<a href="{{w.assisURL}}/artist" {{#display.aartists}}class="active"{{/display.aartists}}><i class="fa fa-globe" aria-hidden="true"></i>Artists</a>
			<a href="{{w.assisURL}}/album" {{#display.aalbum}}class="active"{{/display.aalbum}}><i class="fa fa-globe" aria-hidden="true"></i>Albums</a>
			<a href="{{w.assisURL}}/song" {{#display.asong}}class="active"{{/display.asong}}><i class="fa fa-picture-o" aria-hidden="true"></i>Song</a>
		</nav>
	</header>
	<main>
		<div class="menu-button"><i class="fa fa-bars" aria-hidden="true"></i></div>
		{{MAIN}}
	</main>
</body>
</html>
