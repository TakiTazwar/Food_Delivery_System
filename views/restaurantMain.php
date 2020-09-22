
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
	<right>

	<legend><b>Food Delivery System</b></legend>

</right>
		<hr>
		<right>
			<hr>
		
			<a href="addpicture.php"><u>View Profile pic</u></a>
			<hr>

			<a href="../views/restaurantPendingOrder.php"><u>Pending Order</u></a>
	
		<hr>
		
			<a href="../views/restaurantOrderStatus.php"><u>Order status</u></a>
		

		<hr>
	
			<a href="../views/restaurantAddItem.php"><u>Add item</u></a>

	
		<hr>
		
			<a href="contact.html"><u>Contact</u></a>
		
		<hr>
	
			<a href="restaurantAddDiscount.php"><u>Add Discount</u></a>

			<hr>
	
			<a href="../views/restaurantSales.php"><u>Sales</u></a>

			<hr>
	
			<a href="salesreport.html"><u>Sales Report</u></a>

			<hr>
	
			<a href="deliver.html"><u>Request Deliver</u></a>

	
		
		<hr>
	
			<a href="reviews.html"><u>Reviews</u></a>

			<hr>

			<a href="../views/restaurantOrderHistory.php"><u>Order History</u></a>

			<hr>
	
			
	
			<a href="logout.php"> <input type="submit" name="logout" value="logout"> </a>
		</right>
</body>
</html>