<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	if ( isset($_SESSION['userName'])!="" ) {
		$name = $_SESSION['userName'];
		$type = $_SESSION['type'];
		
		$qry = "SELECT * FROM tbUsers WHERE type = 'Admin'";
		$result = mysql_query($qry);
		
		$allEvents = "SELECT * FROM tbEvents";
		$resultAllEvents = mysql_query($allEvents);
		
		if(mysql_num_rows($resultAllEvents) > 0) {
			$e = true;
			
			while($row2 = mysql_fetch_assoc($resultAllEvents)){
				$upcoming[] = $row2;
			}
		}
		else{
			$e = false;
		}
		
		if(mysql_num_rows($result) > 0) {
			$events = true;
			$msg = "found";
			while($row = mysql_fetch_assoc($result)){
				$adminMembers[] = $row;
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
			$("#deleteAdminModal").modal("hide");
			$("#assignEventModal").modal("hide");
			
			$("#user").on("click", function(e) {
				e.preventDefault();
				
				$("#adminNav").show();
			});
			
			$("#remove").on("click", function(e) {
				e.preventDefault();
				$("#deleteAdminModal").modal("show");
			});
			
			$("#chooseEvent").on("click", function(e) {
				e.preventDefault();
				$("#assignEventModal").modal("show");
			});
			
			$(".removeAdminForm").submit(function() {
				if(confirm("Are you sure you wish to remove this user as Admin?")) {
					return true;
				}
				else{
					return false;
				}
			});
			
			
			
			$(".assignEventForm").submit(function() {
				if(confirm("Are you sure you wish to assign the responsibilities of this event to this user?")) {
					return true;
				}
				else{
					return false;
				}
			});
		});
	</script>
	</script>
</head>

<body>
	<div class="container-fluid main">
		<div class="row" id="adminTitle">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h1>Edit Administration:<span class='pull-right grow'><a href="#addMember"><img class='image addIcon' src='Icons/addImg.png'></span></a><h1>
			</div>
		</div>
		<div class="row currentAdmin">
			<h3>Current Admin Members:</h3>
				<div class="container-fluid">
						<?php
						if($events) {
							foreach($adminMembers as $member)
							{
								if($member['event'] != 0) {
									$hasEvent = true;
									
									$qryGetEvent = "SELECT * FROM tbEvents WHERE id = '$member[event]'";
									$resultGetEvent = mysql_query($qryGetEvent);
									$eventDetails = mysql_fetch_assoc($resultGetEvent);
								
								}
								else {
									$hasEvent = false;
								}
								
								echo 
								"<div class='row adminDetails'>
									<div class='col-md-6 col-sm-6 col-xs-12'>
										<img class='image img-thumbnail adminImg' width='250px' height='250px' src='" . $member['profilepic'] . "'/>
									</div>
									<div class='col-md-6 col-sm-6 col-xs-12 detailsA'>
										<p>" . $member['name'] . "</p>
										<p>" . $member['surname'] . "</p>
										<p>" . $member['dob'] . "</p>
										<p>" . $member['email'] . "</p>";
										if($hasEvent) {
											echo "<p>Current Event: " . $eventDetails['name'] . "</p>
												<span class='pull-right'><a href='#' id='chooseEvent'><img class='image grow' src='Icons/edit.png' style='margin: 2px;'width='25px'></a><a href='#' id='remove'><img class='image grow' src='Icons/delete.png' style='margin: 2px;'width='25px'></a></span>"; 
											}
											else{
													echo "<span class='pull-right'><a href='#' id='chooseEvent'><img class='image grow' src='Icons/edit.png' style='margin: 2px;'width='25px'></a><a href='#' id='remove'><img class='image grow' src='Icons/delete.png' style='margin: 2px;'width='25px'></a></span>"; 

											}
								echo "</div>
								</div>";
							}
						}
						?>
				</div>
		</div>
		<div class="row" id="addMember">
			<h3>Add an Admin Member:</h3>
			<form class="form" action="addAdmin.php" method="post">
				<div class="form-group">
					<label for="adminName">Admin Name:</label>
					<input class="form-control" type="text" name="adminName" id="adminName"/>
					<label for="eventDescription">Admin Surname:</label>
					<input class="form-control" type="text" name="adminSurname" id="adminSurname"/>
					<label for="adminDate">Admin DOB:</label>
					<input class="form-control" type="date" name="adminDate" id="adminDate"/>
					<label for="adminEmail">Admin Email Address:</label>
					<input class="form-control" type="email" name="adminEmail" id="adminEmail"/>
					<label for="adminPassword">Admin Password:</label>
					<input class="form-control" type="password" name="adminPassword" id="adminPassword"/>
					<label for="adminPic">Admin Profile Picture:</label>
					<input class="form-control" type="file" name="adminPic" id="adminPic"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="submit" name="addBtn" id="addBtn" value="Add Admin"/>
				</div>
			</form>
		</div>
	</div>
	
	<!--Delete Admin Modal-->
	
	<div class="container delete">
		<div id="deleteAdminModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Remove Admin:</h4>
					</div>
					<div class="modal-body">
						<form class="removeAdminForm" action="removeAdmin.php" method="post">
							<label for="selectMember">Select Member:</label>
							<select class="form-control" id="selectMember" name="selectMember">
								<?
									if($events) {
										foreach($adminMembers as $member) {
											echo "<option value='" . $member['id'] . "'>" . $member['name'] . " " . $member['surname'] . "</option>";
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
	
	<!--Assign Event Modal-->
	
	<div class="container assign">
		<div id="assignEventModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Assign Event:</h4>
					</div>
					<div class="modal-body">
						<form class="assignEventForm" action="assignEvent.php" method="post">
							<label for="selectEvent">Select Event:</label>
							<select class="form-control" id="selectEvent" name="selectEvent">
								<?
									if($events) {
										foreach($upcoming as $evt) {
											echo "<option style='background-image:url('" . $row['image'] . "');'  value='" . $evt['id'] . "'>" . $evt['name'] . "</option>";
										}
									}
								?>
							</select>
							<input class="form-control" type="submit" value="Assign" name="button_assign" id="button_assign"/>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>

</html>