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
			while($row = mysql_fetch_assoc($result)){
				$rowEvents[] = $row;
			}
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
			$("#deleteEventModal").modal("hide");
			$("#editEventModal").modal("hide");
			
			$("#editEventModal form #selectCategory").change(function() {
				$("#editEventModal form .alter").hide();
				
				var category = $("#editEventModal form #selectCategory").val();
				
				switch(category){
					case "name": $("#editEventModal form .alter #alterInput").attr("type","text"); break;
					case "description": $("#editEventModal form .alter #alterInput").attr("type","textarea"); break;
					case "date": $("#editEventModal form .alter #alterInput").attr("type","date"); break;
					case "image": $("#editEventModal form .alter #alterInput").attr("type","file"); break;
					default: $("#editEventModal form .alter #alterInput").attr("type","text");
				};
				$("#editEventModal form .alter").show();
			});
			
			$("#user").on("click", function(e) {
				e.preventDefault();
				
				$("#adminNav").show();
			});
			
			$("#remove").on("click", function(e) {
				e.preventDefault();
				$("#deleteEventModal").modal("show");
			});
			
			$("#edit").on("click", function(e) {
				e.preventDefault();
				$("#editEventModal").modal("show");
			});
			
			$(".removeEventForm").submit(function() {
				if(confirm("Are you sure you wish to delete this event?")) {
					return true;
				}
				else{
					return false;
				}
			});
			
			$(".editEventForm").submit(function() {
				if(confirm("Are you sure you wish to edit this event?")) {
					return true;
				}
				else{
					return false;
				}
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
				<a href="home.php"><img class="image image-responsive grow" src='Logo/mainLogo.png'/></a>
			</div>
		</div>
		<div class="row" id="eventsPanel">
			<div class="panel-group">
				 <div class="panel-heading"><h1>Edit Events:</h1><a class="pull-right" href="#" id="edit">Edit</a><span class="pull-right"> | </span><a class="pull-right" href="#" id="remove">Delete</a></div>
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
								foreach($rowEvents as $event)
								{
								echo 
								"<tr>
									<td>" . $event['name'] . "</td>
									<td>" . $event['description'] . "</td>
									<td>" . $event['date'] . "</td>
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
	
	<!--Delete Event Modal-->
	
	<div class="container delete">
		<div id="deleteEventModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Event:</h4>
					</div>
					<div class="modal-body">
						<form class="removeEventForm" action="removeEvent.php" method="post">
							<label for="selectEvent">Select Event:</label>
							<select class="form-control" id="selectEvent" name="selectEvent">
								<?
									if($events) {
										foreach($rowEvents as $event) {
											echo "<option value='" . $event['id'] . "'>" . $event['name'] . "</option>";
										}
									}
								?>
							</select>
							<input class="form-control" type="submit" value="Remove" name="button_remove" id="button_remove"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	<!--Edit Event Modal-->
	
	<div class="container edit">
		<div id="editEventModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Event:</h4>
					</div>
					<div class="modal-body">
						<form class="editEventForm" action="editEvent.php" method="post">
							<label for="selectEvent">Select Event:</label>
							<select class="form-control" id="selectEvent" name="selectEvent">
								<?
									if($events) {
										foreach($rowEvents as $event) {
											echo "<option value='" . $event['id'] . "'>" . $event['name'] . "</option>";
										}
									}
								?>
							</select>
							<div class="form-group">
								<label for="selectCategory">Edit:</label>
								<select class="form-control" id="selectCategory" name="selectCategory">
									<option value="name">Name</option>
									<option value="description">Description</option>
									<option value="date">Date</option>
									<option value="image">Image</option>
								</select>
							</div>
							<div class="form-group alter">
								<label for="alterInput">Enter new value:</label>
								<input class="form-control" type="text" id="alterInput" name="alterInput"/>
							</div>
							<input class="form-control" type="submit" value="Edit" name="button_edit" id="button_edit"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>

</html>