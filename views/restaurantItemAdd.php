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
</head>
<body>
	<b>ADD Item</b><br><br>
	<form action="../php/restaurantItemInsert.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" id="id" ></td>
			</tr>
			<tr>
				<td>Item Name</td>
				<td><input type="text" name="item_name" id="item_name"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="price"id="price"></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="discount"id="discount"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="type"id="type"></td>
			</tr>
			<tr>
				<td>restaurant id</td>
				<td><input type="text" name="restaurantId" id="rid"></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="submit" value="ADD"></td>
			</tr>
		</table>
	</form>
</body>
</html>