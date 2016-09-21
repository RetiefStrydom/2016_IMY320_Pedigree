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
	$eventId = $_POST['eventToJoin'];
	
	$qry = "SELECT * FROM tbEvents WHERE id = '$eventId'";
	$result = mysql_query($qry);
	
	if(mysql_num_rows($result) > 0) {
		$row = mysql_fetch_assoc($result);
		echo "success";
	}
	else{
		echo $eventId;
	}
	
	$qryJoin = "INSERT INTO `{$table}` (eventid,eventname,eventimage) VALUES ('$row[id]','$row[name]','$row[image]')";
	$resultJoin = mysqli_query($conn, $qryJoin);
	
	if($resultJoin) {
		header("Location: home.php");
	}
	else {
		header("Location: home.php");
	}
?>