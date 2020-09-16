<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'validate'){
			echo "UserName or Email already exist";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<script type="text/javascript" src="../assets/js/registration.js"></script>
</head>
<body>

	<form action="../php/regCheck.php" method="post" onsubmit="return validateAll()">
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" id="username" name="username" onkeyup="validateUserName()"></td>
					<td id="usernamemsg"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" id="password" name="password" onkeyup="validatePassword()"></td>
					<td id="passwordmsg"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" id="confirmpassword" name="confirmpassword" onkeyup="validateConfirmPassword()"></td>
					<td id="confirmPasswordmsg"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" id="name" name="name" onkeyup="validateName()"></td>
					<td id="namemsg"></td>
				</tr>
				<tr>
					<td>Date Of Birth</td>
					<td><input type="Date" id="dob" name="dob" max="2019-12-31" onclick="removeDOB()"></td>
					<td id="dobmsg"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" id="email" name="email" onkeyup="validateEmail()"></td>
					<td id="emailmsg"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="number" id="phone" name="phone" onkeyup="validatePhone()"></td>
					<td id="phonemsg"></td>
				</tr>
				<tr>
					<td>NID/LICENCE</td>
					<td><input type="text" id="nid" name="nid" onkeyup="validateNID()"></td>
					<td id="nidmsg"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" id="address" name="address" onkeyup="validateAddress()"></td>
					<td id="addressmsg"></td>
				</tr>
				<tr>
					<td>Area</td>
					<td><input type="text" id="area" name="area" onkeyup="validateArea()"></td>
					<td id="areamsg"></td>
				</tr>
				<tr>
					<td>User Type</td>
					<td>
						<select id="type" name="usertype" onclick="validateType()">
							<option value="customer">Customer</option>
							<option value="deliveryman">Delivery Man</option>
							<option value="restaurant">Restaurant</option>
						</select>
					</td>
					<td id="typemsg"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Sign Up">
						<a href="login.php" style="display: none">Login</a></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>