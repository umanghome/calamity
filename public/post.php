<?php

require("../includes/config.php");

// check if it is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// validate inputs
	if (!isset($_POST["area_id"]) || !isset($_POST["post_content"])) {
		render("error.php", array("error" => "All values should be submitted."));
	}
	if (empty($_POST["area_id"]) || empty($_POST["post_content"])) {
		render("error.php", array("error" => "All values should be entered."));
	}

	// declare variables
	$areaID = htmlspecialchars($_POST["area_id"]);
	$content = htmlspecialchars($_POST["post_content"]);

	// validate length of content
	if (strlen($content) > 500) {
		render("error.php", array("error" => "The length of content cannot be greater than 500 characters."));
	}

	// insert data into database
	$update = query("INSERT INTO `data` (`area_id`, `content`, `time`) VALUES(?, ?, ?);", $areaID, $content, date("Y-m-d H:i:s"));
	// check for update consistency
	if ($update === false) {
		render("error.php", array("error" => "Could not insert data."));
	}

	// redirect to area page
	$location = "area.php?id=" . $_POST["area_id"];
	header('Location: ' . $location);
}
// redirect to home otherwise
else {
	header("Location: index.php");
}

?>