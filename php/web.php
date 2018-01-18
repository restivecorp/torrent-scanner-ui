<?php
	require_once("config.php");

	if(!isset($_SESSION)) {
		session_start();
	}

  if(empty($_SESSION["scann_result"])) {
    $_SESSION["scann_result"] = "";
  }

	/*
		Parse paramenters
		------------------
	*/
	if (isset($_GET["type"]) && $_GET["type"] == "createserie") {
		create_serie();
	}

	if (isset($_GET["type"]) && $_GET["type"] == "updateserie") {
		update_serie();
	}

	if (isset($_GET["type"]) && $_GET["type"] == "deleteserie") {
		delete_serie($_GET["id"]);
	}

	if (isset($_GET["type"]) && $_GET["type"] == "all") {
		extract_all($_POST["search"], $_POST["dwnall"]);
	}

	if (isset($_GET["type"]) && $_GET["type"] == "next") {
		extract_next($_POST["search"], $_POST["last"], $_POST["continue"], $_POST["dwnnext"]);
	}

	if (isset($_GET["type"]) && $_GET["type"] == "batch") {
		extract_batch();
	}

	// create serie
	function create_serie() {
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		$lastEpisode = "'".$_POST["lastepisode"]."'";
		$today = date("d/m/Y H:i:s");

		$active = 0;
		if (isset($_POST["active"])) {
			$active = 1;
		}

		$query = "insert into serie (name, search, lastEpisode, active, updated) values(".$title.", ".$search.", ".$lastEpisode.", ".$active.", '".$today."');";

		$db = new SQLite3(get_db_path());
		$db->exec($query);

		$db->close();

		header("Location: ../series.php");
		die();
	}

	// update serie
	function update_serie() {
		$id = $_POST["id"];
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		$lastEpisode = "'".$_POST["lastepisode"]."'";

		$active = 0;
		if (isset($_POST["active"])) {
			$active = 1;
		}

		$today = date("d/m/Y H:i:s");
		$query = "update serie set name = ".$title.", search = ".$search.", lastEpisode = " .$lastEpisode.", active = ".$active.", updated = '".$today."' where id = ".$id;

		$db = new SQLite3(get_db_path());
		$db->exec($query);

		$db->close();

		header("Location: ../series.php");
		die();
	}

	// delete film
	function delete_serie($id) {
		$query = "delete from serie where id = ".$id;

		$db = new SQLite3(get_db_path());
		$db->exec($query);

		$db->close();

		header("Location: ../series.php");
		die();
	}

	// get serie
	function get_serie($id) {
		$query = "select * from serie where id = " . $id;

		$db = new SQLite3(get_db_path());
		$results = $db->query($query);

		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){
          array_push($data, $row);
        }

		$db->close();
		return $data[0];
	}


	// get all series from database
	function get_series() {
		$query = "select * from serie";

		$db = new SQLite3(get_db_path());
		$results = $db->query($query);

		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){
          array_push($data, $row);
        }

		$db->close();
		return $data;
	}

	// RUN SCRIPTS
	// ---------------------

	function extract_all($url, $d) {
		if (isset($d)) {
			$d = "-d";
		}
		$result = shell_exec(get_path_scanner() . " -all $url -l $d");
		return_data($result);
	}

	function extract_next($url, $episode, $c, $d) {
		if (isset($c)) {
			$c = "-c";
		}

		if (isset($d)) {
			$d = "-d";
		}
		$result = shell_exec(get_path_scanner() . " -next $url $episode -l $c $d");
		return_data($result);
	}

	function extract_batch() {
		$result = shell_exec(get_path_scanner() . " -batch");
		return_data($result);
	}

	function return_data($resutls) {
		$_SESSION["scann_result"] = "Last script runned (" . date("d-m-Y H:i:s", time()) ."): \n\n";
		$_SESSION["scann_result"] = $_SESSION["scann_result"] . $resutls;

		header("Location: ../index.php");
		die();
	}

?>
