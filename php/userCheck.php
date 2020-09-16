<?php 
	require_once('../service/userService.php');


	//add user
	if(isset($_POST['user'])){

		$status=checkUser($_POST['user']);
		if($status)
		{
			echo "User already taken";
		}		
	}

?>
