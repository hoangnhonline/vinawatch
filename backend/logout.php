<?php
ini_set('display_errors',0);
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['email']);
	unset($_SESSION['fullname']);
	unset($_SESSION['group_id']);
	
	header("location: login.php");
?>
