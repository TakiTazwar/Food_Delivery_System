<?php
require_once('../service/userService.php');
require_once('../php/session.php');

$content=customerAllInfo();
$name = $content[0]['name'];
$password = $content[0]['password'];
$dob = $content[0]['dob'];
$email = $content[0]['email'];
$phone = $content[0]['phone'];
$nid = $content[0]['nid'];
$address = $content[0]['address'];
$area = $content[0]['area'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="../assets/css/deliCommon.css">
	<script type="text/javascript" src="../assets/js/deliProfileEdit.js"></script>
</head>
<body>

</body>
</html>
<form action="../php/deliProfileEdit.php" method="post" onsubmit="return validateAll()">
	<br/>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td>Name</td>
			<td>:</td>
			<td><input name="name" id="name" type="text" onkeyup="validateName()" value=<?php echo '"'.$name.'"'?>>
			</td>
			<td id="namemsg"></td>
		</tr>		
		<tr><td colspan="4"><hr/></td></tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>
				<input name="password" id="password" type="password"  onkeyup="validatePassword()" value=<?php echo '"'.$password.'"'?>>
				<abbr title="hint: sample@example.com"><b>i</b></abbr>
			</td>
			<td id="passwordmsg"></td>
		</tr>		
		<tr><td colspan="4"><hr/></td></tr>
		<tr>
			<td>DOB</td>
			<td>:</td>
			<td><input name="dob" id="date" type="date"value=<?php echo '"'.$dob.'"'?>></td>
			<td id="dobmsg"></td>
		</tr>	
		<tr><td colspan="4"><hr/></td></tr>
		<tr>
			<td>Phone</td>
			<td>:</td>
			<td><input name="phone" id="phone" type="text" onkeyup="validatePhone()"value=<?php echo '"'.$phone.'"'?>></td>
			<td id="phonemsg"></td>
		</tr>	
		<tr><td colspan="4"><hr/></td></tr>
		<tr>
			<td>NID</td>
			<td>:</td>
			<td><input name="nid" id="nid" type="text" onkeyup="validateNID()"value=<?php echo '"'.$nid.'"'?>></td>
			<td id="nidmsg"></td>
		</tr>	
		<tr><td colspan="4"><hr/></td></tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><input type="text" id="address" name="address" onkeyup="validateAddress()" value=<?php echo '"'.$address.'"'?> ></td>
			<td id="addressmsg"></td>
		</tr>
		<tr><td colspan="4"><hr/></td></tr>	
		<tr>
			<td>Area</td>
			<td>:</td>
			<td><input name="area" id="area"  type="text" onkeyup="validateArea()" value=<?php echo '"'.$area.'"'?>></td>
			<td id="areamsg"></td>
		</tr>
	</table>
	<hr/>
	<input type="submit" name="submit" value="Confirm edit" >
	<br>
	<a href="deliverymanMain.php">Go back</a>
</form>