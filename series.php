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
						<h2 class="page-title">Series</h2>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">List of Series</div>
					<div class="panel-body">
						<p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								Create new Serie to scan
							</button>
						</p>
						<div class="table-responsive">
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Last Episode</th>
										<th>Active</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$series = get_series();

										foreach ($series as $s){

											if ($s['active'] == 0) {
												echo "<tr class=\"danger\">";
											} else {
												echo "<tr class=\"success\">";
											}

												echo "<td>". $s['name'] ." <a href=\"" . $s['search'] ."\" target=\"_blank\" ><i class=\"fa fa-external-link\" aria-hidden=\"true\" title=\"Go to torrent Web\"></i></a></td>";
												echo "<td>". $s['lastEpisode'] ."</td>";

												if ($s['active'] == 1) {
													echo "<td>Yes</td>";
												} else {
													echo "<td>No</td>";
												}

												echo "<td>";
													echo "<a href=\"editserie.php?id=".$s['id']."\">Edit</a>";
													echo " | ";
													echo "<a href=\"php/web.php?type=deleteserie&id=".$s['id']."\" onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>";
												echo "</td>";

											echo "</tr>";
										}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Create Serie</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="php/web.php?type=createserie" class="form-horizontal" onsubmit="return validate();">

						<div class="form-group">
							<label class="col-sm-2 control-label">Serie Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" id="title" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Search</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="search" id="search" required>
								<span class="help-block m-b-none">
									Type the URL of the serie to find torrents.
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Last Episode</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="lastepisode" id="lastepisode" required>
								<span class="help-block m-b-none">
									Must be formatted as pattern [n]x[n][n] :: 1x01 or 2x30 or 11x19
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Active</label>
							<div class="col-sm-10">
								<div class="checkbox checkbox-success">
									<input id="active" type="checkbox" name="active" id="active">
									<label for="active">
										Active to scan?
									</label>
								</div>
							</div>
						</div>

						<div class="hr-dashed"></div>

						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn btn-primary" type="submit">Create</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once('partials/footer.php'); ?>

</body>

</html>
