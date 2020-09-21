<?php
require_once('../service/userService.php');
require_once('../php/session.php');
if(isset($_POST['submit']))
{

	$message=$_POST['message'];
	$reciver=$_POST['reciver'];
	$type=$_POST['type'];

	$insert=insertMessage($message,$reciver);
	if($insert=="Inserted")
	{
		header("location: ../views/customerContact.php?".$type."=".$reciver);
	}
}



?>