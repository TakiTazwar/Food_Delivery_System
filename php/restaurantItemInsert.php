<?php 
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
	if(isset($_POST['submit']))
	{

		if(empty($_POST['item_name']) || empty($_POST['price']) || empty($_POST['discount']) || empty($_POST['type']))
		{
			header('location: ../views/restaurantItemAdd.php?error=null_value');
		}
		else
		{
			$id = $_POST['id'];
			$item_name = $_POST['item_name'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$type = $_POST['type'];
			$restaurantId = getByUsernameR($_COOKIE['uname']);
			
			$company = [
				'id'=> $id,
				'item_name'=> $item_name,
				'price'=> $price,
				'discount'=> $discount,
				'type'=> $type,
				
				'restaurantId'=> $restaurantId
			];
			var_dump($company);
			$status = insertItem($company);
			echo $status;

			if(true){
				header('location: ../views/restaurantAddItem.php?success=registration_done');
			}else{
				header('location: ../views/restaurantAddItem.php?error=db_error');
			}

		}
	}

?>