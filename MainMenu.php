<?php
	session_start();
	if(!isset($_SESSION['id'])) header("Location: index.php");
?>
<!DOCTYPE html>
<html id="animated_on">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="prefetch stylesheet" type="text/css" href="css/myog.css">
		<link rel="preload" href="PNG/background.png" as="image">
	</head>
	<body onload="BGA()">
		<div class="wrapper menu">
			<header>
				<img src="PNG/logo.png">
				<h1>Main Menu</h1>
				<?php
					if(isset($_SESSION['id']))
						echo "<p>You are logged in!</p>";
				?>
			</header>
			<button class="btn">Online</button>
			<button class="btn">Single Play</button>
			<button class="btn">Story Mod</button>
			<button class="btn">Deck Edit</button>
			<button class="btn">Creator</button>
			<button class="btn">Settings</button>
			<form action="includes/signout.inc.php" method="POST">
				<input class="btn" name="signout-submit" type="submit" action="index.html" value="Sign Out">
			</form>
		</div>
		<script src="js/moyg.js"></script>
	</body>
</html>