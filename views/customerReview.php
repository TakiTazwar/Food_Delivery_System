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
	<script type="text/javascript" src="../assets/js/customerReview.js"></script>
</head>
<body>
	<br>
	<br>
	<br>
	
<?php
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

$order=$_GET['order'];

?>

<h1>Provide Your Review For <?php echo $type ?></h1>
<form>
	Write Here:
	<input type="text" size="200px" name="text" id="reviewText">
	<input type="button" value="Review!" onclick=<?php echo '"review('.$reciver.','.$order.')"' ?>>
</form>
<a href="customerCompleteOrder.php">Go Back</a>
<div id="show"></div>
</body>
</html>