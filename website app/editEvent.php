<?php
	include_once 'dbconnect.php';
	
	$eventID = $_POST['selectEvent'];
	$eventCategory = $_POST['selectCategory'];
	$eventInput = $_POST['alterInput'];
	
	$qry = "UPDATE tbEvents SET $eventCategory='$eventInput' WHERE id='$eventID'";
	$result = mysql_query($qry);
	
	if($result) {
		$msg = "Event updated successfully...";
	}
	else{
		$msg = $eventID . " " . $eventCategory . " " . $eventInput;
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 heading">
				<?php
					if(!$result){
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='editAdmin.php'>Try again...</a></h3>";
					}
					else {
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='home.php'>Back to Home...</a></h3>";
					}
				
				?>
			</div>
		</div>
	</div>
	
</body>

</html>