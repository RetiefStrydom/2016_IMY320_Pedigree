<?php
session_start();

include_once 'dbconnect.php';

$id = $_POST['selectEvent'];
$user = $_SESSION['user'];

$qry = "UPDATE  tbUsers SET event='$id' WHERE id='$user'";
$result = mysql_query($qry);

if($result) {
	header("location:home.php");
}
else {
	header("location:home.php");
}
?>