<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<H1>WELCOME TO FOOD BLOG</H1>
<a href="customerHome.php">GO BACK</a>
<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=orderReviewShow();
$n=0;
while(count($content)>$n)
{
	echo "
			<h1>"."Food Name:".$content[$n]['itemname']."</h1>
			<h3>"."Food Type:".$content[$n]['type']."</h3>
			<h3>"."Restaurant Name: ".$content[$n]['name']."</h3>
			<h3>"."Restaurant Number: ".$content[$n]['phone']."</h3>
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