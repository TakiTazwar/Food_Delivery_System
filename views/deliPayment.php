
<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="../assets/css/deliCommon.css">
<head>
</head>
<body>

<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=orderPaymentShow();
//var_dump($content);
echo "<table border=1>
	<tr>
		<td>Order Id</td>
		<td>Item Name</td>
		<td>Total Payment</td>
		<td>Customer</td>
		<td>Phone</td>
		<td>Action</td>>
	</tr>";
	$n=0;
	while(count($content)>$n)
	{
		echo "<tr>
				<td>".$content[$n]['id']."</td>
				<td>".$content[$n]['name']."</td>>
				<td>".$content[$n]['price']."</td>
				<td>".$content[$n]['customer']."</td>
				<td>".$content[$n]['phone']."</td>
				<td><a href=".'"'."../php/completeDeliPayment.php?id=".$content[$n]['id'].'"'.">complete payment</a></td>
			</tr>";
		$n=$n+1;
	}

	echo "</table>";

?>

<a href="deliverymanMain.php">GO BACK</a>
</body>
</html>