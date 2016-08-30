<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	if ( isset($_SESSION['userName'])!="" ) {
		$name = $_SESSION['userName'];
		$type = $_SESSION['type'];
		
		$qry = "SELECT * FROM tbUsers WHERE type = 'Admin'";
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
				 <div class="panel-heading"><h1>PAWS Admin:<h1></div>
				<div class="panel panel-default">
					 <div class="panel-heading"><h3>Current Admin Members:</h3></div>
					<div class="panel-body">
						<table class="table">
							<tr>
								<th>Admin Name:</th>
								<th>Admin Surname:</th>
								<th>Admin DOB:</th>
								<th>Admin Email Address:</th>
							</tr>
							<?php
							if($events) {
								while($row = mysql_fetch_assoc($result))
								{
								echo 
								"<tr>
									<td>" . $row['name'] . "</td>
									<td>" . $row['surname'] . "</td>
									<td>" . $row['dob'] . "</td>
									<td>" . $row['email'] . "</td>
								</tr>";
								}
							}
							?>
						</table>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Add an Admin Member:</h3></div>
					<div class="panel-body">
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
							</div>
							<div class="form-group">
								<input class="form-control" type="submit" name="addBtn" id="addBtn" value="Add Admin"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>