<?php

require("../includes/constants.php");
require("../includes/config.php");

// check if GET parameter exists
if (isset($_GET["id"])) {

	// validate parameter
	if (!is_numeric($_GET["id"])) {
		render("error.php", array("error" => "The Area ID is invalid or inconsistent."));
	}

	// declaration
	$areaID = htmlspecialchars($_GET["id"]);

	// get data from database
	$data = query("SELECT `content`, `time` FROM `data` WHERE `area_id` = ? ORDER BY `id` DESC;", $areaID);
	
	// get area name from database
	$areaName = query("SELECT `name` FROM `areas` WHERE `id` = ?;", $areaID);
	$areaName = $areaName[0]["name"];

	// check for data output
	if ($data === false) {
		render("error.php", array("error" => "Could not get data. Check the district ID."));
		exit;
	}

	// display data
	render("area.php", array("instructions_list" => $instructions_list, "data" => $data, "id" => $_GET["id"], "areaName" => $areaName));
	exit;
}
// redirect to homepage otherwise
else {
	header("Location: index.php");
}

?>