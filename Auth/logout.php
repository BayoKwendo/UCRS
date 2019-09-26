<?php 
	session_start();
	unset($_SESSION['db_login']);
	header("Location: index.php");
?>
