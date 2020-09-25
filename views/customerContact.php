<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/customerContact.js"></script>
</head>
<body>
	<font size="5px">
<div>
	<br>
<a href="customerHome.php">Go Back</a>
<?php
require_once('../service/userService.php');
require_once('../php/session.php');
$sender=getByUsername($_COOKIE['uname']);
$reciver="";
$type="";
if(isset($_GET['delivery']))
{
	$reciver=$_GET['delivery'];
	$type="delivery";

}
elseif(isset($_GET['restaurant']))
{
	$reciver=$_GET['restaurant'];
	$type="restaurant";

}

$messages=getAllMessages($sender,$reciver);
if(!empty($messages))
{
	$n=0;
	while(count($messages)>$n)
	{
		if($messages[$n]['sender']==$sender)
		{
			echo "<h1>ME</h1>";
		}
		elseif($messages[$n]['sender']==$reciver)
		{
			echo "<h1>".$type."</h1>";
		}

		echo "<h3>Message: ".$messages[$n]['message']."</h3>";
		$n=$n+1;
	}

}
else
{
	echo "WRITE A MESSAGE<br>";
}
echo '<a href="customerContact.php?'.$type.'='.$reciver.'">RELOAD MESSAGE</a>';
?>
<form action="../php/customerSendMessage.php" method="POST" onsubmit="return validateMessage()">
	ENTER YOUR MESSAGE:<input type="text" name="message" id="message"> 
	<div id="show"></div>
	<input type="submit" name="submit" value="Send">
	<input type="hidden" name="reciver" value=<?php echo '"'.$reciver.'"'; ?>>
	<input type="hidden" name="type" value=<?php echo '"'.$type.'"'; ?>>
</form>
</div>
</font>

</body>
</html>