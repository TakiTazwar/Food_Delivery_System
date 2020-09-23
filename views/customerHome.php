<?php
$username=$_COOKIE['uname'];
if(isset($_GET['success']))
{
	echo "Edit Succesful";
}

?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="../assets/css/customerHome.css">
	<title></title>
	<header>
        <div class="left_area" >
            <h3> Lunch <span>Break</span> </h3>  
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

</body>
</html>