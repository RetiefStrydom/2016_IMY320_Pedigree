<?php
		session_start();
		
		include_once 'dbconnect.php';
		
		$type = $_SESSION['type'];
		
		$qry = "SELECT * FROM tbEvents";
		$result = mysql_query($qry);
		
		if(mysql_num_rows($result) > 0) {
			$events = true;
			$msg = "found";
			$type = $_SESSION['type'];
		}
		else{
			$events = false;
			$msg = "not found";
		}
		
		$qry2 = "SELECT * FROM tbnews ORDER BY timestamp DESC";
		$result2 = mysql_query($qry2);

		if(mysql_num_rows($result2) > 0) {
			$news = true;
		
			while($row2 = mysql_fetch_assoc($result2)){
				$rowNews[] = $row2;
			}
		}
		else{
			$news = false;
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
				
			$("#createNewsArticle").modal("hide");
			
			$("#addArticle").on("click", function(e) {
				e.preventDefault();
				$("#createArticleModal").modal("show");
			});
			
			$(".readMore").unbind("click");
			
			$(".readMore").on("click", function(e) {
				e.preventDefault();
				
				var article = $(this).attr("data-article");
				
				var headline = $(".subStories[id="+article+"]").attr("data-headline");
				var image = $(".subStories[id="+article+"]").attr("data-image");
				var story = $(".subStories[id="+article+"]").attr("data-story");
				var timestamp = $(".subStories[id="+article+"]").attr("data-timestamp");
				var author = $(".subStories[id="+article+"]").attr("data-author");
				
				var subHeadline = $('#mainStory').attr("data-headline");
				var subImage = $('#mainStory').attr("data-image");
				var subStory = $('#mainStory').attr("data-story");
				var subTimestamp = $('#mainStory').attr("data-timestamp");
				var subAuthor = $('#mainStory').attr("data-author");
				
				$("#mainStory").fadeOut("slow", function() {		
					$("#mainStory #storyHeadline").html(headline);
					$("#mainStory #storyImage").attr("src", image);
					$("#mainStory #storyContent").html(story);
					$("#mainStory #storyAuthor").html(author + ", " + timestamp);
					$("#mainStory").fadeIn("slow");
				});
				
				$(".subStories[id="+article+"]").fadeOut("slow", function() {		
					$(".subStories[id="+article+"] .subHeadline").html(subHeadline);
					$(".subStories[id="+article+"]  .subAuthor").html(subAuthor + ", " + subTimestamp);
					$(".subStories[id="+article+"]").fadeIn("slow");
				});
				
				$(".subStories[id="+article+"]").attr("data-headline", subHeadline);
				$(".subStories[id="+article+"]").attr("data-image", subImage);
				$(".subStories[id="+article+"]").attr("data-story", subStory);
				$(".subStories[id="+article+"]").attr("data-timestamp", subTimestamp);
				$(".subStories[id="+article+"]").attr("data-author", subAuthor);
				
				$('#mainStory').attr("data-headline", headline);
				$('#mainStory').attr("data-image", image);
				$('#mainStory').attr("data-story", story);
				$('#mainStory').attr("data-timestamp", timestamp);
				$('#mainStory').attr("data-author", author);
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
	<div class="container-fluid homeAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#news">News</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#events">Events</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#calendar">Calendar</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row" id="news">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="divNews">
				<h1 class="sectionHeader">News:<?php if($type == "Admin") echo "<span class='pull-right grow'><a href='#' id='addArticle'><img class='image addIcon' src='Icons/addImg.png'></a></span>";?></h1>
				<?php
					echo "<div class='container-fluid'>";
					
					$first = 0;
					
					if($news) {
						foreach($rowNews as $news){
							if($first == 0) {
								$first++;
								echo "<div class='row' id='mainStory' data-headline='" . $news['headline'] ."' data-image='" . $news['image'] ."' data-story='" . $news['story'] ."' data-author='" . $news['name'] ."' data-timestamp='" . $news['timestamp'] ."'>
										<div class='col-md-5 col-sm-5 col-xs-12'>
											<img class='image img-responsive img-rounded' src='" . $news['image'] . "' id='storyImage'/>
										</div>
										<div class='col-md-7 col-sm-7 col-xs-12'>
											<span><h3 id='storyHeadline'>" . $news['headline'] . "</h3><p id='storyAuthor'>by " . $news['name'] . ", " . $news['timestamp'] . "</p></span>
											<p id='storyContent'>" . $news['story'] . "</p>
											<span class='pull-right'><a href='#'><img class='grow' src='Images/facebook.png' width='35px'/></a><a href='#'><img class='grow' src='Images/twitter.png' width='35px'/></a></span>
										</div>
									</div>";
							}
							else {
								echo "<div class='row' style='border-top: 2px solid white; margin-top: 20px;'>
										<div class='col-md-12 col-sm-12 col-xs-12 subStories' id='" . $news['id'] . "' data-headline='" . $news['headline'] ."' data-image='" . $news['image'] ."' data-story='" . $news['story'] ."' data-author='" . $news['name'] ."' data-timestamp='" . $news['timestamp'] ."'>
											<span style='display: inline-block;'><h3 class='subHeadline'>" . $news['headline'] . "</h3><p class='subAuthor'>by " . $news['name'] . ", " . $news['timestamp'] . "</p></span>
											<a href='#' class='readMore' data-article='" . $news['id'] . "'>Read More...</a>
										</div>
									</div>";
							}
						}
					}
					
					echo "</div>";
				?>
			</div>
		</div>
		<div class="row" id="events">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="divEvents">
						<h1 class="sectionHeader">Upcoming Events<?php if($type == "Admin") echo "<span class='pull-right grow'><a href='#' id='addQuickEvent'><img class='image addIcon' src='Icons/addImg.png'></a></span>";?></h1>
						
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
															<p>" . $row['description'] . "</p>";
															
														if($type == "User") {
															echo "<form class='form' action='joinEvent.php' method='post'>
																	<input type='hidden' class='form-control' name='eventToJoin' id='eventToJoin' value='" . $row['id'] . "'/>
																	<input class='form-control' type='submit' id='btnAttend' name='btnAttend' data-event='" . $event['name'] . "' value='Join Event'/>
																</form>
															</div>";
														}
														else {
															echo "</div>";
														}
												echo "</div>
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
															<p>" . $row['description'] . "</p>";
														
														if($type == "User") {
															echo "<form class='form' action='joinEvent.php' method='post'>
																	<input type='hidden' class='form-control' name='eventToJoin' id='eventToJoin' value='" . $row['id'] . "'/>
																	<input class='form-control' type='submit' id='btnAttend' name='btnAttend' onclick='attend();' value='Join Event'/>
																</form>
															</div>";
														}
														else {
															echo "</div>";
														}
														
													echo	"</div>
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
		
		<div class="container createNewsArticle">
		<div id="createArticleModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Write News Article:</h4>
					</div>
					<div class="modal-body">
						<form class="form" action="addArticle.php" method="post">
							<div class="form-group">
								<label for="headline">Headline:</label>
								<input class="form-control" type="text" name="headline" id="headline"/>
								<label for="story">Article:</label>
								<textarea class="form-control" rows="4" cols="50" name="story" id="story">
								
								</textarea>
								<label for="image">Article Image:</label>
								<input class="form-control" type="file" name="image" id="image"/>
							</div>
							<div class="form-group">
								<input class="form-control" type="submit" name="addArticle" id="addArticle" value="Post Article"/>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		
		<div class="container createQuickEvent">
		<div id="createEventModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<div class="modal-content"  style="color:black;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Create Event:</h4>
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