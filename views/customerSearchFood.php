<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if($_SESSION['status']!="Ok")
{
	header("location: login.php"); 
}
else
{
	$content=searchFood();
	//var_dump($content);
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	Search Food <input type="text" name="foodtype" id="foodtype">  Area <input type="text" name="area" id="area"> <input type="button" value="Search" name=""><br>

	<table border=1>
		<tr>
			<td>Name</td>
			<td>Price</td>
			<td>Discount</td>
			<td>Type</td>
			<td>Restaurant</td>
			<td>Phone</td>
			<td>Area</td>
			<td>Option</td>
		</tr>
		<?php
		$n=0;
		while(count($content)>$n)
		{
			echo "<tr>
					<td>".$content[$n]['name']."</td>
					<td>".$content[$n]['price']."</td>
					<td>".$content[$n]['discount']."</td>
					<td>".$content[$n]['type']."</td>
					<td>".$content[$n]['res']."</td>
					<td>".$content[$n]['phone']."</td>
					<td>".$content[$n]['area']."</td>
					<td>".'<input type="button" value="Select" id="'.$content[$n]['id'].'">'."</td>
				</tr>";
			$n=$n+1;
		}
		?>

	</table>
</body>
</html>