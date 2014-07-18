<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['user']);
	//unset the user id cookie
	setcookie('uid','',time() - 3600,'/');
	
	header("Location: ../log_in.php");
?>