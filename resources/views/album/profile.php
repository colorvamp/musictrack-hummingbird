<main>
	{{@album/snippets/header.album}}
	<section>
		<h2>Album information</h2>
		<p>Album information</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-pencil"></i> Edit
				<div class="dropdown-menu padded" style="min-width:400px;">
					{{@album/snippets/album.form.save}}
				</div>
			</div>
		</div>
		<ul class="table">
			<li class="header">
				<div></div>
				<div></div>
			</li>
			<li>
				<div>Name</div>
				<div>{{albumOB_albumName}}</div>
			</li>
			<li>
				<div>Publish Date</div>
				<div>{{albumOB_albumPublishDate}}</div>
			</li>
			<li>
				<div>Description</div>
				<div>{{albumOB_albumDescription}}</div>
			</li>
			<li>
				<div>Tags</div>
				<div>{{albumOB_albumTags}}</div>
			</li>
		</ul>
	</section>
</main>
