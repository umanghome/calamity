<?php

require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// validate all fields
	if ( !isset($_POST["calamity_name"]) || !isset($_POST["area_list"]) ) {
		echo "<h1>All fields should be filled!</h1>";
	}
	else if ( empty($_POST["calamity_name"]) || empty($_POST["area_list"]))
	{
		echo "<h1>All fields should be filled!</h1>";
	}
	$calamity_name = htmlspecialchars(trim($_POST["calamity_name"]));
	$area_list = htmlspecialchars(trim($_POST["area_list"]));
	$instructions_list = htmlspecialchars(trim($_POST["instructions_list"]));

	// populate areas array
	$area_list = explode(",", $area_list);
	foreach ($area_list as $area) {
		$area = trim($area);
		$area = ucfirst($area);
	}

	// populate instructions array
	$instructions_list = explode("\n", $instructions_list);
	foreach ($instructions_list as $instruction) {
		$instruction = trim($instruction);
		$instruction = trim($instruction, "\n");
		$instruction = ucfirst($instruction);
	}
	
	// write the constant(s) to a file
	$instructions_count = count($instructions_list);
	$constants_file = fopen("../includes/constants.php", "w");
	$constant_file_content = "<?php\n\n// calamity name\ndefine(\"CALAMITY\", \"" . ucfirst(strtolower($calamity_name)) . "\");\n\n// the instructions array\n\$instructions_list = array(";
	for ($i = 0; $i < $instructions_count; $i++) { 
		$constant_file_content = $constant_file_content . "\"". $instructions_list[$i] . "\"";
		if ($i != ($instructions_count - 1)) {
			$constant_file_content = $constant_file_content . ",";
		}
	}
	$constant_file_content = $constant_file_content . ");\n\n?>";

	fwrite($constants_file, $constant_file_content);
	fclose($constants_file);

	// create table(s)
	$create_table_areas = query("CREATE TABLE IF NOT EXISTS `areas` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT, `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL, PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;");
	if ($create_table_areas === false) {
		render("error.php", array("error" => "Failed to create the Areas table."));
	}
	$create_table_data = query("CREATE TABLE IF NOT EXISTS `data` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT, `area_id` int(10) unsigned NOT NULL, `content` varchar(550) COLLATE utf8_unicode_ci NOT NULL, `time` datetime NOT NULL, PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;");
	if ($create_table_data === false) {
		render("error.php", array("error" => "Failed to create the Data table."));
	}

	// populate area table
	foreach ($area_list as $area) {
		$insert_area = query("INSERT INTO `areas` (`name`) VALUES (?);", $area);
		if ($insert_area === false) {
			echo "<h1>Error inserting <strong>{$area}</strong> area!</h1>";
		}
	}

	// delete the setup files
	echo "<h1>Setup complete! You can now delete the setup files.</h1>";
}
else if (file_exists("../templates/setup.php"))
{
	render("setup.php");
}
else
{
	render("error.php");
}

?>