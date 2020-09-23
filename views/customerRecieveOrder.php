
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="../assets/css/customerPay.css">
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
<font size="5px">
<?php 
require_once('../service/userService.php');
require_once('../php/session.php');


$content=customerOrderPaymentShow();
echo "<table border=1>
	<tr>
		<td>Order Id</td>
		<td>Item Name</td>
		<td>Total Payment</td>
		<td>Delivery Man</td>
		<td>Phone</td>
	</tr>";
	$n=0;
	while(count($content)>$n)
	{
		echo "<tr>
				<td>".$content[$n]['id']."</td>
				<td>".$content[$n]['name']."</td>>
				<td>".$content[$n]['price']."</td>
				<td>".$content[$n]['delivery']."</td>
				<td>".$content[$n]['phone']."</td>
			</tr>";
		$n=$n+1;
	}

	echo "</table>";

?>
</font>
<a href="customerHome.php">GO BACK</a>
</body>
</html>