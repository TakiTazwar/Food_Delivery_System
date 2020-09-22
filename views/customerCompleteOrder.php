
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=orderCompleteShow();
echo '<table border=1>
	<tr>
		<td>Order Id</td>
		<td>Price</td>
		<td>Name</td>
		<td>Deliveryman Id</td>
		<td>Restaurant Id</td>
		<td>Discount</td>
		<td>Date</td>
		<td>Time</td>
		<td>Status</td>
		<td>Area</td>
		<td>Special Request</td>
		<td>Quantity</td>
		<td colspan="2"><center>Review</center></td>
	</tr>';
	$n=0;
	while(count($content)>$n)
	{
		echo "<tr>
				<td>".$content[$n]['id']."</td>
				<td>".$content[$n]['price']."</td>>
				<td>".$content[$n]['name']."</td>
				<td>".$content[$n]['deliverymanId']."</td>
				<td>".$content[$n]['restaurantId']."</td>
				<td>".$content[$n]['discount']."</td>
				<td>".$content[$n]['date']."</td>>
				<td>".$content[$n]['time']."</td>
				<td>".$content[$n]['status']."</td>
				<td>".$content[$n]['area']."</td>
				<td>".$content[$n]['specreq']."</td>
				<td>".$content[$n]['quantity']."</td>
				<td>".'<a href="customerReview.php?order='.$content[$n]['id'].'&delivery='.$content[$n]['deliverymanId'].'"> Review Delivery Man</a>'."</td>
				<td>".'<a href="customerReview.php?order='.$content[$n]['id'].'&restaurant='.$content[$n]['restaurantId'].'"> Review Restaurant</a>'."</td>
			</tr>";
		$n=$n+1;
	}

	echo "</table>";

?>

<a href="customerHome.php">GO BACK</a>
</body>
</html>