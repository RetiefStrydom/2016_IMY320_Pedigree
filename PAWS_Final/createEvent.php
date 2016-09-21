<?php
include_once 'dbconnect.php';

define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'PAWS');
	
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}

$name = $_POST['eventName'];
$description = $_POST['eventDescription'];
$date = $_POST['eventDate'];
$image = $_POST['eventImage'];

$tableCreate = "CREATE TABLE `{$name}` (
			id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			attendees VARCHAR(30) NOT NULL
			)";
			
$createResult = mysqli_query($conn, $tableCreate);

if($createResult) {
	echo "Table created";
}
else {
echo "Error creating table: " . mysqli_error($conn);
}

$qry = "INSERT  INTO tbEvents (name,description,date,image) VALUES ('$name','$description','$date','$image')";
$result = mysql_query($qry);

if($result) {
	header("location:home.php");
}
else {
	header("location:home.php");
}
?>