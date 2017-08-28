<main>
	{{@artist/snippets/header.artist}}
	<section>
		<h2>Artist bands</h2>
		<p>Artist bands</p>
		<ul class="table radio">
			<li class="header">
				<div></div>
				<div></div>
			</li>
			{{#bandsOBs}}
			<li>
				<div>{{bandName}}</div>
			</li>
			{{/bandsOBs}}
		</ul>
	</section>
</main>
