<?php 
require_once('../service/userService.php');
require_once('../php/session.php');

if($_SESSION['status']!="Ok")
{
	header("location: login.php"); 
}
else
{
	$content=searchFood("","");
	////var_dump($content);
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/customerSearch.css">
	<script type="text/javascript" src="../assets/js/customerSearchFood.js"></script>
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
	<font size="5px">
	<br>
	<br>
	Search Food <input type="text" name="foodtype" id="foodtype">  Area <input type="text" name="area" id="area"> <input type="button" value="Search" name="" onclick="load()"><br>
	<table>
	<tr>
		<td>
			<div id='show'>
			<?php
				echo "<table border=1>
					<tr>
						<td>Id</td>
						<td>Name</td>
						<td>Price</td>
						<td>Discount</td>
						<td>Type</td>
						<td>Restaurant</td>
						<td>Phone</td>
						<td>Area</td>
						<td>Request</td>
						<td>Quantity</td>
						<td>Medicine Request</td>
						<td>Option</td>
					</tr>";
					$n=0;
					while(count($content)>$n)
					{
						echo "<tr>
								<td>".$content[$n]['id']."</td>
								<td>".$content[$n]['name']."</td>
								<td>".$content[$n]['price']."</td>
								<td>".$content[$n]['discount']."</td>
								<td>".$content[$n]['type']."</td>
								<td>".$content[$n]['res']."</td>
								<td>".$content[$n]['phone']."</td>
								<td>".$content[$n]['area']."</td>
								<td>".'<input type="text" id="request'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="number" id="quantity'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="text"  id="specreq'.$content[$n]['id'].'">'."</td>
								<td>".'<input type="button" onclick="add('.$content[$n]['id'].','.$content[$n]['resid'].')" value="Select" id="'.$content[$n]['id'].'">'."</td>
							</tr>";
						$n=$n+1;
					}

				echo "</table>";
			?>
			</div>
		</td>
		<td>
			<h1 id=insert>
		</td>
	</tr>
	</table>
	</font>
	<a href="customerShowCart.php"> GO TO CART</a>
</body>
</html>