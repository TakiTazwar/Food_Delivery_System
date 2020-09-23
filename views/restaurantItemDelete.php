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

<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
</head>
<body>

	<form action="../php/restaurantItemDeleteCheck.php" method="post">
		<fieldset>
			<legend>Delete Item</legend>
			<table>
				<tr>
					<td>ID: </td>
					<td><?=$item['id']?> <input type="hidden" id="id" name="id" value="<?=$item['id']?>"></td>
				</tr>
				<tr>
					<td>Name: </td>
					<td><?=$item['name']?></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						Are you sure you want to remove this item?
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						
						<input type="submit" name="submit" value="Delete"> 
						<a href="../views/restaurantAddItem.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>