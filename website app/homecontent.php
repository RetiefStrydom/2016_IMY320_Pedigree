<?php
		session_start();
		
		include_once 'dbconnect.php';
		
		$qry = "SELECT * FROM tbEvents";
		$qry1 = "SELECT * FROM tbnews";
		$result = mysql_query($qry);
		$result1 = mysql_query($qry1);
		if(mysql_num_rows($result) > 0) {
			$events = true;
			$news = true;
			$msg = "found";
		}
		else{
			$events = false;
			$news = false;
			$msg = "not found";
		}
		while($row = mysql_fetch_assoc($result1)){
        $rowNews[] = $row;
       
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
			$("#createEventModal").modal("hide");
			$("#addQuickEvent").on("click", function(e) {
					e.preventDefault();
					$("#createEventModal").modal("show");
				});
		});
	</script>
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
		<div class="row" id="news">
			<div class="col-md-12 col-sm-12 col-xs-12 divNews">
				<h1>News</h1>
				 <div class="panel panel-default">
           <div class="panel-heading"><h3>News:</h3></div>
          
         
              <?php
              if($news) {
                foreach($rowNews as $news)
                {
                echo 
                "<div class = 'col-md-4' id ='newsHome'>
                <h3>Headline:</h3>
                  " . $news['headline'] . "
                  <h3>Author Name:</h3>
                  " . $news['name'] . "
                  <h3>Author E-Mail:</h3>
                  " . $news['email'] . "
                  <h3>Date Created</h3>
                  " . $news['timestamp'] . "
                  <h3>Article:</h3>
                  " . $news['story'] . "
             
                </div>";
                }
              }
              ?>

            
          
        </div>

		<div class="row" id="events">
		
			<div class="col-md-12 col-sm-12 col-xs-12 divEvents">
						<h1>Upcoming Events<?php if($type == "Admin") echo "<span class='pull-right grow'><a href='#' id='addQuickEvent'><img class='image addIcon' src='Icons/addImg.png'></a></span>";?></h1>
						
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
														<div class='col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12'>";
													echo	'<img class="image image-responsice" src="'. $row['image'] .'	"/>';
														echo "</div>
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
														<div class='col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12'>";
														echo '<img class="image image-responsice" src="'. $row['image'] .'	"/>';
														echo "</div>
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


		
		<div class="container createQuickEvent">
		<div id="createEventModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete Event:</h4>
					</div>
					<div class="modal-body">
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
	</div>
</body>

</html>