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

	function searchFood($type,$area)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT item.id,item.name, item.price, item.discount,item.type,users.id as 'resid',users.name as 'res',users.phone,users.area FROM item join users where users.id=item.restaurantId and item.type like '%".$type."%' and users.area like '%{$area}%'";
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
			$time=date("H:i:s");
			$sql2="INSERT INTO `orderdetails` (`id`, `deliverymanId`, `customerId`, `restaurantId`, `address`, `request`, `discount`, `date`, `status`, `time`, `area`, `specreq`, `quantity`,`itemId`) VALUES (NULL, '0', '{$customerId}', '{$restaurantId}', '{$address}', '{$request}','0', '2020-09-21', 'pending', '{$time}', '{$area}', '{$specreq}', '{$quantity}','{$itemid}')";
			$result = mysqli_query($conn, $sql2);
			$n=$n+1;
		}

		$cusid=getByUsername($_COOKIE['uname']);
		$sql3="DELETE FROM `cart` where cart.customerId={$cusid}";
		$result=mysqli_query($conn, $sql3);
		return "Order Confirmed";
	}

	function customerAllOrderList()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select * from orderdetails where customerId={$cusid} and status!='complete'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	function getAllMessages($sender,$reciver)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select * from contact where (sender={$sender} and reciever={$reciver}) or (sender={$reciver} and reciever={$sender})";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	function insertMessage($message,$reciver)
	{
		$conn = dbConnection();	
		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$date=date("Y-m-d H:i:s");
		$sql1="INSERT INTO `contact` VALUES ('{$cusid}', '{$reciver}','{$message}','{$date}')";
		if(mysqli_query($conn, $sql1)){
			return 'Inserted';
		}
		else
		{
			echo $sql1;
			return 'failed';
		}
	}

	function getRecieverId()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select DISTINCT sender from contact where reciever={$cusid} order by time";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getTypeById($id)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function customerOrderPaymentShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select orderdetails.id,item.name,round((item.price-item.price*item.discount/100)-(item.price-item.price*item.discount/100)*orderdetails.discount/100) as 'price' ,users.name as'delivery' , users.phone from orderdetails join item join users on orderdetails.deliverymanId=users.id where orderdetails.itemId=item.id and orderdetails.status='recieved' and orderdetails.customerId={$cusid} group by orderdetails.id";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function orderCompleteShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select item.name,round((item.price-item.price*item.discount/100)-(item.price-item.price*item.discount/100)*orderdetails.discount/100) as 'price',orderdetails.id,deliverymanId,orderdetails.restaurantId,item.discount,date,time,status,area,specreq,quantity from orderdetails join item on orderdetails.itemId=item.id where orderdetails.customerId={$cusid} and orderdetails.status='complete' order by date and time";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function insertReview($reciever,$orderid,$message){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
			return 'failed';
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql1="INSERT INTO `review` (`id`, `orderId`, `userId`, `customerId`, `message`) VALUES (NULL, '{$orderid}', '{$reciever}', '{$cusid}', '{$message}');";
		if(mysqli_query($conn, $sql1)){
			return 'Inserted';
		}
		else
		{
			echo $sql1;
			return 'failed';
		}
	}

	function orderReviewShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select item.name as 'itemname',item.type,users.name,users.area,review.message,orderdetails.date,users.phone from orderdetails join review join users join item on orderdetails.id=review.orderId and orderdetails.restaurantId=review.userId and users.id=orderdetails.restaurantId and orderdetails.itemId=item.id where orderdetails.status='complete' order by date desc";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function ownReviewShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select item.name as 'itemname',item.type as 'itemtype',users.name,users.area,users.phone,review.message,orderdetails.date,users.type from orderdetails join review join users join item on orderdetails.id=review.orderId and review.userId=users.id and orderdetails.itemId=item.id where orderdetails.customerId={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function customerAllInfo()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select * from users where id={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		
	}

	function customerUpdate($user)
	{
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "update users set password='{$user['password']}', name='{$user['name']}', phone='{$user['phone']}' , address='{$user['address']}', nid='{$user['nid']}', area='{$user['area']}' where id={$cusid}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
?>