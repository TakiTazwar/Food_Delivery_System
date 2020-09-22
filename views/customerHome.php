<?php
$username=$_COOKIE['uname'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Welcome <?php echo " ".$username?></h1>
	<a href="customerSearchFood.php"> Search Food </a><br><br>
	<a href="customerOrderInfo.php"> Order Processing </a><br><br>
	<a href="contactList.php">Recieved Messages</a><br><br>
	<a href="customerRecieveOrder.php"> Order Payment </a><br><br>
	<a href="customerCompleteOrder.php"> Order History </a><br><br>
	<a href="customerEditInformation.php"> Edit Profile </a><br><br>

</body>
</html>