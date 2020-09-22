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
</head>
<body>
	<center>
		<h3>Add Discount to the Order</h3><br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Customer ID</td>
			<td>Restaurant ID</td>
			<td>Address</td>
			<td>Discount</td>
			<td>Date</td>
			<td>Status</td>
			<td>Time</td>
			<td>Action</td>
		</tr>

		<?php  
			
			$users = getallDoneorder();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['customerId']?></td>
			<td><?=$users[$i]['restaurantId']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['date']?></td>
			<td><?=$users[$i]['status']?></td>
			<td><?=$users[$i]['time']?></td>
			<td>
				<a href="../views/restaurantDiscount.php?id=<?=$users[$i]['id']?>">Add Discount</a> |
				<a href="../php/restaurantSales.php?id=<?=$users[$i]['id']?>">Sell</a> 
				
			</td>


		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>
     

		<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>
	
</center>
</body>
</html>
