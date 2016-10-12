<?php
	include_once 'dbconnect.php';
	
	if( isset($_POST['button_login']) ) {	
		
		$email = $_POST['loginEmail'];
		$upass = $_POST['loginPassword'];
		
		$email = strip_tags(trim($email));
		$upass = strip_tags(trim($upass));
		
		$password = hash('sha256', $upass); // password hashing using SHA256
		$password = substr($password,0, 7);
		
		$query = "SELECT * FROM tbUsers WHERE email='$email' ";
		$result = mysql_query($query);
		
		$row=mysql_fetch_array($result);
		
		$count = mysql_num_rows($result); // if uname/pass correct it returns must be 1 row
		
		if( $count == 1 && $row['password']== $password) {
			session_start();
			$result = true;
			$_SESSION['user'] = $row['id'];
			$_SESSION['userName'] = $row['name'];
			$_SESSION['surname'] = $row['surname'];
			$_SESSION['dob'] = $row['dob'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['pic'] = $row['profilepic'];
			$_SESSION['event'] = $row['event'];
			header("Location: home.php");
		} else {
			$result = false;
			$msg = $row['password'] . " = " . $password;
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
</head>

<body>
	<!--Splash Page title and links-->

	<div class="container-fluid title">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 heading">
				<?php
					if(!$result){
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='index.php'>Try again...</a></h3>";
					}
					
				
				?>
			</div>
		</div>
	</div>
</body>
<footer>
      <p align="center">&copy; 2016 - PAWS - All rights reserved</p>
</footer>
</html>