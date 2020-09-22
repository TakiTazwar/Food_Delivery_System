<?php
	session_start();
	require_once('../service/userService.php');
	
	if (isset($_GET['id'])) {

		if ($_SESSION['status']=="Ok") 
		{
			$user = updateOrderdetailsStatusToComplete($_GET['id']);
			header('location: ../views/deliverymanMain.php');
		}
		
	}
	?>