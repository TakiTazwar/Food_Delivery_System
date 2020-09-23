<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="../assets/css/restaurantComm.css">
<head>
</head>
<body>
	<H1>My Reviews</H1>
<a href="../views/restaurantMain.php">GO BACK</a>
<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=restaurantReviewShow();
//var_dump($content);
$n=0;
while(count($content)>$n)
{
	echo "
			<h1>"."Food Name:".$content[$n]['itemname']."</h1>
			<h3>"."Food Type:".$content[$n]['itemtype']."</h3>
			<h3>".$content[$n]['type']." Name: ".$content[$n]['name']."</h3>
			<h3>".$content[$n]['type']." Number: ".$content[$n]['phone']."</h3>
			<h3>"."Area: ".$content[$n]['area']."</h3>
			<h3>"."Review: ".$content[$n]['message']."</h1>
			<h3>".$content[$n]['date']."</h3>
			<br><br>
		";
	$n=$n+1;
}

?>
</body>
</html>