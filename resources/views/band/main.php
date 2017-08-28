<main>
	<header class="node">
		<div class="image s64"><i class="fa fa-users"></i></div>
		<div class="wrapper">
			<h1>Bands</h1>
			<p>Bands management</p>
		</div>
	</header>
	{{@band/snippets/tabs.main}}
	<section>
		<h2>Band list</h2>
		<p>List of different bands</p>
		<div class="btn-group">
			<div class="btn dropdown-toggle"><i class="fa fa-plus"></i> Create new
				<div class="dropdown-menu padded" style="min-width:400px;">
					{{@band/snippets/band.form.save}}
				</div>
			</div>
		</div>
		{{html.pager}}
		<ul class="table">
			<li class="header">
				<div>BandName</div>
				<div></div>
			</li>
			{{#bandOBs}}
			<li>
				<div><a href="{{url.band.profile}}">{{bandName}}</a></div>
				<div class="btn-group mini right">
					<div class="btn dropdown-toggle"><i class="fa fa-trash"></i>
						<div class="dropdown-menu padded">
							<h4><i class="fa fa-trash"></i> Remove band</h4>
							<p>The band will be removed from the system.</p>
							<form method="post">
								<input type="hidden" name="subcommand" value="band.remove">
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
			{{/bandOBs}}
		</ul>
	</section>
</main>
