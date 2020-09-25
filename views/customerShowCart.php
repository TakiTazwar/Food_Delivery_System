
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../assets/js/customerCartFood.js"></script>
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
<body><br><br><br>
<div id="show">


<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if($_SESSION['status']!="Ok")
{
	header("location: login.php"); 
}
else
{
	$content=searchCart();
	echo "<table border=1>
		<tr>
			<td>cart ID</td>
			<td>restaurantId</td>
			<td>itemid</td>
			<td>name</td>
			<td>price</td>
			<td>discount</td>
			<td>type</td>
			<td>Phone</td>
			<td>Area</td>
			<td>Medicine Requested</td>
			<td>Remove</td>
		</tr>";
		$n=0;
		while(count($content)>$n)
		{
			echo "<tr>
					<td>".$content[$n]['id']."</td>
					<td>".$content[$n]['restaurantId']."</td>
					<td>".$content[$n]['itemid']."</td>
					<td>".$content[$n]['name']."</td>
					<td>".$content[$n]['price']."</td>
					<td>".$content[$n]['discount']."</td>
					<td>".$content[$n]['type']."</td>
					<td>".$content[$n]['phone']."</td>
					<td>".$content[$n]['area']."</td>
					<td>".$content[$n]['specreq']."</td>
					<td>".'<input type="button" onclick="remove('.$content[$n]['id'].','.$content[$n]['itemid'].')" value="Remove" id="'.$content[$n]['restaurantId'].'">'."</td>
				</tr>";
			$n=$n+1;
		}

		echo "</table>";
}


?>
</div>
<a href="customerOrderInfo.php">Procced</a>

<table>
	<?php
		/*while()
		{

		}*/
	?>
</table>
Your Address: <input type="text" id="address"><br><br>
Your Area: <input type="text" id="area"><br><br>
<input type="button" value="ORDER NOW" onclick="order()">


</body>
</html>