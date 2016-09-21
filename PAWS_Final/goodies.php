<!DOCTYPE html>
<html>
    <head>
        <title>PAWS</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Libraries/cs/bootstrap.min.css" >
	<link rel="stylesheet" href="style.css" >
        <script src="Libraries/js/jquery-2.2.3.min.js"></script>
        <script src="Libraries/js/bootstrap.min.js" ></script> 
	<script>
		$(document).ready(function() {
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
	<div class="container-fluid goodiesAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#pics">Photos</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#vids">Videos</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#sounds">Sounds</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 sector" id="pics">
				<h1 class="sectionHeader">Photographs</h1>
				<div class="container">
					<div class="row picItem">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<a href="Images/yorkie.jpg"><img src="Images/yorkie.jpg" class="img img-thumbnail" alt="Yorkie" style="width:80px;"></a>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12" id="picDescription">
							<h3>Hi I'm Diesel!</h3>
							<p>I may be fluffy but I'm fierce...haha JK!</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<span class="pull-right">
								<a download="Images/yorkie.jpg" href="Images/yorkie.jpg" title="Yorkie">
									<img src="Icons/download.png" class="img img-responsive grow" alt="download" style="width:50px; vertical-align: middle;" >
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 sector" id="vids">
				<h1 class="sectionHeader">Video</h1>
				<div class="container">
					<div class="row picItem">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<img src="Images/yorkie.jpg" class="img-thumbnail" alt="Bear" style="width:80px" >
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12" id="vidDescription">
							<h3>Amazing wildlife video</h3>
							<p>Amazing footage of a  bear frolicking in a field...enjoy :)</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<span class="pull-right">
								<a download="movie.mp4" href="Videos/movie.mp4" title="Bear">
									<img src="Icons/download.png" class="img-responsive grow" alt="download"  style="width:50px; vertical-align: middle;">
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 section" id="sounds">
				<h1 class="sectionHeader">Sounds</h1>
				<div class="container">
					<div class="row picItem">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<img src="Images/yorkie.jpg" class="img-thumbnail" alt="Bear" style="width:80px;" >
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12" id="soundDescription">
							<h3>Dog barking sound</h3>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<span class="pull-right">
								<a download="Old-dog-barking-sound.mp3" href="Sounds/Old-dog-barking-sound.mp3" title="Yorkie">
									<img src="Icons/download.png" class="img-responsive grow" alt="download" style="width:50px; vertical-align: middle;">
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

</body>
</html>
