<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	$userId = $_SESSION['user'];
	$userName = $_SESSION['userName'];
	$userSurname = $_SESSION['surname'];
	$userDOB = $_SESSION['dob'];
	$userEmail = $_SESSION['email'];
	$userType = $_SESSION['type'];
	$userPic = $_SESSION['pic'];
	$eventId = $_SESSION['event'];
	
	$qry = "SELECT * FROM tbEvents WHERE id = '$eventId'";
	$result = mysql_query($qry);

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
			$("#deleteProfile").on("click", function(e) {
				e.preventDefault();
				
				if(confirm("Are you sure you wish to delete your profile?")){
					window.location = $(this).attr('href');
				}
			});
		});
	</script>
</head>

<body>
	<div class="container-fluid profileAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#me">Me</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#myevents">My Events</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#mysettings">My Settings</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row" id="me">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1>ME</h1>
			</div>
		</div>
		<div class="row currentAdmin">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div>
					<img class="img-thumbnail"src="<?php echo $userPic;?>" width="250px" height="250px"/>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 detailsA">
				<div>
					<h3>Full name: <?php echo $userName . " " . $userSurname;?></h3>
					<h3>Date of Birth: <?php echo $userDOB;?></h3>
					<h3>Email Address: <?php echo $userEmail;?></h3>
					<h3>Status: <?php echo $userType;?></h3>
				</div>
			</div>
		</div>
		
			<?php	if($userType == "Admin") {
					echo "<div class='row' id='myevents'>
							<h1>My Current Event:</h1>
								<div class='col-md-6 col-sm-6 col-xs-12'>";
									if(mysql_num_rows($result) > 0) {
										$row = mysql_fetch_assoc($result);
										
										echo "<h3>" . $row['name'] . "</h3>"; 
										echo "<h4>" . $row['description'] . "</h4>"; 
										echo "<h4>" . $row['date'] . "</h4>
									</div>";
										echo "<div class='col-md-6 col-sm-6 col-xs-12'>
												<img class='image image-responsive pull-right' src='" . $row['image'] . "'/>
											</div>
										</div>"; 
									}
									else {
										echo "<h3>No event assigned...</h3>
										</div>";
									}
				}
			?>
		</div>
		<div class="container-fluid">
		<div class="row" id="mysettings">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h1>My Settings</h1>
			</div>
		</div>
		<div class="row currentAdmin">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h3>Edit Profile</h3>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h3><a href="deleteProfile.php" id="deleteProfile">Delete Profile</a></h3>
			</div>
		</div>
	</div>
</body>
</html>