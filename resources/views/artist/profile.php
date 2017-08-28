<main>
	{{@artist/snippets/header.artist}}
	<section>
		<h2>Artist information</h2>
		<p>Artist information</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-pencil"></i> Edit
				<div class="dropdown-menu padded" style="min-width:400px;">
					{{@artist/snippets/artist.form.save}}
				</div>
			</div>
		</div>
		<ul class="table radio">
			<li class="header">
				<div></div>
				<div></div>
			</li>
			<li>
				<div>Name</div>
				<div>{{artistOB_artistName}}</div>
			</li>
			<li>
				<div>Instrument</div>
				<div>{{artistOB_artistInstrument}}</div>
			</li>
			<li>
				<div>Description</div>
				<div>{{artistOB_artistDescription}}</div>
			</li>
			<li>
				<div>Tags</div>
				<div>{{artistOB_artistTags}}</div>
			</li>
		</ul>
	</section>
</main>
