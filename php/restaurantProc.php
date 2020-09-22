<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


if (isset($_GET['id'])) {
		$id=$_GET['id'];
		
		$user = updateProc($id);
	     header("location: ../views/restaurantOrderStatus.php");	

	}else{
		//header('location: all_users.php');
	}




?>

