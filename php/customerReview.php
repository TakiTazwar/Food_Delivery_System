<?php
require_once('../service/userService.php');
require_once('../php/session.php');
if(isset($_POST['message']))
{
	$reciever=$_POST['reciever'];
	$orderid=$_POST['orderid'];
	$message=$_POST['message'];
	$insert=insertReview($reciever,$orderid,$message);
	if($insert=="Inserted")
	{
		echo "Inserted Successfully";
	}
	else
	{
		echo "Review Failed";
	}
}
else
{
	echo "Please Enter a Message";
}
?>