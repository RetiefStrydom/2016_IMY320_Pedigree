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
			
			$(".removeEventLink").on("click", function(e) {
				e.preventDefault();
				$("#deleteEventModal").modal("show");
			});
			
			$(".editEventLink").on("click", function(e) {
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
	<div class="container-fluid editEventAnchors">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#eventDetails">Current Events</a></h4>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#addEvent">Add Event</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="eventDetails">
				 <h1 class="sectionHeader">Edit Events: <span class='pull-right grow'><a class="scrollAnchor" href="#addEvent"><img class='image addIcon' src='Icons/addImg.png'></a></span></h1>
				 <div class="container-fluid">
					<?php
						if($events) {
							foreach($rowEvents as $event)
							{
							echo 
								"<div class='row' id='eventItem'>
									<div class='col-md-6 col-sm-6 col-xs-12'>
										<img class='img img-responsive img-rounded eventImage' src='" . $event['image'] . "'>
									</div>
									<div class='col-md-6 col-sm-6 col-xs-12'>
										<div class='container'>
											<div class='row'>
												<div class='col-md-12 col-sm-12 col-xs-12' id='details'>
													<h3 style='position: relative;'>" . $event['name'] . "</h3>
													<h4 style='position: relative;'>" . $event['diate'] . "</h4>
													<h6 style='margin-top: 20px; position: relatve;'>" . $event['description'] . "</h6>
												</div>
											</div>
											<div class='row'>
												<div class='col-md-2 col-sm-2 col-xs-12' id='controls'>
													<a href='#' class='editEventLink' id='" . $event['id'] . "'><img class='image grow' src='Icons/edit.png' style='margin: 2px;'width='25px'></a>
													<a href='#' class='removeEventLink''><img class='image grow' src='Icons/delete.png' style='margin: 2px; margin-right: 2px;' width='25px'></a>
												</div>
											</div>
										</div>
									</div>
								</div>";
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="addEvent">
				<h1 class="sectionHeader">Add an Event:</h1>
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