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
	
	$userTable = $userId . $userName;
	
	$qryFind = "SELECT * FROM `{$userTable}`";
	$resultFind = mysql_query($qryFind);

	if(mysql_num_rows($resultFind) > 0) {
		$attendingEvents = true;
		while($rowEvents = mysql_fetch_assoc($resultFind)){
			$myEvents[] = $rowEvents;
		}
	}
	else {
		$attendingEvents = false;
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
			$("#deleteProfile").on("click", function(e) {
				e.preventDefault();
				
				if(confirm("Are you sure you wish to delete your profile?")){
					window.location = $(this).attr('href');
				}
			});
			
			$(".scrollAnchor").on("click", function(e) {
				if (this.hash !== "") {
					// Prevent default anchor click behavior
					event.preventDefault();

					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 800, function(){

						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
					});
				} // End if
			});
		});
	</script>
</head>

<body>
	<div class="container-fluid profileAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="me" class="scrollAnchor">Me</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#myEvents" class="scrollAnchor">My Events</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#mysettings" class="scrollAnchor">My Settings</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<h1 class="sectionHeader">ME</h1>
			<div class="col-md-6 col-sm-6 col-xs-6 section"  id="me">
				<img src="<? echo $userPic;?>" class="img img-responsive img-rounded" width="250px" height="250px"/>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div>
					<h3>Full name: <? echo $userName . " " . $userSurname;?></h3>
					<h3>Date of Birth: <? echo $userDOB;?></h3>
					<h3>Email Address: <? echo $userEmail;?></h3>
					<h3>Status: <? echo $userType;?></h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="myEvents">
			<h1 class="sectionHeader">My Events:</h1>
			<?	
				if($userType == "Admin") {
					echo "<div class='container-fluid' id='myevents'>";
							
					if(mysql_num_rows($result) > 0) {
						echo "<div class='row'>
								<div class='col-md-6 col-sm-6 col-xs-12'>";
								
									$row = mysql_fetch_assoc($result);
								
									echo "<h3>" . $row['name'] . "</h3>"; 
									echo "<h4>" . $row['description'] . "</h4>"; 
									echo "<h4>" . $row['date'] . "</h4>
								</div>";
							echo "<div class='col-md-6 col-sm-6 col-xs-12'>
										<img class='image image-responsive pull-right' src='" . $row['image'] . "' width='75%'/>
								</div>
							</div>"; 
					}
					else {
						echo "<h3>No event assigned...</h3>
						</div>";
					}
				}
				else{
					echo "<div class='container-fluid' id='myevents'>";
						
					if($attendingEvents) {
						foreach($myEvents as $event){
							echo "<div class='row'>
									<div class='col-md-6 col-sm-6 col-xs-12'>";
									
										$row = mysql_fetch_assoc($result);
									
										echo "<h3>" . $event['eventname'] . "</h3>
											<form class='form' action='leaveEvent.php' method='post'>
												<input type='hidden' value='" . $event['eventid'] . "' name='eventToLeave' id='eventToLeave'/>
												<input type='submit' class='form-control' name='btnUnattend' id='btnUnattend' value='Leave Event'/>
											</form>
									</div>";
								echo "<div class='col-md-6 col-sm-6 col-xs-12'>
											<img class='image image-responsive pull-right' src='" . $event['eventimage'] . "' width='75%'/>
									</div>
								</div>"; 
						}
					}
					else{
						echo "<div class='row'>
									<div class='col-md-12 col-sm-12 col-xs-12'>
										<h3>Attending no events so far...</h3>
									</div>
							</div>"; 
					}
				}
			?>
			</div>
		</div>
		<div class="row">
			<h1>My Settings</h1>
			<div class="col-md-6 col-sm-6 col-xs-12 section"  id="mysettings">
				<h3>Edit Profile</h3>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h3><a href="deleteProfile.php" id="deleteProfile">Delete Profile</a></h3>
			</div>
		</div>
	</div>
</body>

</html>