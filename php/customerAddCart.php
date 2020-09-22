<?php

require_once('../service/userService.php');
require_once('../php/session.php');

$itemId=$_POST['itemId'];
$resid=$_POST['resid'];
$quantity=$_POST['quantity'];
$request=$_POST['request'];
$specrec=$_POST['specrec'];
$cusid=getByUsername($_COOKIE['uname']);

$cart=[

	'itemId'=>$itemId,
	'resId'=>$resid,
	'quantity'=>$quantity,
	'request'=>$request,
	'specrec'=>$specrec,
	'custid'=>$cusid
];

$insert=insertCart($cart);
echo $insert;



?>