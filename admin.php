<?php error_reporting(0); ?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST' && !$_SESSION['adminloggedin'])
{
	if(!empty($_POST['username'])&&!empty($_POST['password']))
		{
			include	'functions.php';  //connects to mysql server
			$conn=connectdatabase();
			if($conn){
			$stmt=$conn->prepare("SELECT password FROM admininfo WHERE username=:username");
			$stmt->bindparam(':username',$_POST['username']);
			$stmt->execute();
			$passwd=$stmt->fetchcolumn();
			disconnectdatabase($conn);
			if(password_verify($_POST['password'],$passwd))
			{
				//creating the session
				$_SESSION['adminloggedin']=true;
				$error='';
			}
			else {
				
				$error='Username and password do not match.<br /> Please Try Again';
				
			}
		}
		}
	else{
		$error="Couldn't connect to database";
	}
			
}
if($_SESSION['adminloggedin']){
	header("Location:adminpanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JJInnovationNepal</title>

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
 <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php echo $error; ?>
            <form class="form-signin" action="admin.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <label>Username or Email</label>
                <input type="text"  name="username" class="form-control" placeholder="Enter your Username" required autofocus>

                <label>Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Enter Your Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
                

            </form><!-- /form -->
            
        </div><!-- /card-container -->

    </div><!-- /container -->
    </body>
    </html>