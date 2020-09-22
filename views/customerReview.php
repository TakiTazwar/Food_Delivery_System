<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../assets/js/customerReview.js"></script>
</head>
<body>
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