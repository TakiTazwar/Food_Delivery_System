<?php
	session_start();
	require_once('../service/userService.php');
	
	if (isset($_GET['id'])) {

		if ($_SESSION['status']=="Ok") 
		{
			$deliId= getDeliID();
			$user = updateOrderdetailsStatus($_GET['id'],$deliId);
			header('location: ../views/deliPayment.php');
		}
		
	}
	?>