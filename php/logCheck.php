<?php
	session_start();

	if(isset($_POST['submit'])){

		$username 		= $_POST['username'];
		$password 		= $_POST['password'];

		if(empty($username) || empty($password)){
			echo "null submission";

		}else{
			
			$conn = mysqli_connect('127.0.0.1', 'root', '', 'fooddelivermanagementsystem');
			$sql = "select * from users where username='".$username."'&& password='".$password."'";
			$result = mysqli_query($conn, $sql);
			$user 	= mysqli_fetch_assoc($result);
			
			if(!empty($user))
			{
				$sql = "select type from users where username='".$username."'&& password='".$password."'";
				$result = mysqli_query($conn, $sql);
				$user 	= mysqli_fetch_assoc($result);
				if($user='deliveryman')
				{
					$_SESSION['status']  = "Ok";
					setcookie('uname',$username, time()+3600, '/');
					header('location: home.php');
			    }
			    if($user='customer')
			    {
			    	$_SESSION['status']  = "Ok";
					setcookie('uname',$username, time()+3600, '/');
					header('location: main.php');
			    }
			    if($user='restaurant')
			    {
			    	$_SESSION['status']  = "Ok";
					setcookie('uname',$username, time()+3600, '/');
					header('location: main.php');
			    }

			
				
			}
			else
			{
				echo "Invalid information";
			}
		}

	}else{
		header("location: login.html");
	}

?>