<div class="row">
	<div class="hero-unit">
		<form action="<?php echo createUrl('home', 'submit'); ?>" method="post" class="form-inline">
			<div class="row">
				<h4>Enter a link</h4>

				<input id="link" name="link" value="<?php echo $link; ?>" type="text" />
				<button class="btn btn-primary">sqlmap me !</button>
				<div id="ajax-loader" style="display: none;"></div>
			</div>

			<div id="sqlmap-options">
				<div class="row">
					<h4>Request</h4>

					<label class="checkbox span2" for="post-data">
						<input type="checkbox" name="post-data" id="post-data" />POST data
					</label>
				</div>

				<div class="row">
					<h4>Optimization</h4>

					<label class="checkbox span2" for="predictive-output">
						<input type="checkbox" id="predictive-output" name="predictive-output" />Predictive output
					</label>
					<label class="checkbox span2" for="keep-alive">
						<input type="checkbox" id="keep-alive" name="keep-alive" />Keep Alive
					</label>
					<label class="checkbox span2" for="null-connection">
						<input type="checkbox" id="null-connection" name="null-connection" />Null Connection
					</label>
				</div>

				<div class="row">
					<h4>Injection</h4>

					<label class="select span2" for="dbms">
						<select name="dbms" id="dbms" class="input-small">
							<option value="">All</option>
							<option value="MySQL">MySQL</option>
							<option value="Oracle">Oracle</option>
							<option value="PostgreSQL">PostgreSQL</option>
							<option value="Microsoft SQL Server">Microsoft SQL Server</option>
							<option value="Microsoft Access">Microsoft Access</option>
							<option value="SQLite">SQLite</option>
							<option value="Firebird">Firebird</option>
							<option value="Sybase">Sybase</option>
							<option value="SAP MaxDB">SAP MaxDB</option>
						</select>
						DBMS
					</label>
					<label class="checkbox span2" for="no-cast">
						<input type="checkbox" id="no-cast" name="no-cast" />No cast
					</label>
					<label class="checkbox span2" for="no-escape">
						<input type="checkbox" id="no-escape" name="no-escape" />No escape
					</label>
					<label class="checkbox span2" for="invalid-bignum">
						<input type="checkbox" id="invalid-bignum" name="invalid-bignum" />Invalid bignum
					</label>
					<label class="checkbox span2" for="invalid-logical">
						<input type="checkbox" id="invalid-logical" name="invalid-logical" />Invalid logical
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
			</div>
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

<script src="./resources/js/main.js"></script>