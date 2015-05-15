<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Updates on <?php echo CALAMITY; ?></title>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
		<div class="container center">
			<h1 class="center-text full-width head-large">
				<a href="index.php">Updates on <?php echo CALAMITY; ?></a>
			</h1>
			<hr>
			<div class="instructions">
				<ul id="instructions_list" class="center-text unstyled-list">
					<?php foreach ($instructions_list as $instruction) {
						echo "<li>" . $instruction ."</li>";
					} ?>
				</ul>
			</div>
			<hr>
			<div class="areas">
				<h3 class="center-text full-width head-medium">
					Select an area from the list given below:
				</h3>
				<ul id="area_list" class="center-text unstyled-list">
					<?php foreach ($areas as $area) {
						echo "<li class=\"area-name\"><a href=\"area.php?id=" . $area["id"] . "\">" . $area["name"] . "</a></li>";
					} ?>
				</ul>
			</div>
		</div>

		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>