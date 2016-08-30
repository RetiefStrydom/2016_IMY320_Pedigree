<?php

session_start();
if( isset($_SESSION['user'])!="" ){
	header("Location: home.php");
}
include_once 'dbconnect.php';
if(isset($_POST['button_register'])) {

	$uname = trim($_POST['userName']);
	$sname = trim($_POST['userSurname']);
	$dob = trim($_POST['userDOB']);
	$email = trim($_POST['userEmail']);
	$upass = trim($_POST['userPassword']);
	
	$uname = strip_tags($uname);
	$sname = strip_tags($sname);
	$dob = strip_tags($dob);
	$email = strip_tags($email);
	$upass = strip_tags($upass);
	
	// password encrypt using SHA256();
	$password = hash('sha256', $upass);
	$password = substr($password,0,7);
	
	// check email exist or not
	$query = "SELECT email FROM tbUsers WHERE email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then proceed
	
	if ($count==0) {
	
	
		/*$sql = "INSERT INTO users(userName, userEmail, userPass ) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);		
		$stmt->bind_param("sss",$uname,$email,$password);
		$stmt->execute();*/
	
		
		$query = "INSERT INTO tbUsers(name,surname,dob,email,password, type) VALUES('$uname','$sname','$dob','$email','$password', 'User')";
		$res = mysql_query($query);
		
		if ($res) {
			$result = true;
			$msg = "Success!";
		} else {
			$result = false;
			$msg = "Oops! An error occurred, please try again...";
		}	
			
	} else {
		$result = false;
		$msg = "Oops! Email address already in use...";
	}
	
}
?>

<!DOCTYPE html>

<html>

<head>
	<title>PAWS</title>
	<meta charset="utf-8"/>
	
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>-->
	<link rel="stylesheet" href="Libraries/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="Libraries/css/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="style.css"/>
	<script src="Libraries/jquery-2.1.0.min.js"></script>
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
	<script src="Libraries/js/bootstrap.min.js"></script>
	<script src="script.js"></script>
	<script>
		$(document).ready(function() { 
			$("#loginModal").modal("hide");
			
			$("#login").on("click", function(e) {
				e.preventDefault();
				$("#loginModal").modal("show");
			});
		});
	</script>
</head>

<body>
	<!--Splash Page title and links-->

	<div class="container-fluid title">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 heading">
				<?php
					if($result) {
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='#'>Login to continue...</a></h3>";
					}
					else {
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='index.php'>Back to splash page...</a></h3>";
					}
				
				?>
			</div>
		</div>
	</div>
	
	<div class="container login">
		<div id="loginModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Login:</h4>
					</div>
					<div class="modal-body">
						<form action="" method="post">
							<label for="loginEmail">Email Address:</label>
							<input class="form-control" name="loginEmail" id="loginEmail" type="email" required />
							<label for="loginPassword">Enter password:</label>
							<input class="form-control" name="loginPassword" id="loginPassword" type="password" required />
							<input class="form-control" type="submit" value="Login"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
