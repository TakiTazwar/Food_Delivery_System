<?php
require_once('../service/userService.php');
require_once('../php/session.php');
$address=$_POST['address'];
$area=$_POST['area'];
$order=insertOrder($address,$area);
//echo "HOISE?";
//$row=mysqli_fetch_assoc($result);
var_dump($order);


?>