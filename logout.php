<?php

	//start PHP session
	session_start();

	//empty PHP session
	$_SESSION = array();

	//clear cookies
	setcookie('userID', null, time() - ( 30), "/");
	setcookie('username', null, time() - ( 30), "/");
	setcookie('name', null, time() - ( 30), "/");
	setcookie('type', null, time() - ( 30), "/");

	//show message to user about logout
	$_SESSION['passThruMessage']="You have logged out.";
	header("Location: index.php");

?>
