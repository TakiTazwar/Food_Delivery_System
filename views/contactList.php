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
            	<li><a href="customerHome.php"> Home </a></li>
            	<li><a href="customerSearchFood.php"> Search </a></li>
                <li><a href="customerOrderInfo.php"> Processing </a></li>
                <li><a href="customerRecieveOrder.php"> Payment </a></li>
                <li><a href="customerCompleteOrder.php">  History </a></li>
                <li><a href="customerShowReview.php"> Reviews </a></li>
                <li><a href="contactList.php"> Messages </a></li>
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
</head>
<body>
	<br>
	<br>
	<br>
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

		echo '<h1><a href="customerContact.php?'.$type."=".$recieved[$n]['sender'].'">'.$type.":  ".$row['name'].'</a></h1><br>';
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
