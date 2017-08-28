<main>
	<header class="node">
		<div class="image s64"><i class="fa fa-users"></i></div>
		<div class="wrapper">
			<h1>Albums</h1>
			<p>Albums management</p>
		</div>
	</header>
	{{@album/snippets/tabs.main}}
	<section>
		<h2>Album list</h2>
		<p>List of different albums</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-plus"></i> Create new
				<div class="dropdown-menu padded" style="min-width:400px;">
					{{@album/snippets/album.form.save}}
				</div>
			</div>
		</div>
		{{html.pager}}
		<ul class="table">
			<li class="header">
				<div>AlbumName</div>
				<div>Publish date</div>
				<div></div>
			</li>
			{{#albumOBs}}
			<li>
				<div><a href="{{url.album.profile}}">{{albumName}}</a></div>
				<div>{{albumPublishDate}}</div>
				<div class="btn-group mini right">
					<div class="btn dropdown-toggle"><i class="fa fa-trash"></i>
						<div class="dropdown-menu padded">
							<h4><i class="fa fa-trash"></i> Remove album</h4>
							<p>The album will be removed from the system.</p>
							<form method="post">
								<input type="hidden" name="subcommand" value="album.remove">
								<input type="hidden" name="_id" value="{{_id}}">
								<div class="btn-group right">
									<div class="btn btn-close">Close</div>
									<button class="btn"><i class="fa fa-trash"></i> Remove</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</li>
			{{/albumOBs}}
		</ul>
	</section>
</main>
