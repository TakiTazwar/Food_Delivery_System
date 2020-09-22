<?php
require_once('../service/userService.php');
require_once('../php/session.php');
$content=customerAllOrderList();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="customerHome.php"> Go Back</a>

	<table>
	<tr>
		<td>
			<div id='show'>
			<?php
				echo "<table border=1>
					<tr>
						<td>id </td>
						<td>deliverymanId</td>
						<td>customerId</td>
						<td>restaurantId</td>
						<td>address</td>
						<td>request</td>
						<td>discount</td>
						<td>date</td>
						<td>status</td>
						<td>time</td>
						<td>area</td>
						<td>specreq Request</td>
						<td>quantity</td>
						<td>itemId</td>
						<td>Contact Delivery</td>
						<td>Contact Restaurant</td>
					</tr>";
					$n=0;
					while(count($content)>$n)
					{
						echo "<tr>
								<td>".$content[$n]['id']."</td>
								<td>".$content[$n]['deliverymanId']."</td>
								<td>".$content[$n]['customerId']."</td>
								<td>".$content[$n]['restaurantId']."</td>
								<td>".$content[$n]['address']."</td>
								<td>".$content[$n]['request']."</td>
								<td>".$content[$n]['discount']."</td>
								<td>".$content[$n]['date']."</td>
								<td>".$content[$n]['status']."</td>
								<td>".$content[$n]['time']."</td>
								<td>".$content[$n]['area']."</td>
								<td>".$content[$n]['specreq']."</td>
								<td>".$content[$n]['quantity']."</td>
								<td>".$content[$n]['itemId']."</td>";
								if($content[$n]['deliverymanId']!='0')
								{
									echo "<td>".'<a href="customerContact.php?delivery='.$content[$n]['deliverymanId'].'"> Contact Delivery Man</a>'."</td>";
								}
								else
								{
									echo "<td></td>";
								}
								echo "<td>".'<a href="customerContact.php?restaurant='.$content[$n]['restaurantId'].'"> Contact Restaurant</a>'."</td>
							</tr>";
						$n=$n+1;
					}

				echo "</table>";
			?>
			</div>
		</td>
		<td>
			<h1 id=insert>
		</td>
	</tr>
	</table>

</body>
</html>