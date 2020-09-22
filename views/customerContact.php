<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/customerEdit.css">
	<title></title>
	<header>
        <div class="left_area" >
            <h3> LUNCH <span>BREAK</span> </h3>  
          </div>
        <nav>
            <ul class="nav-links">
            	<li><a href="customerSearchFood.php"> Search </a></li>
                <li><a href="customerOrderInfo.php"> Processing </a></li>
                <li><a href="customerRecieveOrder.php"> Payment </a></li>
                <li><a href="customerCompleteOrder.php">  History </a></li>
                <li><a href="customerShowReview.php"> Reviews </a></li>
                <li><a href="custmerEditProfile.php"> Edit </a></li>
            
            </ul>
        </nav>
        <nav>
            <ul class="nav-links">
           
            <div class="right_area"> 
                <a href="../php/logout.php" class="logout_btn">Logout</a>
            </div>
           </ul>
    </nav>
    </header>
	<script type="text/javascript" src="../assets/js/customerContact.js"></script>
</head>
<body>
	<font size="5px">
<div>
	<br>

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
<form action="../php/sendMessage.php" method="POST" onsubmit="return validateMessage()">
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