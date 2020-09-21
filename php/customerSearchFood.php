<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if($_SESSION['status']!="Ok")
{
	header("location: login.php"); 
}
else
{
	if(isset($_POST['foodtype']) || isset($_POST['area']))
	{

		//$content=searchFood($_POST['foodtype'],$_POST['area']);
		$content=searchFood($_POST['foodtype'],$_POST['area']);
	}
	else
	{
		$content=searchFood('','');
	}
	echo "<table border=1>
					<tr>
						<td>Id</td>
						<td>Name</td>
						<td>Price</td>
						<td>Discount</td>
						<td>Type</td>
						<td>Restaurant</td>
						<td>Phone</td>
						<td>Area</td>
						<td>Request</td>
						<td>Quantity</td>
						<td>Medicine Request</td>
						<td>Option</td>
					</tr>";
					$n=0;
					while(count($content)>$n)
					{
						echo "<tr>
								<td>".$content[$n]['id']."</td>
								<td>".$content[$n]['name']."</td>
								<td>".$content[$n]['price']."</td>
								<td>".$content[$n]['discount']."</td>
								<td>".$content[$n]['type']."</td>
								<td>".$content[$n]['res']."</td>
								<td>".$content[$n]['phone']."</td>
								<td>".$content[$n]['area']."</td>
								<td>".'<input type="text" id="request'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="number" id="quantity'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="text"  id="specreq'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="button" onclick="add('.$content[$n]['id'].','.$content[$n]['resid'].')" value="Select" id="'.$content[$n]['id'].'">'."</td>
							</tr>";
						$n=$n+1;
					}

				echo "</table>";
}


?>