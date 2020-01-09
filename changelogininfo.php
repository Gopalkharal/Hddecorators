<?php error_reporting(0); ?>
<?php
	session_start();
	$_SESSION['adminloggedin']=true;

    if($_SESSION['adminloggedin'])
	{
	if (isset($_POST['apply'])) {
			if($_POST['newpassword1']==$_POST['newpassword2']){
			include	'functions.php';  //connects to mysql server
			$conn=connectdatabase();
			if($conn){
			$stmt=$conn->prepare("SELECT password FROM admininfo WHERE username=:username");
			$stmt->bindparam(':username',$_POST['username']);
			$stmt->execute();
			$passwd=$stmt->fetchcolumn();
			disconnectdatabase($conn);
//			if(password_verify($_POST['password'],$passwd))
//			{
				$conn=connectdatabase();
				$stmt=$conn->prepare("DELETE FROM admininfo WHERE username=:username");
			$stmt->bindparam(':username',$_POST['username']);
			$stmt->execute();
			disconnectdatabase($conn);
			$conn=connectdatabase();
			$newpasswd=password_hash($_POST['newpassword1'], PASSWORD_DEFAULT);
			$stmt=$conn->prepare("INSERT INTO admininfo (username, password) VALUES (:username, :password)");
			$stmt->bindparam(':username',$_POST['newusername']);
			$stmt->bindparam(':password',$newpasswd);

			$result=$stmt->execute();
			//$result=pg_query_params($pdo,$query,array($category, $subcategory, $name, $specialdescription, $description, $price, $availability, $featured));
			if(!$result)
			{
				$error="something went wrong!!";
			}

				else {
					$error="Changes Applied.";
					$_SESSION['adminloggedin']=FALSE;
					header("Location:admin.php");
				}
//			}

		//	else {

				$error='Username and password do not match.<br /> Please Try Again';

			}
	//		disconnectdatabase($conn);
	//			}

else{
	$error="Couldn't connect to database";
}
}
	else{
		$error="Password's don't match!!";
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
 <div class="container" style="font-size:14;">
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"> Fill out the following fields </p>
            <?php echo $error; ?>
            <form class="form-signin" action="changelogininfo.php" method="post">
				<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Old Username" >
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="newusername" placeholder="New Username" >
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Old Password" >
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="newpassword1" placeholder="New Password" >
				</div>
				<div class="form-group">
				<input type="password" class="form-control" name="newpassword2" placeholder="Verify New Password" >
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="apply">Apply</button></a>
				</div>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>
