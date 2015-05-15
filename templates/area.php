<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Updates On <?php echo CALAMITY; ?></title>
		<link rel="stylesheet" href="css/area.css">
	</head>
	<body>
		<div class="container center">
			<h1 class="center-text full-width head-large">
				<a href="index.php">Updates on <?php echo CALAMITY; ?></a>: <?php echo $areaName ?>
			</h1>
			<div id="input-div">
				<button id="toggle-button" class="full-width">Post an Update</button>

				<form action="post.php" method="post" name="update-form" id="update-form" class="hidden">
					<?php echo "<input type=\"text\" value=\"" . $id . "\" name=\"area_id\" id=\"area_id\" class=\"hidden\"/>"; ?>
					<div id="update-textarea" class="full-width center">
						<textarea name="post_content" id="post_content" cols="50" rows="10" class="center"></textarea>
					</div>
					<button id="post-button" class="pull-right">Post</button>
					<span id="char-count" class="text-black pull-right">500</span>
					<br>
					<br>
					<hr>
				</form>
			</div>
			<div id="data">
				
					<?php 
						if (empty($data)) {
							echo "<div id=\"no-updates\" class=\"center-text full-width\">No updates available yet.</div>";
						}
						foreach ($data as $data) {
							$datetime = date("d-m-Y H:i:s", strtotime($data["time"]));
							$datetime = explode(" ", $datetime);
							$date = $datetime[0];
							$time = $datetime[1];
							echo "<ul id=\"data-list\">";
							echo "<li class=\"data-item unstyled-list\"><div class=\"data-container\"><p class=\"data-content\">" . $data["content"] . "</p><p class=\"data-time\">Posted on " . $date . " at " . $time . "</p></div></li>";
							echo "</ul>";
						}
					?>
			</div>
			<hr>
			<div class="instructions">
				<ul id="instructions-list" class="center-text unstyled-list">
					<?php foreach ($instructions_list as $instruction) {
						echo "<li>" . $instruction ."</li>";
					} ?>
				</ul>
			</div>
		</div>

		<script type="text/javascript" src="js/area.js"></script>
	</body>
</html>