<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if (isset($_GET['uname'])) {
		$user = getByUsernamR($_GET['uname']);
		$item=getItemById($_GET['id']);	
		//var_dump($item);
	}else{
		//header('location: all_users.php');
	}
	//echo $_GET['id'];
	$item=getItemById($_GET['id']);
	//var_dump($item);
?>

<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/restaurantItemUpdate.js"></script>
</head>
<body>
	<b>Edit Item</b><br><br>
	<form >
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" id="id" value="<?=$item['id']?>" readonly></td>
				
			</tr>
			<tr>
				<td>Item Name</td>
				<td><input type="text" name="item_name" id="item_name" value="<?=$item['name']?>" ></td>
				<td id="itemMsg"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="price"id="price" value="<?=$item['price']?>" ></td>
				<td id="priceMsg"></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="discount"id="discount" value="<?=$item['discount']?>" ></td>
				<td id="discountMsg"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="type"id="type" value="<?=$item['type']?>" ></td>
				<td id="typeMsg"></td>
			</tr>
			<tr>
				<td><a href="../views/restaurantAddItem.php"> <input type="button" name="a" value="back"> </a></td>
				<td colspan="2" align="right"><input type="button" name="submit" onclick="validate()" value="Edit" ></td>
			</tr>
			<tr>
				<td id="insert"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>