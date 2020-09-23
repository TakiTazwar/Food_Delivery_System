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

	function getByUsernameR()
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

		$id=getByUsernameR();
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

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "select orderdetails.id, orderdetails.customerId,orderdetails.request, orderdetails.discount,orderdetails.date,orderdetails.time,orderdetails.quantity, item.name,item.price,item.discount as 'itemDiscount',item.type from orderdetails join item on orderdetails.itemId=item.id WHERE status='Done'and orderdetails.restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
     
function getSalesReport(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "select orderdetails.id, orderdetails.customerId,item.name, item.price,orderdetails.quantity, orderdetails.discount,round(sum((price * quantity)-(price * quantity/item.discount))-sum((price * quantity)-(price * quantity/item.discount))/orderdetails.discount) as 'total', date from orderdetails join item on orderdetails.itemId=item.id where status='Available'and orderdetails.restaurantId='{$id}' and date='{$date}' group by orderdetails.id ";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



function getTotallSell(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "select orderdetails.id, item.name,orderdetails.request, item.price, item.discount, orderdetails.discount, orderdetails.quantity, round(sum((price * quantity)-(price * quantity/item.discount))-sum((price * quantity)-(price * quantity/item.discount))/orderdetails.discount) as 'totall',date from orderdetails join item on orderdetails.itemId=item.id where status='Available'and orderdetails.restaurantId='{$id}' and date='{$date}' group by orderdetails.id" ;
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

		$id=getByUsernameR();
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

	function updateItem($user){
		$conn = dbConnection();

		$username=$_COOKIE['uname'];
		$id=getByUsernameR();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update item set name='{$user['item_name']}', price='{$user['price']}', discount='{$user['discount']}', type='{$user['type']}' where restaurantId='{$id}' and  id={$user['id']}";

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

	function updateAvailable($user)
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		
		$sql = "UPDATE orderdetails SET status='Available' WHERE id={$user}";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}



	function getItemById($id)
	{
		$conn = dbConnection();
		$username=$_COOKIE['uname'];
		$username=getByUsernameR();


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
		$username=getByUsernameR();

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
		//echo "<br>".$sql."<br>";

		if(mysqli_query($conn, $sql)){
			//echo "true";
			return true;
		}else{
			//echo "false";
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

		$id=getByUsernameR();
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

		$id=getByUsernameR();
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

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Cooking'and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallorderByStat4(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "SELECT `id`, `customerId`, `restaurantId`, `address`, `discount`, `date`, `status`, `time` FROM `orderdetails` WHERE status='Done' or status='Available' and restaurantId='{$id}' and date='{$date}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	function getallorderHistoryDaily(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "select orderdetails.id, orderdetails.customerId,orderdetails.request, orderdetails.discount,orderdetails.date,orderdetails.time,orderdetails.quantity, item.name,item.price,item.discount,item.type from orderdetails join item on orderdetails.itemId=item.id WHERE status='Available'and orderdetails.restaurantId='{$id}' and date='{$date}'";
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

		$id=getByUsernameR();
		$date=date("Y-m-d");
		$sql = "select orderdetails.id, orderdetails.customerId,orderdetails.request, orderdetails.discount,orderdetails.date,orderdetails.time,orderdetails.quantity, item.name,item.price,item.discount,item.type from orderdetails join item on orderdetails.itemId=item.id WHERE status='Available'or status='Complete'and orderdetails.restaurantId='{$id}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function restaurantReviewShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select item.name as 'itemname',item.type as 'itemtype',users.name,users.area,users.phone,review.message,orderdetails.date,users.type from orderdetails join review join users join item on orderdetails.id=review.orderId and review.customerId=users.id and orderdetails.itemId=item.id where review.userId={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getCustomer($orderid){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT orderdetails.id,users.name,users.phone FROM `orderdetails` join users on orderdetails.customerId=users.id where orderdetails.id={$orderid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getOrder($area){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT orderdetails.id,orderdetails.address,orderdetails.area,request,time,specreq,users.name,users.phone,users.address as 'resad', users.area as 'resarea' FROM `orderdetails` join users on orderdetails.restaurantId=users.id WHERE orderdetails.area like '%{$area}%'&& users.area like '%{$area}%'&& status!='pending'&& status!='complete'&& status!='recieved' && date=curdate()";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function updateOrderdetailsStatus($user,$deliId){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "UPDATE `orderdetails` SET `deliverymanId`={$deliId},`status`='recieved' WHERE id={$user}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function getDeliID(){
		$conn = dbConnection();
		$username=$_COOKIE['uname'];

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT id FROM `users` WHERE username='{$username}'";
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);
		$id=$row['id'];
		return $id;
	}

	function getDeliHistory($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$deliid=getDeliID();
		$sql = "SELECT orderdetails.id,date,orderdetails.area as 'deliarea',users.name,users.area,users.address FROM `orderdetails` join users on orderdetails.restaurantId=users.id WHERE deliverymanId='{$deliid}' && status='complete'&& date='{$date}'";
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
		$cusid=getDeliID();
		$sql = "select * from contact where (sender={$sender} and reciever={$reciver}) or (sender={$reciver} and reciever={$sender})";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function orderPaymentShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$deliid=getDeliID();
		$sql = "select orderdetails.id,item.name,round((item.price-item.price*item.discount/100)-(item.price-item.price*item.discount/100)*orderdetails.discount/100) as 'price' ,users.name as'customer' , users.phone from orderdetails join item join users on orderdetails.customerId=users.id where orderdetails.itemId=item.id and orderdetails.status='recieved' and orderdetails.deliverymanId='{$deliid}'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
		function updateOrderdetailsStatusToComplete($orderid){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "UPDATE `orderdetails` SET `status`='complete' WHERE id={$orderid}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
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
		$date=date("Y-m-d");
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
			$sql2="INSERT INTO `orderdetails` (`id`, `deliverymanId`, `customerId`, `restaurantId`, `address`, `request`, `discount`, `date`, `status`, `time`, `area`, `specreq`, `quantity`,`itemId`) VALUES (NULL, '0', '{$customerId}', '{$restaurantId}', '{$address}', '{$request}','0', '{$date}', 'pending', '{$time}', '{$area}', '{$specreq}', '{$quantity}','{$itemid}')";
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
	function deliReviewShow()
	{
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$cusid=getByUsername($_COOKIE['uname']);
		$sql = "select item.name as 'itemname',item.type as 'itemtype',users.name,users.area,users.phone,review.message,orderdetails.date,users.type from orderdetails join review join users join item on orderdetails.id=review.orderId and review.customerId=users.id and orderdetails.itemId=item.id where review.userId={$cusid}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	function customerOrderReviewShow()
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
	
	/*function getreply($msg)
	{
		$conn = dbConnection();
		$sql = "select replies from chatbot where queries LIKE'%$msg%'";
		$result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
    //fetching replay from the database according to the user query
   		$fetch_data = mysqli_fetch_assoc($result);
    //storing replay to a varible which we'll send to ajax
   		$replay = $fetch_data['replies'];
    	return $replay;
		}
else{
    return "Sorry can't be able to understand you!";
}
	}*/






?>