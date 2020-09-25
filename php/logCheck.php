<?php
	session_start();
	require_once('../service/userService.php');
	

	if(isset($_POST['submit'])){

		$username 		= $_POST['username'];
		$password 		= $_POST['password'];

		if(empty($username) || empty($password)){
			echo "null submission";

		}else{			
			$type=validate($username,$password);
			if($type=='deliveryman')
			{$_SESSION['status']  = "Ok";
				setcookie('uname',$username, time()+3600, '/');

				header('location: ../views/deliverymanMain.php');
		    }
		    if($type=='customer')
		    {
		    	$_SESSION['status']  = "Ok";
				setcookie('uname',$username, time()+3600, '/');
				header('location: ../views/customerHome.php');
		    }
		    if($type=='restaurant')
		    {
		    	$_SESSION['status']  = "Ok";
				setcookie('uname',$username, time()+3600, '/');
				header('location: ../views/restaurantMain.php');
		    }	
		    if($type=='admin')
		    {
		    	$_SESSION['status']  = "Ok";
				setcookie('uname',$username, time()+3600, '/');
				header('location: ../views/adminMain.php');
		    }
		    if($type=='null')
		    {
				header('location: ../views/login.php?error=yes');
		    }		
		}

	}else{
		header("location: login.html");
	}

?>