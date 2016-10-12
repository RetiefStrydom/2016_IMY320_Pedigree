<?php
	session_start();
	
	if (!isset($_SESSION['user'])) {
		header("Location: index.php");
	} else if(isset($_SESSION['user'])!="") {
		header("Location: home.php");
	}
	
	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['userName']);
	header("Location: index.php");
	exit;
	
?>