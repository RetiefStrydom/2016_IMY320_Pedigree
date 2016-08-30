<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	if ( isset($_SESSION['userName'])!="" ) {
		$name = $_SESSION['userName'];
		$type = $_SESSION['type'];
		
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
	}
	else {
		$name = "Guest";
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
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p>Logged in as <a href="#" id="user"><?php echo $name ?></a></p>
			</div>
		</div>
		<div class="row" id="adminNav">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<p><a href="editEvents.php">Edit Events</a></p>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<p><a href="#">Edit Admins</a></p>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<p><a href="logout.php">Logout</a></p>
			</div>
		</div>
		<div class="row" id="mainLogo">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<img src="Logo/mainLogo.png"/>
			</div>
		</div>
		<div class="row" id="eventsPanel">
			<div class="panel-group">
				 <div class="panel-heading"><h1>Edit Events:<h1></div>
				<div class="panel panel-default">
					 <div class="panel-heading"><h3>Upcoming Events:</h3></div>
					<div class="panel-body">
						<table class="table">
							<tr>
								<th>Event Name:</th>
								<th>Event Description:</th>
								<th>Event Date:</th>
							</tr>
							<?php
							if($events) {
								while($row = mysql_fetch_assoc($result))
								{
								echo 
								"<tr>
									<td>" . $row['name'] . "</td>
									<td>" . $row['description'] . "</td>
									<td>" . $row['date'] . "</td>
								</tr>";
								}
							}
							?>
						</table>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Add an Event:</h3></div>
					<div class="panel-body">
						<form class="form" action="createEvent.php" method="post">
							<div class="form-group">
								<label for="eventName">Event Name:</label>
								<input class="form-control" type="text" name="eventName" id="eventName"/>
								<label for="eventDescription">Event Description:</label>
								<input class="form-control" type="textarea" name="eventDescription" id="eventDescription"/>
								<label for="eventDate">Event Date:</label>
								<input class="form-control" type="date" name="eventDate" id="eventDate"/>
								<label for="eventImage">Event Image:</label>
								<input class="form-control" type="file" name="eventImage" id="eventImage"/>
							</div>
							<div class="form-group">
								<input class="form-control" type="submit" name="createBtn" id="createBtn" value="Create Event"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>