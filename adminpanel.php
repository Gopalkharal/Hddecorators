<?php error_reporting(0); ?>
<?php
session_start();
if(!$_SESSION['adminloggedin']){
	header("Location:admin.php");
}
if(isset($_POST['addservice'])){
				
				header("Location:addservice.php");
				
			}
			elseif(isset($_POST['removeservice'])){
				
				header("Location:removeservice.php");
				
			}
			elseif(isset($_POST['addportfolio'])){
				
				header("Location:addportfolio.php");
			
			}
			elseif(isset($_POST['removeportfolio'])){
				
				header("Location:removeportfolio.php");
				
			}
			elseif(isset($_POST['addabout'])){
				
				header("Location:addabout.php");
				
			}
			elseif(isset($_POST['removeabout'])){
				
				header("Location:removeabout.php");
				
			}
			elseif(isset($_POST['addteam'])){
				
				header("Location:addteam.php");
				
			}
			elseif(isset($_POST['removeteam'])){
				
				header("Location:removeteam.php");
				
			}
			elseif(isset($_POST['viewfeedback'])){
				
				header("Location:viewfeedback.php");
				
			}
			elseif(isset($_POST['changelogininfo'])){
				
				header("Location:changelogininfo.php");
				
			}
			



?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">

  </head>
  <body>
  		<div style="display:inline;margin-top:20px; margin-left:1000px; ">
  	<span class="logout" style="">
				<a href="adminpanel.php"><button class="btn btn-default">Admin Panel</button></a>
  		</span>
  	<span class="logout" style="">
				<a href="logout.php"><button class="btn btn-default">Log Out</button></a>
  		</spn>
  		</div>
 <div class="container" >
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"> Welcome to Admin Panel!! </p>
            <?php echo $error; ?>
            <form class="form-signin" action="adminpanel.php" method="post">
               <div class="form-group">
				<a href="#"><button class="btn btn-default" name="addservice">Add Service</button></a>
				</div>
				 <div class="form-group">
				<a href="#"><button class="btn btn-default" name="removeservice">Remove Service</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="addportfolio">Add portfolio</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="removeportfolio">Remove portfolio</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="addabout">Add About</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="removeabout">Remove About</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="addteam">Add Team</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="removeteam">Remove Team</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="viewfeedback">View Feedback</button></a>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="changelogininfo">Change Login Credentials</button></a>
				</div>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>