<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="../assets/css/deliCommon.css">
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

		echo '<h1><a href="../php/contactAdmin.php?'.$type."=".$recieved[$n]['sender'].'">'.$type.":  ".$row['name'].'</a></h1><br>';
		$n=$n+1;
	}
}
else
{
	echo "don't have any message to see";
}
?>

</body>
</html>
