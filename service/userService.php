<?php
	require_once('../db/db.php');

	function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getAllUser(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}


	function validate($username,$password){
		
		$conn = dbConnection();
		$sql = "select * from users where username='".$username."'&& password='".$password."'";
		$result = mysqli_query($conn, $sql);
		$user 	= mysqli_fetch_assoc($result);

		if(!empty($user))
		{
			return $user['type'];
		}
		else
		{
			return 'null';
		}
	}


	function validateUserandEmail($user,$email){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		else
		{
			$sql= 'select * from users where username="'.$user.'"'.'or email="'.$email.'"';
			$result = mysqli_query($conn,$sql);
			$user = mysqli_fetch_assoc($result);	
			if(!empty($user))
			{
				return 'true';
			}
			else
			{
				return 'false';
			}
			}
	}
	function insert($user){
		$conn = dbConnection();
		echo "Entered";
		if(!$conn){
			echo "DB connection error";
		}

		$sql1="INSERT INTO users (`username`, `name`, `password`, `dob`, `email`, `phone`, `nid`, `type`, `address`, `area`) VALUES ('".$user['username']."', '".$user['name']."', '".$user['password']."', '".$user['dob']."', '".$user['email']."', '".$user['phone']."', '".$user['nid']."', '".$user['usertype']."', '".$user['address']."', '".$user['area']."')";
		if(mysqli_query($conn, $sql1)){
			return 'Inserted';
		}
		else
		{
			echo $sql1;
			return 'failed';
		}
	}


	function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function checkEmail($email)
	{
		$conn = dbConnection();
		$sql = "select * from users where email='{$email}'";
		if(mysqli_query($conn, $sql))
		{
			$result=mysqli_query($conn, $sql);
			$user = mysqli_fetch_assoc($result);
			if(empty($user)){
			return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}

	function checkUser($email)
	{
		$conn = dbConnection();
		$sql = "select * from users where username='{$email}'";
		if(mysqli_query($conn, $sql))
		{
			$result=mysqli_query($conn, $sql);
			$user = mysqli_fetch_assoc($result);
			if(empty($user)){
			return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}

	function searchFood($type)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT item.id,item.name, item.price, item.discount,item.type,users.id as 'resid',users.name as 'res',users.phone,users.area FROM item join users where users.id=item.restaurantId";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function searchCart()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select cart.id,cart.specreq,cart.restaurantId,item.id as 'itemid', item.name,item.price,item.discount,item.type,users.phone,users.area from cart join item join users on cart.itemid=item.id and cart.restaurantId=users.id where customerId={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	function getByUsername($user)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where username='{$user}'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}

	function insertCart($user){
		$conn = dbConnection();	
		if(!$conn){
			echo "DB connection error";
		}

		$sql1="INSERT INTO `cart` VALUES ('','{$user['custid']}', '{$user['resId']}', '{$user['quantity']}', '{$user['request']}', '{$user['itemId']}','{$user['specrec']}')";
		if(mysqli_query($conn, $sql1)){
			return 'Inserted';
		}
		else
		{
			echo $sql1;
			return 'failed';
		}
	}

	function removeFromCart($resid,$itemid)
	{
		$cusid=getByUsername($_COOKIE['uname']);

		$conn = dbConnection();	
		if(!$conn){
			echo "DB connection error";
		}

		$sql1="DELETE FROM cart WHERE id={$resid}";
		if(mysqli_query($conn, $sql1)){
			return 'Removed';
		}
		else
		{
			echo $sql1;
			return $sql1;
		}
	}
	function insertOrder($address,$area)
	{
		$cusid=getByUsername($_COOKIE['uname']);
		$conn = dbConnection();	
		if(!$conn){
			echo "DB connection error";
		}
		$sql="SELECT * FROM `cart` where customerId={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}
		$n=0;
		while(count($users)>$n)
		{
			$id=$users[$n]['id'];
			$customerId=$users[$n]['customerId'];
			$restaurantId=$users[$n]['restaurantId'];
			$quantity=$users[$n]['quantity'];
			$request=$users[$n]['request'];
			$itemid=$users[$n]['itemid'];
			$specreq=$users[$n]['specreq'];
			$sql2="INSERT INTO `orderdetails` (`id`, `deliverymanId`, `customerId`, `restaurantId`, `address`, `request`, `discount`, `date`, `status`, `time`, `area`, `specreq`, `quantity`,`itemId`) VALUES (NULL, '0', '{$customerId}', '{$restaurantId}', '{$address}', '{$request}','0', '2020-09-21', 'pending', '3', '{$area}', '{$specreq}', '{$quantity}','{$itemid}')";
			$result = mysqli_query($conn, $sql2);
			$n=$n+1;
		}

		$cusid=getByUsername($_COOKIE['uname']);
		$sql3="DELETE FROM `cart` where cart.customerId={$cusid}";
		$result=mysqli_query($conn, $sql3);
		return "Order Confirmed";
	}
?>