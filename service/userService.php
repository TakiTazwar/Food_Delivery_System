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

	function getByUsername()
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select id from users where username='{$username}'";
		$result = mysqli_query($conn, $sql);
		$data= mysqli_fetch_assoc($result);
		$id = $data['id'];
		return $id;
	}


	function getallorder(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Pending'and restaurantId='{$id}' and date='{$date}'";
		//$sql = "select orderdetails.id, orderdetails.customerId, item.name from orderdetails join item on orderdetails.itemId=item.id WHERE orderdetails.status='Pending'and restaurantId='{$id}' and date='{$date}'";



		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallDoneorder(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Done'and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallItem(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT * FROM `item` WHERE restaurantId='{$id}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function insertItem($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into item values('', '{$user['item_name']}','{$user['price']}', '{$user['discount']}', '{$user['type']}', '{$user['restaurantId']}')";
		if(mysqli_query($conn, $sql)){
			return $sql;
		}else{
			return $sql;
		}
	}


   function updateAccept($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Accepted' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateDeny($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Decline' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateProc($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Processing' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateCook($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Cooking' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function updateDone($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Done' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}



	function getItemById($id)
	{
		$conn = dbConnection();
		$username=getByUsername();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from item where id='{$id}' and restaurantId='{$username}'";
		$result = mysqli_query($conn, $sql);
		$data= mysqli_fetch_assoc($result);
		return $data;
	}

	function getOrderById($id)
	{
		$conn = dbConnection();
		$username=getByUsername();

		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from orderdetails where id='{$id}' and restaurantId='{$username}'";
		$result = mysqli_query($conn, $sql);
		$data= mysqli_fetch_assoc($result);
		return $data;
	}



	function updateOrderDiscount($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update orderdetails set discount='{$user['discount']}' where id='{$user['id']}'";
		echo "<br>".$sql."<br>";

		if(mysqli_query($conn, $sql)){
			echo "true";
			return true;
		}else{
			echo "false";
			return false;
		}
	}

	function deleteItem($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM item where id={$user}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function getallorderByStat1(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Accepted'and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallorderByStat2(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Processing'and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallorderByStat3(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Cooking'and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallorderHistory(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsername();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Done'and restaurantId='{$id}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}





?>