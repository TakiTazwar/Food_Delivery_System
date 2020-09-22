<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'yes'){
			echo "Invalid Information";
		}
	}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../assets/css/logIn.css">
	<script type="text/javascript" src="../assets/js/login.js"></script>
</head>
<body>
	<div class="container">
		<header>Login Form</header>


	<form action="../php/logCheck.php" method="post" onsubmit="return validateAll()" >
		<div class="input-field">
			<input type="text" name="username" id="username" onkeyup="validateUserName()">

			<label>Username</label>
		</div class="input-field">
		<input type="password" name="password" id="password" onkeyup="validatePassword()">
		<label>Password</label>
		<div>
			<div class="button">
				<div class="inner"></div>
				<button>SignIn</button>
			</div>
			
		</div>
	<fieldset>
			<legend>SignIn</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" id="username" onkeyup="validateUserName()"></td>
					<td id="usernamemsg"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password" onkeyup="validatePassword()"></td>
					<td id="passwordmsg"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</fieldset>

	</form>
</div>
</body>
</html>