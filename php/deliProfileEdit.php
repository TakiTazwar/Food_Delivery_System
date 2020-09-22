<?php
require_once('../service/userService.php');
require_once('../php/session.php');

if (isset($_POST['submit']))
{
	$password=$_POST['password'];
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$nid=$_POST['nid'];
	$address=$_POST['address'];
	$area=$_POST['area'];
	
	$user = [
				'password'=> $password,
				'name'=> $name,
				'dob'=>$dob,
				'phone'=>$phone,
				'nid'=>$nid,
				'address'=>$address,
				'area'=>$area,

			];

	if(!empty($password) &&  !empty($name)&& !empty($dob) &&  !empty($phone) && !empty($nid)  && !empty($address)  && !empty($area))
	{	
		$reg=customerUpdate($user);
		if($reg=='Inserted')
		{
			header("location: ../views/deliverymanMain.php?success=edit");
		}
		else
		{
			header("location: ../views/deliProfile.php?error=update");
		}
	}
	else
	{
		echo "invalid";
	}
}	

?>

