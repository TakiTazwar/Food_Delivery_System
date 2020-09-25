<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


if (isset($_GET['id'])) {
		$id=$_GET['id'];
		
		$user = updateAvailable($id);
	     header("location: ../views/restaurantSales.php");	

	}else{
		//header();
	}




?>

