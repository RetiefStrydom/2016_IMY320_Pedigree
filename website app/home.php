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
	
		<link rel="shortcut icon" href="Images/icon.png" type="image/x-icon">
	<link rel="icon" href="Images/icon.png" type="image/x-icon">
	
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
		<div class="container-fluid main">
		<?php 	if($type == 'User') {
				echo "<div class='row navBar'>
						<div class='col-md-1 col-md-offset-0 col-sm-12  col-xs-12 menuItem'>
							<a href='logout.php'><img class='image navIconLogout grow' src='Icons/logout.png'/></a>
						</div>
						<div class='col-md-1 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='home'><img class='image navIcon grow' src='Icons/home.png'/></a>
						</div>";
					
				
				echo		"<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='profile'><img class='image image-responsive navIcon grow' src='Icons/profile.png'/></a>
						</div>";
			
				
				echo		"<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='goodies'><img class='image image-responsive navIcon grow' src='Icons/goodies.png'/></a>
						</div>
						<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='about'><img class='image image-responsive navIcon grow' src='Icons/info.png'/></a>
						</div>
					</div>";
			}
			else if($type == 'Admin'){
				echo "<div class='row navBar'>
						<div class='col-md-1 col-md-offset-0 col-sm-12  col-xs-12 menuItem'>
							<a href='logout.php'><img class='image navIconLogout grow' src='Icons/logout.png'/></a>
						</div>
						<div class='col-md-1 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='home'><img class='image navIcon grow' src='Icons/home.png'/></a>
						</div>";
					
				
				echo		"<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='editAdmin'><img class='image image-responsive navIcon grow' src='Icons/profile.png'/></a>
						</div>";
			
				
				echo		"<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='#'><img class='image image-responsive navIcon grow' src='Icons/editNews.png'/></a>
						</div>
						<div class='col-md-1 col-sm-2 col-xs-3 menuItem'>
							<a href='#' class='iconLink' id='editEvents'><img class='image image-responsive navIcon grow' src='Icons/editEvents.png'/></a>
						</div>
					</div>";
			}
			else{
				echo "<div class='row navBar'>
						<div class='col-md-2 col-md-offset-3 col-sm-3 col-sm-offset-2 col-xs-4 col-xs-offset-0 menuItem'>
							<a href='#' class='iconLink' id='home'><img class='image navIcon grow' src='Icons/home.png'/></a>
						</div>";
				
				echo		"<div class='col-md-2 col-sm-3 col-xs-4 menuItem'>
							<a href='#' class='iconLink' id='goodies'><img class='image image-responsive navIcon grow' src='Icons/goodies.png'/></a>
						</div>
						<div class='col-md-2 col-sm-3 col-xs-4 menuItem'>
							<a href='#' class='iconLink' id='about'><img class='image image-responsive navIcon grow' src='Icons/info.png'/></a>
						</div>
					</div>";
			}
		?>
			<div class='row mainBanner'>
				<div class='col-md-12 col-sm-12 col-xs-12'>
					<a href="home.php"><img class="image image-responsive grow logo" src='Logo/mainLogo.png'/></a>
				</div>
			</div>
		</div>

	<div class="container-fluid content">
	
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p align="center">&copy; 2016 - PAWS - All rights reserved</p>
			</div>
		</div>
	</div>
</body>

</html>