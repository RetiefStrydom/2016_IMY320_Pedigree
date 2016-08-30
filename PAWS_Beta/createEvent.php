<?php
include_once 'dbconnect.php';

$name = $_POST['eventName'];
$description = $_POST['eventDescription'];
$date = $_POST['eventDate'];
$iamge = $_POST['eventImage'];

$qry = "INSERT  INTO tbEvents (name,description,date,image) VALUES ('$name','$description','$date','$image')";
$result = mysql_query($qry);

if($result) {
	header("location:home.php");
}
else {
	header("location:editEvents.php");
}
?>