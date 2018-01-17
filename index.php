<!doctype html>
<html lang="en" class="no-js">

<?php require_once('partials/header.php'); ?>

<body>

	<?php require_once('partials/brand.php'); ?>

	<div class="ts-main-content">
		<?php require_once('partials/nav.php'); ?>

		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Scanner</h2>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">Run Crawler</div>
					<div class="panel-body">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingHelp">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseHelp" aria-expanded=	"true" ria-controls="collapseHelp">
											Help
										</a>
									</h4>

								</div>

								<div id="collapseHelp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingHelp">
									<div class="panel-body">
										<p>
											<strong>Search all episodes from a serie</strong><br />
											Lets you run the script to find the torrents of a serie.
										</p>

										<p>
											<strong>Search next episodes from a serie</strong><br />
											Lets you run the script to find the next episode from a serie.
										</p>

										<p>
											<strong>Search in batch</strong><br />
											Allows run the script for scann the next episode of active series from database.
										</p>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingMassive">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMassive" aria-expanded="false" aria-controls="collapseMassive">
										  Search all episodes from a serie
										</a>
									</h4>

								</div>

								<div id="collapseMassive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMassive">
									<div class="panel-body">
										<form method="post" action="php/web.php?type=all" class="form-horizontal">

											<div class="form-group">
												<label class="col-sm-2 control-label">URL</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" name="search" required>
													<span class="help-block m-b-none">
														Type the URL of the serie to find torrents.
													</span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Options</label>
												<div class="col-sm-10">
													<div class="checkbox checkbox-success">
														<input id="dwnall" type="checkbox" name="dwnall">
														<label for="dwnall">
															Download all results?
														</label>
													</div>
												</div>
											</div>

											<div class="hr-dashed"></div>

											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary" type="submit">Run the script</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingnext">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeries" aria-expanded="false" aria-controls="collapseSeries">
										  Search next episodes from a serie
										</a>
										</h4>
									</div>

									<div id="collapseSeries" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnext">
										<div class="panel-body">
											<form method="post" action="php/web.php?type=next" class="form-horizontal">

												<div class="form-group">
													<label class="col-sm-2 control-label">URL</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="search" required>
														<span class="help-block m-b-none">
															Type the URL of the serie to find torrents.
														</span>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Last episode</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="last" required>
														<span class="help-block m-b-none">
															Must be formatted as pattern [n]x[n][n] :: 1x01 or 2x30 or 11x19
														</span>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Options</label>
													<div class="col-sm-10">
														<div class="checkbox checkbox-success">
															<input id="continue" type="checkbox" name="continue">
															<label for="continue">
																Coninue next to next?
															</label>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label"></label>
													<div class="col-sm-10">
														<div class="checkbox checkbox-success">
															<input id="dwnnext" type="checkbox" name="dwnnext">
															<label for="dwnnext">
																Download all results?
															</label>
														</div>
													</div>
												</div>
												<div class="hr-dashed"></div>

												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-primary" type="submit">Run the script</button>
													</div>
												</div>

											</form>
										</div>
									</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingBatch">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSerie" aria-expanded="false" aria-controls="collapseSerie">
										  Series Scanner
										</a>
									</h4>

								</div>

								<div id="collapseSerie" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBatch">
									<div class="panel-body">
											<form method="post" action="php/web.php?type=batch" class="form-horizontal">

												<div class="form-group">
													<div class="col-sm-12">
														<button class="btn btn-primary" type="submit">Run the script</button>
													</div>
												</div>

											</form>
									</div>
								</div>
							</div>

						</div><!-- pannel group -->
					</div> <!-- pannel body-->
				</div> <!-- pannel -->


				<div class="panel panel-default">
					<div class="panel-heading">Scripts results</div>
					<div class="panel-body">
						<pre>
<?php
print_r($_SESSION["scann_result"]);
?>
						</pre>
					</div>
				</div>

			</div>
		</div>
	</div>


	<?php require_once('partials/footer.php'); ?>

</body>

</html>
