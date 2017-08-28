<form method="post">
	<input type="hidden" name="subcommand" value="album.save">
	<input type="hidden" name="_id" value="{{albumOB__id}}">
	<ul class="tabs widget-tabs">
		<li class="tab">
			<div class="label">
				<span class="ellipsis"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
			</div>
			<div class="content">
				<h4><i class="fa fa-pencil" aria-hidden="true"></i> Edit</h4>
				<p>Edit album basic params</p>
				<ul class="table radio">
					<li><div>Name</div><div><input type="text" name="albumName" placeholder="Album name" value="{{albumOB_albumName}}"></div></li>
					<li><div>Published</div><div><input type="text" name="albumPublishDate" placeholder="Album name" value="{{albumOB_albumPublishDate}}"></div></li>
					<li><div>Description</div><div><textarea name="albumDescription" placeholder="Album description" style="min-height:200px;">{{albumOB_albumDescription}}</textarea></div></li>
				</ul>
			</div>
		</li>
		<li class="tab">
			<div class="label">
				<span class="ellipsis"><i class="fa fa-tags" aria-hidden="true"></i> Tags</span>
			</div>
			<div class="content">
				<h4><i class="fa fa-tags" aria-hidden="true"></i> Tags</h4>
				<p>Edit album tags</p>
				<ul class="table">
					<li><div>Tags</div><div><textarea name="albumTags" placeholder="Album tags" style="min-height:200px;">{{albumOB_albumTags}}</textarea></div></li>
				</ul>
			</div>
		</li>
	</ul>
	<div class="btn-group right">
		<div class="btn btn-close"><i class="fa fa-close"></i> Close</div>
		<button class="btn main"><i class="fa fa-save"></i> Save</button>
	</div>
</form>
