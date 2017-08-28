<main>
	<header class="node">
		<div class="image s64"><i class="fa fa-users"></i></div>
		<div class="wrapper">
			<h1>Artists</h1>
			<p>Artists management</p>
		</div>
	</header>
	{{@artist/snippets/tabs.main}}
	<section>
		<h2>Artist list</h2>
		<p>List of different artists</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-plus"></i> Create new
				<div class="dropdown-menu padded" style="min-width:400px;">
					{{@artist/snippets/artist.form.save}}
				</div>
			</div>
		</div>
		{{html.pager}}
		<ul class="table">
			<li class="header">
				<div>ArtistsName</div>
				<div>ArtistsInstrument</div>
				<div></div>
			</li>
			{{#artistOBs}}
			<li>
				<div><a href="{{url.artist.profile}}">{{artistName}}</a></div>
				<div>{{artistInstrument}}</div>
				<div class="btn-group mini right">
					<div class="btn dropdown-toggle"><i class="fa fa-trash"></i>
						<div class="dropdown-menu padded">
							<h4><i class="fa fa-trash"></i> Remove artist</h4>
							<p>The artist will be removed from the system.</p>
							<form method="post">
								<input type="hidden" name="subcommand" value="artist.remove">
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
			{{/artistOBs}}
		</ul>
	</section>
</main>
