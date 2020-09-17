<?php
require_once('../service/userService.php');


if (isset($_POST['submit']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$nid=$_POST['nid'];
	$address=$_POST['address'];
	$area=$_POST['area'];
	$usertype=$_POST['usertype'];
	
	$user = [
				'username'=> $username,
				'password'=> $password,
				'email'=> $email,
				'name'=> $name,
				'dob'=>$dob,
				'phone'=>$phone,
				'nid'=>$nid,
				'address'=>$address,
				'area'=>$area,
				'usertype'=>$usertype

			];

	if(!empty($username) && !empty($password) && !empty($confirmpassword) && !empty($name)&& !empty($dob) && !empty($email) && !empty($phone) && !empty($nid)  && !empty($address)  && !empty($area)  && !empty($usertype) )
	{
		if ($password == $confirmpassword)
		{	
			$validUser=validateUserandEmail($username,$email);
			//echo $validUser;
			if($validUser=='false')
			{
				$reg=insert($user);
				if($reg=='Inserted')
				{
					header("location: ../views/login.php");
				}
				else
				{
					header("location: ../views/register.php?error=insert");
				}
			}
			else
			{
				header("location: ../views/register.php?error=validate");
			}	
		}
	}
	else
	{
		echo "invalid";
	}
}	

?>

