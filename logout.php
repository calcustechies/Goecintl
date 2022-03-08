<?php
	session_start(); //unsetting user session
	unset($_SESSION['username']);
	unset($_SESSION['bh_id']);
	session_destroy(); 
	header('Location: login.php'); 
?>