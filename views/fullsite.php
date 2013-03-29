<div class="row">
	<div class="hero-unit">
		<h2>Full site</h2>

		<form action="<?php echo createUrl('fullsite', 'submit'); ?>" method="post" class="form-inline">
			<input id="link" name="link" value="" type="text" />
			<button class="btn btn-primary">Send</button>

			<br /><br />
			<h4>Option(s)</h4>
			<fieldset>
				<label for="post-data">Use POST data :</label>
				<input type="checkbox" name="post-data" id="post-data" />
				<label for="tor">Use TOR network :</label>
				<input type="checkbox" name="tor" id="tor" />
				<label for="keep-connection">Use Keep-connection :</label>
				<input type="checkbox" id="keep-connection" name="keep-connection" />
				<br />
				<label for="output-format">Output format :</label>
				<select name="output-format" id="output-format">
					<option value="html">HTML</option>
					<option value="csv">CSV</option>
				</select>
			</fieldset>
		</form>
	</div>
</div>

<div class="row" id="results" style="display: none;">
	<div class="sqlmap-result">
		<span class="label"></span>
		<br /><br />
		<blockquote></blockquote>
	</div>
</div>