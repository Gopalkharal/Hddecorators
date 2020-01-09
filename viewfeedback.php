<?php error_reporting(0); ?>
<?php
	session_start();
	
    if($_SESSION['adminloggedin'])
	{
		include '../private/functions.php';
	
	}
			

else{
	header("Location:admin.php");
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
 <div class="container">
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"> Select Feedback to View </p>
            <?php echo $error; ?>
            <form class="form-signin" action="viewfeedback.php" method="post">
				<div classs='form-group'>
				<select name='about' style='margin-bottom:1cm'>
					<?php
						
						$conn=connectdatabase();
						$stmt=$conn->prepare("SELECT id,name FROM feedback");
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row= $stmt->fetch()) { 
						print "<option value=".$row['id'].">".$row['name']."</option>";
						}
						disconnectdatabase($conn);
						?>
				</select>
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="viewfeedback">View Feedback</button></a>
				</div>
				<?php
				if (isset($_POST['viewfeedback'])) {
					$conn=connectdatabase();
					if($conn){
				$stmt=$conn->prepare("SELECT * FROM feedback WHERE id=:id");
				$stmt->bindparam(':id',$_POST['about']);
				$result=$stmt->execute();
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$row= $stmt->fetch();
				print "<div class='form-group'>
				<label><b>Name</b></label>
				<p>".$row['name']."</p>
				</div>
				<div class='form-group'>
				<label><b>Phone No</b></label>
				<p>".$row['phoneno']."</p>
				</div>
				<div class='form-group'>
				<label><b>Email</b></label>
				<p>".$row['email']."</p>
				</div>
				<div class='form-group'>
				<label><b>Message</b></label>
				<p>".$row['message']."</p>
				</div>";
					
					disconnectdatabase($conn);
}
				}
				?>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>