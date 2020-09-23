<?php 
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
		if(empty($_POST['discount']))
		{
			header('location: ../views/restaurantSales.php?error=null_value');
		}
		else
		{
			$id = $_POST['id'];
		
			$discount = $_POST['discount'];

			
			$restaurantId = getByUsernameR($_COOKIE['uname']);
			
			$user = [
				'id'=> $id,
				
				'discount'=> $discount,
				
				
				'restaurantId'=> $restaurantId
			];
			//var_dump($user);
			$status = updateOrderDiscount($user);
			//echo $status;

			if(true){
				//header('location: ../views/restaurantSales.php?success=registration_done');
			}else{
				//header('location: ../views/restaurantSales.php?error=db_error');
			}
			echo"Edited successfully";

		}



	?>