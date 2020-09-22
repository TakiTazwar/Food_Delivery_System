<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'yes'){
			echo "Invalid Information";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../assets/js/login.js"></script>
 <link rel="stylesheet" type="text/css" href="../assets/css/deliCommon.css">
</head>
<body>

	<form action="../php/logCheck.php" method="post" onsubmit="return validateAll()" >
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
					<td><input type="submit" name="submit" value="LogIn"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>