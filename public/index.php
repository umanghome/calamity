<?php

require("../includes/constants.php");
require("../includes/config.php");

// get data from database
$areas = query("SELECT * FROM `areas`;");

// check for ouput
if ($areas === false) {
	render("error.php", array("error" => "The database query failed."));
}

// display content
render("index.php", array("areas" => $areas, "instructions_list" => $instructions_list));

?>