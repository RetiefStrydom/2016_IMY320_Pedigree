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
	$upic = "Profile_Pics/" . $_POST['userPic'];
	
	
	$target_dir = "Profile_Pics//";
	$target_file = $target_dir . basename($_FILES["userPic"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["userPic"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check file size
	if ($_FILES["userPic"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	
	// if everything is ok, try to upload file
		if (move_uploaded_file($_FILES["userPic"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["userPic"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	
	
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
	
		
		$query = "INSERT INTO tbUsers(name,surname,dob,email,password, type,profilepic) VALUES('$uname','$sname','$dob','$email','$password', 'User', '$upic')";
		$res = mysql_query($query);
		
		if ($res) {
			$result = true;
			$msg = "Success!";
		} else {
			$result = false;
			// $msg ="MySQL error ".mysql_errno().": ".mysql_error()."";
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
								<h3><a href='#' id='login'>Login to continue...</a></h3>";
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
						<form action="login.php" method="post">
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
