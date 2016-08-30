<!DOCTYPE html>

<html lang="en">

<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Libraries/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="Libraries/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container-fluid aboutAnchors">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a href="#ourMission">Our Mission</a></h4>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 item">
				<h4 class="grow"><a href="#contactUs">Contact Us</a></h4>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
	
		<div class="row" id="ourMission">

			<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">

			<h1>Our Mission</h1>

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
		
		<div class="row" id="contactUs">
			<div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
				<h1>Contact Us</h1>
			
		
				<form id="contact-form" method="post" action="contact.php" role="form">
			
					<div class="form-group">
						<label for="form_name">Firstname</label>
						<input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname" required="required" data-error="Firstname is required.">
						<div class="help-block with-errors"></div>
					</div>
				
					<div class="form-group">
						<label for="form_lastname">Lastname</label>
						<input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname" required="required" data-error="Lastname is required.">
						<div class="help-block with-errors"></div>
					</div>
				
					<div class="form-group">
						<label for="form_email">Email</label>
						<input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email" required="required" data-error="Valid email is required.">
						<div class="help-block with-errors"></div>
					</div>
				
					<div class="form-group">
						<label for="form_phone">Phone</label>
						<input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
						<div class="help-block with-errors"></div>
					</div>
				
					<div class="form-group">
						<label for="form_message">Message</label>
						<textarea id="form_message" name="message" class="form-control" placeholder="Your message " rows="4" required="required" data-error="Please,leave us a message."></textarea>
						<div class="help-block with-errors"></div>
					</div>
			
					<div class="form-group">
						<input type="submit" id="btn" class="btn btn-success btn-send" value="Send message">
					</div>
				</form>
			</div>
		</div>ß
	</div>
    
	<script src="validator.js"></script>
	<script src="contact.js"></script>

</body>

</html>
