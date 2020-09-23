<?php
	session_start();
	require_once('../service/userService.php');
	

	if(isset($_POST['submit'])){

		$area= $_POST['searchArea'];
	}
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	 <link rel="stylesheet" href="../assets/css/deliCommon.css">
</head>
<body>
	<h1>Choose order</h1>

	<table>
		<tr>
			<td>
				<table border="1">
					<tr>
						<td>Order Id</td>
						<td>Customer address</td>
						<td>customer area</td>
						<td>request</td>
						<td>order time</td>
						<td>special request</td>
						<td>Restaurent Name</td>
						<td>Restaurent phone</td>
						<td>Restaurent adress</td>
						<td>Restaurent area</td>
						

					</tr>
					<?php  

						$orderId=[];
						$users = getOrder($area);
						for ($i=0; $i != count($users); $i++) {
						array_push($orderId, $users[$i]['id']);  ?>
					<tr>
						<td><?=$users[$i]['id']?></td>
						<td><?=$users[$i]['address']?></td>
						<td><?=$users[$i]['area']?></td>
						<td><?=$users[$i]['request']?></td>
						<td><?=$users[$i]['time']?></td>
						<td><?=$users[$i]['specreq']?></td>
						<td><?=$users[$i]['name']?></td>
						<td><?=$users[$i]['phone']?></td>
						<td><?=$users[$i]['resad']?></td>
						<td><?=$users[$i]['resarea']?></td>
					<?php } ?>
					</tr>
				</table>
			</td>
			<td>
			<table border="1">
				<tr>
					<td>Order Id</td>
					<td>Customer name</td>
					<td>customer phone</td>
					<td>Action</td>
				</tr>

				<?php  
					for ($i=0; $i != count($orderId); $i++) { 
					$users = getCustomer($orderId[$i]);
					 ?>
				<tr>
					<td><?=$users[0]['id']?></td>
					<td><?=$users[0]['name']?></td>
					<td><?=$users[0]['phone']?></td>
					<td>
				<a href="../php/received.php?id=<?=$users[0]['id']?>">accept</a> |
			</td>
				<?php } 
				?>
				</tr>
			</table>
			</td>

		</tr>
	</table>
</body>
</html>
<a href="../views/deliPayment.php">Daily Payment</a>