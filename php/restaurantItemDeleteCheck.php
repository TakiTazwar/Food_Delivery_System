<?php 
	require_once('../php/session_header.php');
	require_once('../service/userService.php');


if(isset($_POST['submit']))
	{

		
			$id = $_POST['id'];
			echo $id;
			$status = deleteItem($id);
			echo $status;

			if(true){
				header('location: ../views/restaurantAddItem.php?success=delete_done');
			}else{
				header('location: ../views/restaurantAddItem.php?error=db_error');
			}

		}
	



	?>