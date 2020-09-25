<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if($_SESSION['status']!="Ok")
{
	header("location: login.php"); 
}
else
{
	//$content=searchFood();
	//var_dump($content);
}
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../assets/css/restaurantPending.css">
</head>
<body>
	<center>
		<h3>Daily Order History</h3><br>

	<table border="1" class="content-table">
		<tr>
			<td>Order ID</td>
			<td>Customer ID</td>
			<td>Request</td>
			<td>Order Discount</td>
			<td>Date</td>
			<td>Time</td>
			<td>Quantity</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Item Discount</td>
			<td>Type</td>
            
		</tr>

		<?php  
			
			$users = getallOrderHistoryDaily();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['customerId']?></td>
			<td><?=$users[$i]['request']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['date']?></td>
			<td><?=$users[$i]['time']?></td>
			<td><?=$users[$i]['quantity']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['price']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['type']?></td>
			


		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>
     

		
	
</center>
</body>
</html>

<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<h3>All Order History</h3><br>

	<table border="1" class="content-table">
		<tr>
			<td>Order ID</td>
			<td>Customer ID</td>
			<td>Request</td>
			<td>Order Discount</td>
			<td>Date</td>
			<td>Time</td>
			<td>Quantity</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Item Discount</td>
			<td>Type</td>
            
		</tr>

		<?php  
			
			$users = getallOrderHistory();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['customerId']?></td>
			<td><?=$users[$i]['request']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['date']?></td>
			<td><?=$users[$i]['time']?></td>
			<td><?=$users[$i]['quantity']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['price']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['type']?></td>
			


		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>

<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>