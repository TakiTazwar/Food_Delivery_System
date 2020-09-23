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
		<h3>Item details</h3><br>

	<table border="1" class="content-table">
		<tr>
			<td>ID</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Discount</td>
			<td>Type</td>
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
		
		
			<td>
				<a href="../views/restaurantItemUpdate.php?id=<?=$users[$i]['id']?>">Update</a> |
				<a href="../views/restaurantItemDelete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>


		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>
     	
		
		<a href="../views/restaurantItemAdd.php"> <input type="button" name="a" value="Add New Item"> </a>
		

		<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>
	
</center>
</body>
</html>
