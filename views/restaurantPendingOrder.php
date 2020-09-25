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
		<h3>Order details</h3><br>

	<table border="1" class="content-table">
		<thead>
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
	</thead>

		<?php  
			
			$users = getallorder();
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
				<a href="../php/restaurantAccept.php?id=<?=$users[$i]['id']?>">Accept</a> |
				<a href="../php/restaurantDeny.php?id=<?=$users[$i]['id']?>">Decline</a> 
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
