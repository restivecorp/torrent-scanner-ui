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
					<div class="panel-heading">Edit Serie</div>
					<div class="panel-body">
						<?php
							$s = get_serie($_GET["id"]);


						?>
						<form method="post" action="php/web.php?type=updateserie" class="form-horizontal" onsubmit="return validate();">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id" value="<?php echo $s['id'] ?>" readonly required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Serie Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" value="<?php echo $s['name'] ?>" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Search Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="search" id="search" value="<?php echo $s['search'] ?>"required>
									<span class="help-block m-b-none">
										Type the URL of the serie to find torrents.
									</span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Last Episode</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="lastepisode" id="lastepisode" value="<?php echo $s['lastEpisode'] ?>" required>
									<span class="help-block m-b-none">
										Must be formatted as pattern [n]x[n][n] :: 1x01 or 2x30 or 1x19
									</span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Active</label>
								<div class="col-sm-10">
									<div class="checkbox checkbox-success">
										<input id="active" type="checkbox" id="active" <?php if($s['active']) echo "checked"; ?> name="active">
										<label for="active">
											Active to scan?
										</label>
									</div>
								</div>
							</div>

							<div class="hr-dashed"></div>

							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn btn-primary" type="submit">Update</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php require_once('partials/footer.php'); ?>

</body>

</html>
