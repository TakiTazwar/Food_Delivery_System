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
		<h3>Order History</h3><br>

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
			<!--td>Action</td-->
		</tr>

		<?php  
			
			$users = getallorderHistory();
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
			<!--td>
				<a href="../php/restaurantProc.php?id=<?=$users[$i]['id']?>">Processing</a> |
				<a href="../php/restaurantCook.php?id=<?=$users[$i]['id']?>">Cooking</a> |
				<a href="../php/restaurantDone.php?id=<?=$users[$i]['id']?>">Done</a> 
			</td-->


		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>
     	Order id:<input type="text" name="id">
		<input type="submit" name="submit" value="Accept Order">
		<input type="submit" name="submit" value="Decline Order"><br>
		<Br>
		See accepted order list<Br><Br>
		<a href="order.html"> <input type="button" name="a" value="Order List"> </a>
		<Br> <Br>

		<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>
	
</center>
</body>
</html>
