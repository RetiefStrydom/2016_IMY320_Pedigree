<?php
include_once 'dbconnect.php';

$headline = $_POST['headline'];
$story = $_POST['story'];
$date = date();
$image = $_POST['image'];

$qry = "INSERT  INTO tbnews (headline,name,timestamp,image) VALUES ('$headline','$story','$date','$image')";
$result = mysql_query($qry);

if($result) {
	header("location:home.php");
}
else {
	$msg = "Oops something went wrong...";
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

	<div class="container-fluid title">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 heading">
				<?php
					if(!$result){
						echo "<h1 id='infoBanner'>" . $msg . "</h1>
								<h3><a href='index.php'>Try again...</a></h3>";
					}
					
				
				?>
			</div>
		</div>
	</div>
</body>

</html>