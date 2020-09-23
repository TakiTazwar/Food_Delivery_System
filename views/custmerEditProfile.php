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
	<link rel="stylesheet" type="text/css" href="../assets/css/customerEdit.css">
	<title></title>
	<header>
        <div class="left_area" >
            <h3> LUNCH <span>BREAK</span> </h3>  
          </div>
        <nav>
            <ul class="nav-links">
            	<li><a href="customerHome.php"> Home </a></li>
            	<li><a href="customerSearchFood.php"> Search </a></li>
                <li><a href="customerOrderInfo.php"> Processing </a></li>
                <li><a href="customerRecieveOrder.php"> Payment </a></li>
                <li><a href="customerCompleteOrder.php">  History </a></li>
                <li><a href="customerShowReview.php"> Reviews </a></li>
                <li><a href="contactList.php"> Messages </a></li>
                <li><a href="custmerEditProfile.php"> Edit </a></li>
            </ul>
        </nav>
        <nav>
            <ul class="nav-links">
           
            <div class="right_area"> 
                <a href="../php/logout.php" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
	<script type="text/javascript" src="../assets/js/customerEdit.js"></script>
</head>
<body>

<br>
<br>
<br>
<font size="5px">
<form action="../php/customerEditProfile.php" method="post" onsubmit="return validateAll()">
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
	<input type="submit" name="submit" value="submit" >
	<br>
</form>
</font>
</body>
</html>