
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=orderPaymentShow();
echo "<table border=1>
	<tr>
		<td>Order Id</td>
		<td>Item Name</td>
		<td>Total Payment</td>
		<td>Delivery Man</td>
		<td>Phone</td>
	</tr>";
	$n=0;
	while(count($content)>$n)
	{
		echo "<tr>
				<td>".$content[$n]['id']."</td>
				<td>".$content[$n]['name']."</td>>
				<td>".$content[$n]['price']."</td>
				<td>".$content[$n]['delivery']."</td>
				<td>".$content[$n]['phone']."</td>
			</tr>";
		$n=$n+1;
	}

	echo "</table>";

?>

<a href="customerHome.php">GO BACK</a>
</body>
</html>