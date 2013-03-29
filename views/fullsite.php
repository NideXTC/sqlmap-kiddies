<div class="row">
	<div class="hero-unit">
		<form action="<?php echo createUrl('fullsite', 'submit'); ?>" method="post" class="form-inline">
			<div class="row">
				<h4>Enter a link</h4>

				<input id="link" name="link" value="" type="text" />
				<button class="btn btn-primary">sitemap me !</button>
				<div id="ajax-loader" style="display: none;"></div>
			</div>
		</form>

		<form id="sqlmap-options" class="form-inline">
			<div class="row">
				<h4>Request</h4>

				<label class="checkbox span2" for="post-data">
					<input type="checkbox" name="post-data" id="post-data" />POST data
				</label>
			</div>

			<div class="row">
				<h4>Optimization</h4>

				<label class="checkbox span2" for="keep-alive">
					<input type="checkbox" id="keep-alive" name="keep-alive" />Keep Alive
				</label>
				<label class="checkbox span2" for="null-connection">
					<input type="checkbox" id="null-connection" name="null-connection" />Null Connection
				</label>
			</div>

			<div class="row">
				<h4>Injection</h4>

				<label class="checkbox span2" for="no-cast">
					<input type="checkbox" id="no-cast" name="no-cast" />No cast
				</label>

				<label class="checkbox span2" for="no-escape">
					<input type="checkbox" id="no-escape" name="no-escape" />No escape
				</label>
			</div>

			<div class="row">
				<h4>Detection</h4>

				<label class="select span2" for="level">
					<select name="level" id="level" class="input-mini">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					Level
				</label>

				<label class="select span2" for="risk">
					<select name="risk" id="risk" class="input-mini">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
					Risk
				</label>
			</div>

			<div class="row">
				<h4>Others</h4>

				<label class="checkbox span2" for="tor">
					<input type="checkbox" name="tor" id="tor" />TOR network
				</label>

				<label class="checkbox span2" for="purge-output">
					<input type="checkbox" id="purge-output" name="purge-output" />Purge output
				</label>

				<label class="select span2" for="output-format">
					<select name="output-format" id="output-format" class="input-small">
						<option value="HTML">HTML</option>
						<option value="CSV">CSV</option>
					</select>
					Output
				</label>
			</div>

		</form>
	</div>
</div>

<div class="row" id="results" style="display: none;">

</div>

<script src="./resources/js/fullsite.js"></script>