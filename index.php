<?php
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['pName']))
		header("Location: MainMenu.php");
?>
<!DOCTYPE html>
<html id="animated_off">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="prefetch stylesheet" type="text/css" href="css/myog.css">
		<link rel="preload" href="PNG/background.png" as="image">
	</head>
	<body>
		<div class="wrapper">
			<header>
				<img src="PNG/logo.png">
				<h1>Login</h1>
			</header>
			<form class="form" action="includes/signin.inc.php" method="post">
				<div class="group">
					<div class="field-group">
						<input name="username" type="text" id="username" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="username">Username</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="password" type="password" id="password" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="password">Password</label>
					</div>
				</div>
				<footer>
					<input class="btn" type="button" onclick="window.location.href='register.php';" value="Register">
					<input name="signin-submit" class="btn" type="submit" value="Login">
				</footer>
			</form>
		<script src="js/moyg.js"></script>
		</div>
	</body>
</html>