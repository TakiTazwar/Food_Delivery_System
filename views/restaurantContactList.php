<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Recieve Message</h1>
<?php
require_once('../service/userService.php');
require_once('../php/session.php');

$recieved=getRecieverId();
if(!empty($recieved))
{
	$n=0;
	while(count($recieved)>$n)
	{
		$row=getTypeById($recieved[$n]['sender']);
		$type=$row['type'];
		if($type=='deliveryman')
		{
			$type='delivery';
		}

		echo '<h1><a href="restaurantContact.php?'.$type."=".$recieved[$n]['sender'].'">'.$type.":  ".$row['name'].'</a></h1><br>';
		$n=$n+1;
	}
}
else
{
	echo "You don't have any recieved message";
}
?>

</body>
</html>
<a href="../views/restaurantMain.php"> <input type="button" name="a" value="back"> </a>
