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
	<script type="text/javascript" src="../assets/js/restaurantItemAdd.js"></script>
</head>
<body>
	<b>ADD Item</b><br><br>
	<form action="../php/restaurantItemInsert.php" method="post" enctype="multipart/form-data" onsubmit="return validateAll()">
		<table>
			
			<tr>
				<td>Item Name</td>
				<td><input type="text" name="item_name" id="item_name" onkeyup="validateName()"></td>
				<td id="itemMsg"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="number" name="price"id="price" onkeyup="validatePrice()"></td>
				<td id="priceMsg"></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="number" name="discount"id="discount" onkeyup="validateDiscount()"></td>
				<td id="discountMsg"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="type"id="type" onkeyup="validateType()"></td>
				<td id="typeMsg"></td>
			</tr>
		
			<tr>
				<td colspan="2" align="right"><input type="submit" name="submit" value="ADD"></td>
			</tr>
		</table>
	</form>
</body>
</html>