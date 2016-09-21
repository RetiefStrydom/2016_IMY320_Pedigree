<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	$userId = $_SESSION['user'];
	$userName = $_SESSION['userName'];
	
	$tableName = $userId . $userName;
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'PAWS');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	$deleteTable = "DROP TABLE `{$tableName}`";
	$resultDeleteTable = mysqli_query($conn, $deleteTable);
	
	$qry = "DELETE FROM tbUsers WHERE id = '$userId'";
	$result = mysql_query($qry);
	
	if($result && $resultDeleteTable) {
		session_destroy();
		unset($_SESSION);
		header("Location: index.php");
		exit;
	}
	else{
		echo mysqli_error($conn);
	}
?>