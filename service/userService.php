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
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='pending'and restaurantId='{$id}' and date='{$date}'";
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

		$sql = "insert into company values('{$user['id']}', '{$user['item_name']}','{$user['price']}', '{$user['discount']}', '{$user['type']}', '{$user['restaurantId']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}





	function updateAccept($user)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Accepted' WHERE id={$user['id']}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


?>