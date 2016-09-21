<?php
	include_once 'dbconnect.php';
	
	session_start();
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'PAWS');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	$table = $_SESSION['user'] . $_SESSION['userName'];
	$eventId = $_POST['eventToLeave'];
	
	$qryLeave = "DELETE FROM `{$table}` WHERE eventid = '$eventId' ";
	$resultLeave = mysqli_query($conn, $qryLeave);
	
	if($resultLeave) {
		header("Location: home.php");
	}
	else {
		header("Location: home.php");
	}
?>