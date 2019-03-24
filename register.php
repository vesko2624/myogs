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
			<form class="form" action="includes/signup.inc.php" method="POST">
				<header>
					<img src="PNG/logo.png">
					<h1>Register</h1>
				</header>
				<div class="group">
					<div class="field-group">
						<input name="private_name" type="text" id="private_name" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="private_name">Privаte Name</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="first_name" type="text" id="first_name" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="first_name">First Name</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="last_name" type="text" id="last_username" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="last_username">Last Name</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="email" type="email" id="e-mail" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="e-mail">E-mail</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="pwd" type="password" id="password" required autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="password">Password</label>
					</div>
				</div>
				<div class="group">
					<div class="field-group">
						<input name="confirm_pwd" type="password" id="confirm" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" required>
						<label for="confirm">Confirm Password</label>
					</div>
				</div>
				<footer>
					<input class="btn" type="submit" name="signup-submit" value="Register">
					<input class="btn" type="button" onclick="window.location.href='index.php';" value="Login">
				</footer>
			</form>
		</div>
		<script src="js/moyg.js"></script>
	</body>
</html>