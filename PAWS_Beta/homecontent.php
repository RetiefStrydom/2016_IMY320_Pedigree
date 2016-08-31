<?php
		include_once 'dbconnect.php';
		
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
	<div class="container-fluid homeAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#news">News</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#events">Events</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#calendar">Calendar</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row" id="events">
			<div class="col-md-12 col-sm-12 col-xs-12 divEvents">
						<h1>Upcoming Events</h1>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">

						<!-- Wrapper for slides -->
						<?php 
							if($events) { 
								$count = 0;
								
								echo "<div class='carousel-inner' role='listbox'>";
								
								while($row = mysql_fetch_assoc($result)) {
									
									if($count == 0) {
										echo "<div class='item active'>
												<div class='container'>
													<div class='row'>
														<div class='col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12'>
															<img class='image image-responsice' src=". $row['image'] .	"/>
														</div>
														<div class='col-md-6 col-sm-6 col-xs-12 eventDescription'>
															<h2>" . $row['name'] . "</h2>
															<h3>" . $row['date'] . "</h3>
															<p>" . $row['description'] . "</p>
														</div>
													</div>
												</div>
											</div>";
									}
									else {
										echo "<div class='item'>
												<div class='container'>
													<div class='row'>
														<div class='col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12'>
															<img class='image image-responsice' src=". $row['image'] .	"/>
														</div>
														<div class='col-md-6 col-sm-6 col-xs-12 eventDescription'>
															<h2>" . $row['name'] . "</h2>
															<h3>" . $row['date'] . "</h3>
															<p>" . $row['description'] . "</p>
														</div>
													</div>
												</div>
											</div>";
									}
									
									$count++;
								}
								echo "</div>";
								
							}
						?>

						<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" ></span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" ></span>
							</a>
						</div>
				
			</div>
		</div>
		<div class="row" id="calendar">
			<div class="col-md-12 col-sm-12 col-xs-12 divCalendar">
				<h1>Calendar</h1>
				<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffcc66&amp;src=9ufvjsii2atl3j5s2lrc5oeal4%40group.calendar.google.com&amp;color=%23875509&amp;ctz=Africa%2FJohannesburg" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
			</div>
		</div>
	</div>
</body>

</html>