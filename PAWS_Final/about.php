<!DOCTYPE html>

<html lang="en">

<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<link rel="icon" href="Images/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="Images/icon.png" type="image/x-icon">
	<link rel="icon" href="Images/icon.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Libraries/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="Libraries/js/bootstrap.min.js"></script>
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
	<div class="container-fluid aboutAnchors">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#ourMission">Our Mission</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#contactUs">Contact Us</a></h4>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 item">
				<h4 class="grow"><a class="scrollAnchor" href="#donate">Donate now</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12  col-md-12 col-sm-6 col-xs-12 section" id="ourMission">
			<h1 class="sectionHeader">Our Mission</h1>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12  col-md-12 col-sm-6 col-xs-12">
							<p>
								Paws is aimed at improving the quality of life of homeless and mistreated cats and dogs in rural areas.<br/>
								Our goal is to remove these animals from these harmful environments, rehabilitate them, and provide them
								with new loving and caring homes.<br/>
								In order to achieve this, we rely on donations from the public and local businesses. We raise these funds by
								hosting events such as walks in the park with the animals, fun runs, and general donation drives. These funds
								enable us to have the means to locate and retrieve these animals.<br/>
								We do this because we believe that our community work improves not only the life go the animal, but also
								gives humans the chance to experience the unconditional love a pet, by participating in our adoption program.<br/>
								We thereby create a happier, healthier and more caring space for every person and animal involved.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section" id="contactUs">
				<h1 class="sectionHeader">Contact Us</h1>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12  col-md-12 col-sm-6 col-xs-12">
							<ul>
								<li><img src="Images/man.png"/ class="icons">  AW Malan</li><br/>
								<li><img src="Images/mail.png"/ class="icons"><a href="mailto:elsmegan@gmail.com">  Email Us</a></li><br/>
								<li><img src="Images/location.png"/ class="icons">  Hatfield, Pretoria</li><br/>
								<li><img src="Images/phone.png"/ class="icons">  +2711-958-1169</li><br/>
								<li><img src="Images/clock.png"/class="icons">  9:00-21:00</li><br/>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section" id="donate">
				<h1 class="sectionHeader">Donate Now!</h1>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12  col-md-12 col-sm-6 col-xs-12">
							<h3>Project Paws</h3>
							<p>
								Bank: Nedbank<br/>
								Branch: NPO Pta<br/>
								Branch Code: 164822<br/>
								Account No: 1648946512<br/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	
</body>

</html>
