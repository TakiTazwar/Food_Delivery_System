<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if (isset($_GET['uname'])) {
		$user = getByUsernamR($_GET['uname']);
		$item=getOrderById($_GET['id']);	
		//var_dump($item);
	}else{
		//header('location: all_users.php');
	}
	//echo $_GET['id'];
	$item=getOrderById($_GET['id']);
	//var_dump($item);
?>

<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/restaurantItemDiscount.js"></script>
</head>
<body>
	<b>Edit Item</b><br><br>
	<form >
		<table>
			<tr>
				<td>ID</td>
				<td><input type="number" name="id" id="id" value="<?=$item['id']?>" readonly></td>
			</tr>
			
			<tr>
				<td>Discount</td>
				<td><input type="number" name="discount"id="discount" value="<?=$item['discount']?>"></td>
				<td id="discountMsg"></td>
			</tr>
		
			<tr>
				<td><a href="../views/restaurantSales.php"> <input type="button" name="a" value="back"> </a></td>
				<td colspan="2" align="right"><input type="button" name="submit" onclick="validateName()" value="Edit"></td>

			</tr>
			<tr>
				<td id="insert"></td>
				<td></td>
			</tr>
			
			

		</table>

	</form>
</body>
</html>