<?php
	session_start();
	
	if (isset($_SESSION['userName'])!="" ) {
		$name = $_SESSION['userName'];
		$type = $_SESSION['type'];
	}
	else {
		$name = "Guest";
		$type = "Guest";
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
			$("#adminNav").hide();
			$(".content").load("homecontent.php");
			
			$("#user").on("click", function(e) {
				e.preventDefault();
				
				$("#adminNav").show();
			});
		});
	</script>
</head>

<body>
	<div class="container-fluid main">
		<div class="row userDetails">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p><a href='profile.php' id='profile'><img alt="This image could not be displayd" src='Icons/profileKlein.png'/></a>
				 Logged in as <a href="" id="user"><?php echo $name ?></a></p>
			</div>
		</div>
		<?php if($type == "Admin") {
			echo "
				<div class='row' id='adminNav'>
					<div class='col-md-4 col-sm-4 col-xs-12'>
						<p><a href='editEvents.php'>Edit Events</a></p>
					</div>
					<div class='col-md-4 col-sm-4 col-xs-12'>
						<p><a href='editAdmin.php'>Edit Admins</a></p>
					</div>
					<div class='col-md-4 col-sm-4 col-xs-12'>
						<p><a href='logout.php'>Logout</a></p>
					</div>
				</div>";
			}
			else if($type == "User") {
			echo "
				<div class='row' id='adminNav'>
					<div class='col-md-4 col-sm-4 col-xs-12'>
						<p><a href='logout.php'>Logout</a></p>
					</div>
				</div>";
			}
			else {
			echo "
				<div class='row' id='adminNav'>
					<div class='col-md-12 col-sm-12 col-xs-12'>
						<p><a href='index.php'>Back to spash page...</a></p>
					</div>
				</div>";
			}
		?>
		<div class='row' id='mainLogo'>
			<div class='col-md-12 col-sm-12 col-xs-12'>
				<a href="home.php"><img class="image image-responsive grow" src='Logo/logoklein.png' alt="This image could not be displayd"/></a>
			</div>
		</div>
	</div>
	
	
	<!--<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#" id="home"><img src="Icons/home.png"/></a></li>
				<li><a href="#" id="profile"><img src="Icons/profile.png"/></a></li>
				<li><a href="#" id="goodies"><img src="Icons/goodies.png"/></a></li>	
				<li><a href="#" id="donations"><img src="Icons/donate.png"/></a></li>
				<li><a href="#" id="about"><img src="Icons/info.png"/></a></li>
			</ul>
		</div>
	</nav>-->
	
	<div class="container-fluid navbar">
		<div class="row">
			<div class="col-md-12 col-sm-12 menuItem">
				<table class="table">
					<tr>
						<td><a href="#" id="home"><img src="Icons/home.png" alt="This image could not be displayd"/></a></td>
						<td><a href="#" id="goodies"><img src="Icons/goodies.png" alt="This image could not be displayd"/></a></td>
						<td><a href="#" id="donations"><img src="Icons/donate.png" alt="This image could not be displayd"/></a></td>
						<td><a href="#" id="about"><img src="Icons/info.png" alt="This image could not be displayd"/></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="container-fluid content">
	
	</div>
</body>

</html>
