
<?php

	session_start();
	require_once('../service/userService.php');
	$getReply=getreply($_POST['text']);

?>
