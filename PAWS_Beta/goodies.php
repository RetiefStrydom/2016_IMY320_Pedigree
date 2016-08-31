<!DOCTYPE html>
<html>
    <head>
        <title>PAWS</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Libraries/cs/bootstrap.min.css" >
        <script src="Libraries/js/jquery-2.2.3.min.js"></script>
        <script src="Libraries/js/bootstrap.min.js" ></script> 
        <style type="text/css">
		.portfolio-item { margin-bottom: 25px;}
        </style>
    </head>
    <body>
	<div class="container-fluid goodiesAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#photos">Photos</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#videos">Videos</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a href="#sounds">Sounds</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row" id="photos">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header">Photographs</h1>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img class="img-responsive center-block" src="Images/1.png" alt="Chania" height="150" width="700">
						</div>

						<div class="item">
							<img class="img-responsive center-block" src="Images/2.jpg" alt="Chania" height="150" width="700">
						</div>

						<div class="item">
							<img class="img-responsive center-block" src="Images/3.jpg" alt="Flower" height="150" width="700">
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					
				</div>
			</div>
		</div>
		
		<div class="row" id="videos">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header">Video</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<video width="262" height="240" controls>
					<source src="Videos/movie.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<video width="262" height="240" controls>
					<source src="Videos/movie.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<video width="262" height="240" controls>
					<source src="Videos/movie.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<video width="262" height="240" controls>
					<source src="Videos/movie.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
		
		<div class="row" id="sounds">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="page-header">Audio</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<a href="#"><img  class="img-responsive" src="Images/yorkie.jpg" alt="">
					<audio style="width: 262px;" src="Sounds/Old-dog-barking-sound.mp3" controls>
					Your browser does not support the audio element.
					</audio>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<a href="#"><img  class="img-responsive" src="Images/yorkie.jpg" alt="">
					<audio style="width: 262px;" src="Sounds/Old-dog-barking-sound.mp3" controls>
					Your browser does not support the audio element.
					</audio>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<a href="#"><img  class="img-responsive" src="Images/yorkie.jpg" alt="">
					<audio style="width: 262px;" src="Sounds/Old-dog-barking-sound.mp3" controls>
					Your browser does not support the audio element.
					</audio>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 portfolio-item">
				<a href="#"><img  class="img-responsive" src="Images/yorkie.jpg" alt="">
					<audio style="width: 262px;" src="Sounds/Old-dog-barking-sound.mp3" controls>
					Your browser does not support the audio element.
					</audio>
				</a>
			</div>
		</div>
	</div>

</body>

</html>
