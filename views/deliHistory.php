<?php
	session_start();
	require_once('../service/userService.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="../assets/css/deliCommon.css">
</head>
<body>
	<h1>History</h1>
<?php
if(isset($_POST['submit'])){

		$area= $_POST['hdate'];
	}
	?>
<table border="1">
				<tr>
					<td>Order Id</td>
					<td>Delivery date</td>
					<td>Delivery area</td>
					<td>Restautrent Name</td>
					<td>Restautrent area</td>
					<td>Restautrent address</td>
				</tr>


					<?php  

						$orderId=[];
						$users =  getDeliHistory($area);
						for ($i=0; $i != count($users); $i++) {
						array_push($orderId, $users[$i]['id']);  ?>

				<tr>
					<td><?=$users[$i]['id']?></td>
					<td><?=$users[$i]['date']?></td>
					<td><?=$users[$i]['deliarea']?></td>
					<td><?=$users[$i]['name']?></td>
					<td><?=$users[$i]['area']?></td>
					<td><?=$users[$i]['address']?></td>
				<?php } 
				?>
				</tr>

			</table>
			<a href="../views/searchDate.php">search Again</a>

			<a href="deliverymanMain.php">GO BACK</a>
</body>
</html>