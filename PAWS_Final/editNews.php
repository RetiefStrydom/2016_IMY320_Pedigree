<?php
	session_start();
	
	include_once 'dbconnect.php';
	
	if ( isset($_SESSION['userName'])!="" ) {
		$name = $_SESSION['userName'];
		$type = $_SESSION['type'];
		
		$qry2 = "SELECT * FROM tbnews";
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
	</script>
</head>

<body>
	<div class="container-fluid goodiesAnchors">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#currentNewsArticles">Current News Articles</a></h4>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#addNewsArticle">Add Article</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid main">
		<div class="row" id="divEditNews">
			<h1 class="sectionHeader">Edit News: <span class='pull-right grow'><a class="scrollAnchor" href="#addNewsArticle"><img class='image addIcon' src='Icons/addImg.png'></a></span><h1>
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="currentNewsArticles">
				<div class="container-fluid">
					<?php
					
					$first = 0;
					
					if($news) {
						foreach($rowNews as $news){
							if($first == 0) {
								echo "<div class='row section' id='" . $news['id'] . "'>
										<div class='col-md-5 col-sm-5 col-xs-12'>
											<img class='image img-responsive img-rounded' src='" . $news['image'] . "'/>
										</div>
										<div class='col-md-7 col-sm-7 col-xs-12'>
											<div class='container-fluid'>
												<div class='row'>
													<div class='col-md-12 col-sm-12 col-xs-12' id='details'>
														<h3>" . $news['headline'] . "</h3>
														<h5>by " . $news['author'] . ", " . $news['timestamp'] . "</h5>
														<p>" . $news['story'] . "</p>
													</div>
												</div>
												<div class='row'>
													<div class='col-md-12 col-sm-12 col-xs-12' id='controls'>
														<span class='pull-right'><a href='#' id='editArticle'><img class='image grow' src='Icons/edit.png' style='margin: 2px;'width='25px'></a><a href='#' id='deleteArticle'><img class='image grow' src='Icons/delete.png' style='margin: 2px;'width='25px'></a></span>
													</div>
												</div>
											</div>
										</div>
									</div>";
							}
						}
					}
					
				?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="addNewsArticle">
				<h1 class="sectionHeader">Add a News Article:</h1>
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