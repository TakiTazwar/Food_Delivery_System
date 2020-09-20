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
		<h3>Item details</h3><br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Discount</td>
			<td>Type</td>
			<td>Restaurant ID</td>
			
			<td>Action</td>
		</tr>

		<?php  
			
			$users = getallItem();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['price']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['type']?></td>
			<td><?=$users[$i]['restaurantId']?></td>
		
			<td>
				<a href="restaurantAccept.php?id=<?=$users[$i]['id']?>">Accept</a> |
				<a href="restaurantDeny.php?id=<?=$users[$i]['id']?>">Deny</a> 
			</td>


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

		<a href="main.php"> <input type="button" name="a" value="back"> </a>
	
</center>
</body>
</html>
