<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Error: Calamity</title>
	</head>
	<body>
		<?php if (isset($error)) {
			echo "<h1>" . $error . "</h1>";
		}
		else {
			echo "<h1>An error occurred!</h1>";
		} ?>
	</body>
</html>