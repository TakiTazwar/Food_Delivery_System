<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script type="text/javascript" src="../assets/js/registration.js"></script>
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
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>