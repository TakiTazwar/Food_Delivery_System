<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/deliverymanHome.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <label class="logo"><?php
session_start();
if ($_SESSION['status']=="Ok") 
{
echo $_COOKIE['uname'];
}

?></label>
   		<ul>
			<li><a class="active" href="#">Home</a></li>
			<li><a href="../php/searchArea.php">Order
			<li><a href="../php/contactAdmin.php">Contact Us</a></li>
			<li><a href="#">Other
	          <i class="fas fa-caret-down"></i>
	        	</a>
	          	<ul>
					<li><a href="#">Reviews</a></li>
					<li><a href="../php/searchDate.php">History</a></li>
					<li><a href="#">Profile</a></li>
				</ul>
			</li>
			<li><a href="../php/contactAdmin.php">Contact Us</a></li>
			<li><a href="login.php">Sign Out</a></li>
		</ul>
	</nav>
	<div class="wrapper">
		<div class="center">
				<h1>WELCOME </h1>

		</div>
	</div>
   <section></section>

  </body>
</html>
