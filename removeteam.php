<?php error_reporting(0); ?>
<?php
	session_start();
	
    if($_SESSION['adminloggedin'])
	{
	include	'functions.php';  //connects to mysql server
	
		if (isset($_POST['removeteam'])) {
			$conn=connectdatabase();
			if($conn){
				$stmt=$conn->prepare("DELETE FROM team WHERE id=:id");
				$stmt->bindparam(':id',$_POST['teamid']);
				$result=$stmt->execute();
				disconnectdatabase($conn);
			//$result=pg_query_params($pdo,$query,array($category, $subcategory, $name, $specialdescription, $description, $price, $availability, $featured));
			if(!$result)
			{
				$error="something went wrong!!";
			}
			
				else {
					$error="Team Member Removed.";
				}
				}
			else{
	$error="Couldn't connect to database";
}
		}
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
            <p id="profile-name" class="profile-name-card"> Select Team Member to remove </p>
            <?php echo $error; ?>
            <form class="form-signin" action="removeteam.php" method="post">
            	<?php
            	if(isset($_POST["selectteam"]))
				{
					$conn=connectdatabase();
			if($conn){
				$stmt=$conn->prepare("SELECT * FROM team WHERE id=:id");
				$stmt->bindparam(':id',$_POST['team']);
				$result=$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$row= $stmt->fetch();
				disconnectdatabase($conn);
			//$result=pg_query_params($pdo,$query,array($category, $subcategory, $name, $specialdescription, $description, $price, $availability, $featured));
			if(!$result)
			{
				$error="something went wrong!!";
			}else {
					
					print "
					<select name='teamid' style='margin-bottom:1cm'>";
					print "<option value=".$row['id'].">".$row['name']."</option>";
					print "</select>
					<div class='form-group'>
				<label><b>Name</b></label>
				<p>".$row['name']."</p>
				</div>
				<div class='form-group'>
				<label><b>Role</b></label>
				<p>".$row['role']."</p>
				</div>
				<div class='form-group'>
				<label><b>Facebook Link</b></label>
				<p>".$row['pathtofacebook']."</p>
				</div>
				<div class='form-group'>
				<label><b>Twitter Link</b></label>
				<p>".$row['pathtotwitter']."</p>
				</div>
				<div class='form-group'>
				<label><b>Linkedin Link</b></label>
				<p>".$row['pathtolinkedin']."</p>
				</div>
				<div class='form-group'>
				<label><b>Image</b></label>
				<img src='".$row['pathtoimage']."' height='300' width='200'>
				</div>
				<div class='form-group'>
				<a href='#'><button class='btn btn-default' name='removeteam'>Remove Team</button></a>
				</div>";
					
					
				}
				}
else{
				$error="Couldn't connect to database";
				}
					
				}
			
				else {
				print "<div classs='form-group'>
				<select name='team' style='margin-bottom:1cm'>";
					
						
						$conn=connectdatabase();
						$stmt=$conn->prepare("SELECT id,name FROM team");
						$stmt->execute();
						$stmt->setFetchMode(PDO::FETCH_ASSOC);
						
						while ($row= $stmt->fetch()) { 
						print "<option value=".$row['id'].">".$row['name']."</option>";
						}
						disconnectdatabase($conn);
						
				print "</select>
				</div>
				<div class='form-group'>
				<a href='#'><button class='btn btn-default' name='selectteam'>Select Team</button></a>
				</div>";
				}
				?>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>