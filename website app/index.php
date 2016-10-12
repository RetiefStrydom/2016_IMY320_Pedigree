<?php
	
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
?>
<!-- for carousel -->
<?php
		include_once 'dbconnect.php';
		
		$qry = "SELECT * FROM tbEvents";
		$result = mysql_query($qry);
		
		if(mysql_num_rows($result) > 0) {
			$events = true;
			$msg = "found";
		}
		else{
			$events = false;
			$msg = "not found";
		}
	
?>

<!DOCTYPE html>

<html>

<head>
	<title>PAWS</title>
	<meta charset="utf-8"/>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
			$("#registerModal").modal("hide");
			$("#loginModal").modal("hide");
			
			$("#register").on("click", function(e) {
				e.preventDefault();
				$("#registerModal").modal("show");
			});
			
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
				<h1 id="splash_Title">Help our furry friends!</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12  col-xs-12 ">
				<img src="Logo/mainLogo.png"/>
			</div>
		</div>

		<!-- buttons login/reg/guest -->
			<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="register"><a href="#"><strong>Register</strong></a></h3>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="login"><a href="#"><strong>Login</strong></a></h3>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="guest"><a href="home.php"><strong>Guest</strong></a></h3>
			</div>
		</div>
	
	<!-- end buttons -->
		

	<!-- 	<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="register"><a href="#">Register</a></h3>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="login"><a href="#">Login</a></h3>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<h3 id="guest"><a href="home.php">Guest</a></h3>
			</div>
		</div>-->
	</div> 
	
	<!--Register Modal-->
	
	<div class="container register">
		<div id="registerModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Complete the form to Register:</h4>
					</div>
					<div class="modal-body">
						<form action="register.php" method="post">
							<label for="userName">Full Name:</label>
							<input class="form-control" name="userName" id="userName" type="text" required />
							<label for="userSurname">Surname:</label>
							<input class="form-control" name="userSurname" id="userSurname" type="text" required />
							<label for="userDOB">Date of Birth:</label>
							<input class="form-control" name="userDOB" id="userDOB" type="date" required />
							<label for="userEmail">Email Address:</label>
							<input class="form-control" name="userEmail" id="userEmail" type="email" required />
							<label for="userPic">Select Profile Pic:</label>
							<input class="form-control" name="userPic" id="userPic" type="file" required />
							<label for="userPassword">Choose a password:</label>
							<input class="form-control" name="userPassword" id="userPassword" type="password" required />
							<label for="userPasswordConfirm">Confirm password:</label>
							<input class="form-control" name="userPasswordConfirm" id="userPasswordConfirm" type="password" required />
							<input class="form-control" type="submit" value="Register" id="button_register" name="button_register"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<!--Login Modal-->
	
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
							<input class="form-control" type="submit" value="Login" name="button_login" id="button_login"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	<br><br>
	<div align="center" ><a href="#"><img src="Images/social.png"/></a></div><br><br>
</body>
<footer>
      <p align="center">&copy; 2016 - PAWS - All rights reserved</p>
</footer>

</html>

