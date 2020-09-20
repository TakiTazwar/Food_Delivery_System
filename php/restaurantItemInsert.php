<?php 
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
	if(isset($_POST['submit']))
	{

		if(empty($_POST['id']) || empty($_POST['item_name']) || empty($_POST['price']) || empty($_POST['discount']) || empty($_POST['type']) || empty($_POST['restaurantId']))
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
			$restaurantId = $_POST['restaurantId'];
			
			$company = [
				'id'=> $id,
				'item_name'=> $item_name,
				'price'=> $price,
				'discount'=> $discount,
				'type'=> $type,
				
				'restaurantId'=> getByUsername($_SESSION['uname'])
			];
			var_dump($company);
			$status = insertItem($company);

			if($status){
				header('location: ../views/restaurantItemAdd.php?success=registration_done');
			}else{
				header('location: ../views/restaurantItemAdd.php?error=db_error');
			}

		}
	}

?>