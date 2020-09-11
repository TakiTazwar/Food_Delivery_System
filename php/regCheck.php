<?php
if (isset($_POST['submit']))
{
	$conn = mysqli_connect('127.0.0.1', 'root', '', 'fooddelivermanagementsystem');
	$sql= 'select * from users where username="'.$_POST['username'].'"';
	$result = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($result);
	if (empty($data))
	{
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && !empty($_POST['name'])&& !empty($_POST['dob']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['nid'])  && !empty($_POST['address'])  && !empty($_POST['area'])  && !empty($_POST['usertype']) )
		{

		if ($_POST['password'] == $_POST['confirmpassword'])
		{	
			$sql1="INSERT INTO users (`username`, `name`, `password`, `dob`, `email`, `phone`, `nid`, `type`, `address`, `area`) VALUES ('".$_POST['username']."', '".$_POST['name']."', '".$_POST['password']."', '".$_POST['dob']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['nid']."', '".$_POST['usertype']."', '".$_POST['address']."', '".$_POST['area']."')";
			mysqli_query($conn,$sql1);
							
		 	header("location: ../views/login.php");
			
		}
		}
	}
	else
	{
		echo "invalid";
	}
}	

?>

