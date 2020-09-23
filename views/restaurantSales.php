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
		<h3>Ready to Sell</h3><br>

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
            <td>Action</td>
		</tr>

		<?php  
			
			$users = getallDoneorder();
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
			<td><?=$users[$i]['itemDiscount']?></td>
			<td><?=$users[$i]['type']?></td>
			<td>
				<a href="../views/restaurantDiscount.php?id=<?=$users[$i]['id']?>">Add Discount</a> |
				<a href="../php/restaurantReq.php?id=<?=$users[$i]['id']?>">Sell</a> 
				
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



<body>
	<center>
		<h3>Sells Complete</h3><br>

	<table border="1" class="content-table">
		<tr>
			<td>Order ID</td>
			<td>Item Name</td>
			<td>Request</td>
			<td>price</td>
			<td>Item Discount</td>
			<td>Order Discount</td>
			<td>Quantity</td>
			<td>Totall Price</td>
			<td>Date</td>
			
		</tr>

		<?php  
			
			$users = getTotallSell();
			//var_dump($users);
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['request']?></td>
			<td><?=$users[$i]['price']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['discount']?></td>
			<td><?=$users[$i]['quantity']?></td>
			<td><?=$users[$i]['totall']?></td>
			<td><?=$users[$i]['date']?></td>
			</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>