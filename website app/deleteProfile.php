<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	$userId = $_SESSION['user'];
	
	$qry = "DELETE FROM tbUsers WHERE id = '$userId'";
	$result = mysql_query($qry);
	
	if($result) {
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
		exit;
	}
?>