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
		<h3>Show daily sales report</h3><br>

	<table border="1" class="content-table">
		<tr>
			<td>Order ID</td>
			<td>Customer ID</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Quantity</td>
			<td>Discount</td>
			<td>Totall</td>
			<td>Date</td>
			
		</tr>

		<?php  
			
			$users = getSalesReport();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['customerId']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['price']?></td>
			<td><?=$users[$i]['quantity']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['total']?></td>
			<td><?=$users[$i]['date']?></td>
			
			

		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>
<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>
     