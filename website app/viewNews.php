<?php
// session_start();
// include_once 'dbconnect.php';


// $query = mysql_query("SELECT * FROM tbusers WHERE password='$password' AND name='$name'");
// $rows = mysql_num_rows($query);
// if ($rows == 1) {
//   $_SESSION['userName']=$name; 
//   //header("location: profile.php");
// }

// if($_SESSION['type'] == 'Admin'){
//     echo "Admin logged in: ". $name;
// } else 
//     echo "Admin not logged in. Only admin can edit/add news.";
//     //header("location: index.php");

?>
<?php
  session_start();
  
  include_once 'dbconnect.php';
  
  if ( isset($_SESSION['userName'])!="" ) {
    $name = $_SESSION['userName'];
    $type = $_SESSION['type'];
    
    $qry = "SELECT * FROM tbnews";
    $result = mysql_query($qry);
    //echo $result;
    
    if(mysql_num_rows($result) > 0) {
      $news = true;
      //echo $news;
      $msg = "found";
      while($row = mysql_fetch_assoc($result)){
        $rowNews[] = $row;
      }
    }
    else{
      $news = false;
      $msg = "not found";
    }
  }
  else {
    $name = "Guest";
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
      $("#deleteEventModal").modal("hide");
      $("#editEventModal").modal("hide");
      
      $("#editEventModal form #selectCategory").change(function() {
        $("#editEventModal form .alter").hide();
        
        var category = $("#editEventModal form #selectCategory").val();
        
        switch(category){
          case "name": $("#editEventModal form .alter #alterInput").attr("type","text"); break;
          case "description": $("#editEventModal form .alter #alterInput").attr("type","textarea"); break;
          case "date": $("#editEventModal form .alter #alterInput").attr("type","date"); break;
          case "image": $("#editEventModal form .alter #alterInput").attr("type","file"); break;
          default: $("#editEventModal form .alter #alterInput").attr("type","text");
        };
        $("#editEventModal form .alter").show();
      });
      
      $("#user").on("click", function(e) {
        e.preventDefault();
        
        $("#adminNav").show();
      });
      
      $("#remove").on("click", function(e) {
        e.preventDefault();
        $("#deleteEventModal").modal("show");
      });
      
      $("#edit").on("click", function(e) {
        e.preventDefault();
        $("#editEventModal").modal("show");
      });
      
      $(".removeEventForm").submit(function() {
        if(confirm("Are you sure you wish to delete this event?")) {
          return true;
        }
        else{
          return false;
        }
      });
      
      $(".editEventForm").submit(function() {
        if(confirm("Are you sure you wish to edit this event?")) {
          return true;
        }
        else{
          return false;
        }
      });
    });
  </script>
</head>

<body>
  <div class="container-fluid main">
    <div class="row userDetails">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div style="padding-bottom: 20px;padding-top: 20px;"class='row navbar-left' id='mainLogo'>
          <div  class='col-md-12 col-sm-12 col-xs-12'>
          <a href="home.php"><img style="width: 25%;"class="image image-responsive grow" src='Logo/trans_logo.png'/></a>
          </div>
        </div>
      </div> 
      <br>
        <p style="padding-top: 50px;text-align:right;" >Logged in as <a href="#" id="user"><?php echo $name ?></a></p> 
    </div>
      <div class="row" id="adminNav">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <p><a href="editEvents.php">Edit Events</a></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <p><a href="#">Edit Admins</a></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <p><a href="logout.php">Logout</a></p>
        </div>
      </div>
      <!-- <div class="row" id="mainLogo">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <a href="home.php"><img class="image image-responsive grow" src='Logo/mainLogo.png'/></a>
        </div>
      </div> -->
    </div>
  </div>

  <!-- add news form -->
  <div class="container-fluid content">
    <div class="row" id="eventsPanel">
      <div class="panel-group">
         <div class="panel-heading"><h1>News:</h1><a class="pull-right" href="#" id="edit">Edit</a><span class="pull-right"> | </span><a class="pull-right" href="#" id="remove">Delete</a></div>
        <div class="panel panel-default">
           <div class="panel-heading"><h3>News:</h3></div>
          
         
              <?php
              if($news) {
                foreach($rowNews as $news)
                {
                echo 
                "<div class = 'col-md-4'>
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
        <div class="panel panel-default">
         
          <div class="panel-body">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
      <p align="center">&copy; 2016 - PAWS - All rights reserved</p>
</footer>
</html>
