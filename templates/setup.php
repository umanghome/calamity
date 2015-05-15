<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Setup Calamity</title>
		<link rel="stylesheet" href="css/setup.css">
		<style>
			
		</style>
	</head>
	<body>
		<div class="container center">
			<h1 class="center-text full-width head-large">
				Setup Calamity
			</h1>
			<hr>
			<ul>
				<li>This is the page to setup your Calamity.</li>
				<li>Enter the details as instructed.</li>
				<li>All fields are mandatory.</li>
			</ul>
			<hr>
			<form action="setup.php" name="setup-form" method="post">
				<table>
					<tr>
						<td>
							<label for="calamity_name">Calamity Name: </label>
						</td>
						<td>
							<input type="text" name="calamity_name" id="calamity_name" size="30"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="area_list">List of Areas: <p>Separate the name of each area with a comma. For example, two areas can be written as 'area1, area2'.</p></label>
						</td>
						<td>
							<textarea name="area_list" id="area_list" cols="40" rows="10"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label for="instructions_list">Instructions and Guidelines: <p>Separate the instructions by putting each instruction on a new line.</p></label>
						</td>
						<td>
							<!-- <textarea name="instructions_list" id="instructions_list" cols="40" rows="10">Please do not spam.
							Please do not post false updates.
							Stay safe.</textarea> -->
							<textarea name="instructions_list" id="instructions_list" cols="40" rows="10"><?php echo "Please do not spam.\nPlease do not post false updates.\nStay safe!"; ?></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" id="submit-button">Create!</button></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
	<script type="text/javascript" src="js/setup.js"></script>
</html>