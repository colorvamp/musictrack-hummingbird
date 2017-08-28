<main>
	{{@album/snippets/header.album}}
	<section>
		<h2>Album members</h2>
		<p>Album members</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-plus"></i> Add
				<div class="dropdown-menu padded" style="min-width:400px;">
					<form method="post">
						<input type="hidden" name="subcommand" value="album.member.add">
						<input type="hidden" name="_id" value="{{albumOB__id}}">
						<h4><i class="fa fa-plus" aria-hidden="true"></i> Add member</h4>
						<p>Add member to this band</p>
						<select name="_artist">
							{{#select_artistOBs}}
							<option value="{{_id}}">{{artistName}} ({{artistInstrument}})</option>
							{{/select_artistOBs}}
						</select>
						<div class="btn-group right">
							<div class="btn btn-close"><i class="fa fa-close"></i> Close</div>
							<button class="btn main"><i class="fa fa-save"></i> Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<ul class="table">
			<li class="header">
				<div></div>
				<div></div>
				<div></div>
			</li>
			{{#artistOBs}}
			<li>
				<div>{{artistName}}</div>
				<div>{{artistInstrument}}</div>
				<div class="btn-group mini right">
					<div class="btn dropdown-toggle"><i class="fa fa-trash"></i>
						<div class="dropdown-menu padded">
							<h4><i class="fa fa-trash"></i> Remove artist from this album</h4>
							<p>The artist will be removed from this album.</p>
							<form method="post">
								<input type="hidden" name="subcommand" value="album.member.remove">
								<input type="hidden" name="_id" value="{{albumOB__id}}">
								<input type="hidden" name="_artist" value="{{_id}}">
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
