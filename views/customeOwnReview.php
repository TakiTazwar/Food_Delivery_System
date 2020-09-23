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
	<H1>My Reviews</H1>
<a href="customerHome.php">GO BACK</a>
<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=ownReviewShow();
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