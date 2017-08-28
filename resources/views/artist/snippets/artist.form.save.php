<form method="post">
	<input type="hidden" name="subcommand" value="artist.save">
	<input type="hidden" name="_id" value="{{artistOB__id}}">
	<ul class="tabs widget-tabs">
		<li class="tab">
			<div class="label">
				<span class="ellipsis"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
			</div>
			<div class="content">
				<h4><i class="fa fa-pencil" aria-hidden="true"></i> Edit</h4>
				<p>Edit artist basic params</p>
				<ul class="table radio">
					<li><div>Name</div><div><input type="text" name="artistName" placeholder="Artist name" value="{{artistOB_artistName}}"></div></li>
					<li><div>Instrument</div><div><input type="text" name="artistInstrument" placeholder="Artist instrument" value="{{artistOB_artistInstrument}}"></div></li>
					<li><div>Description</div><div><textarea name="artistDescription" placeholder="Artist description" style="min-height:200px;">{{artistOB_artistDescription}}</textarea></div></li>
				</ul>
			</div>
		</li>
		<li class="tab">
			<div class="label">
				<span class="ellipsis"><i class="fa fa-tags" aria-hidden="true"></i> Tags</span>
			</div>
			<div class="content">
				<h4><i class="fa fa-tags" aria-hidden="true"></i> Tags</h4>
				<p>Edit artist tags</p>
				<ul class="table">
					<li><div>Tags</div><div><textarea name="artistTags" placeholder="Artist tags" style="min-height:200px;">{{artistOB_artistTags}}</textarea></div></li>
				</ul>
			</div>
		</li>
	</ul>
	<div class="btn-group right">
		<div class="btn btn-close"><i class="fa fa-close"></i> Close</div>
		<button class="btn main"><i class="fa fa-save"></i> Save</button>
	</div>
</form>
