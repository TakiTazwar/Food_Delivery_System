<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/restaurantHome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <label class="logo"><?php
session_start();
if ($_SESSION['status']=="Ok") 
{
echo $_COOKIE['uname'];
}
?>

</label>
   		<ul>
			<li><a class="active" href="../views/restaurantMain.php"><u>Home</a></li>
			<li><a href="../views/restaurantPendingOrder.php"><u>Pending Order
			<li><a href="../views/restaurantOrderStatus.php"><u>Order status
			<li><a href="../views/restaurantAddItem.php"><u>Add item</a></li>
			<li><a href="../views/restaurantContactList.php"><u>Contact</a></li>
			<li><a href="../views/restaurantSales.php"><u>Sales</a></li>
			<li><a href="../views/restaurantSalesReport.php"><u>Sales Report</a></li>
			
			

			<li><a href="#">Other
	          <i class="fas fa-caret-down"></i>
	        	</a>
	          	<ul>
					<li><a href="../views/restaurantReviews.php"><u>Reviews</a></li>
					<li><a href="../views/restaurantOrderHistory.php"><u>Order History</a></li>
					
				</ul>
			</li>
			<li><a href="homePage.php">Sign Out</a></li>
		</ul>
	</nav>
	<div class="wrapper">
		<div class="center">
				<h1>WELCOME </h1>

		</div>
	</div>
   <section></section>

  </body>
</html>


























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
			

			<a href="../views/restaurantPendingOrder.php"><u>Pending Order</u></a>
	
		<hr>
		
			<a href="../views/restaurantOrderStatus.php"><u>Order status</u></a>
		

		<hr>
	
			<a href="../views/restaurantAddItem.php"><u>Add item</u></a>

	
		<hr>
		
			<a href="../views/restaurantContactList.php"><u>Contact</u></a>
			<hr>
		
		
	
			<a href="../views/restaurantSales.php"><u>Sales</u></a>

			<hr>
	
			<a href="../views/restaurantSalesReport.php"><u>Sales Report</u></a>

			
	
		
		<hr>
	
			<a href="../views/restaurantReviews.php"><u>Reviews</u></a>

			<hr>

			<a href="../views/restaurantOrderHistory.php"><u>Order History</u></a>

			<hr>
	
			
	
			<a href="logout.php"> <input type="submit" name="logout" value="logout"> </a>
		</right>
</body>
</html>