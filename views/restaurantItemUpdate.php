<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if (isset($_GET['uname'])) {
		$user = getByUsernam($_GET['uname']);
		$item=getItemById($_GET['id']);	
		var_dump($item);
	}else{
		//header('location: all_users.php');
	}
	echo $_GET['id'];
	$item=getItemById($_GET['id']);
	var_dump($item);
?>

<html>
<head>
	<title></title>
</head>
<body>
	<b>Edit Item</b><br><br>
	<form action="../php/restaurantItemUpdateCheck.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" id="id" value="<?=$item['id']?>"></td>
			</tr>
			<tr>
				<td>Item Name</td>
				<td><input type="text" name="item_name" id="item_name" value="<?=$item['name']?>" ></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="price"id="price" value="<?=$item['price']?>"></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="discount"id="discount" value="<?=$item['discount']?>"></td>
			</tr>
			<tr>
				<td>type</td>
				<td><input type="text" name="type"id="type" value="<?=$item['type']?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="submit" value="Edit"></td>
			</tr>
		</table>
	</form>
</body>
</html>