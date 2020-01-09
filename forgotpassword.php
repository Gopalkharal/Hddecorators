<?php error_reporting(0); ?>
<?php
include '../private/functions.php';
$msg='';
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    if(empty($username))
    {
        $msg="<div class='error'>Please Enter your Email</div>";

    }
    else if (username_exists($username,$conn))
   {
     $result=mysqli_query("SELECT password FROM admininfo WHERE username=username");
     $retrive=mysqli_fetch_array($result);
     $DOB=$retrive['dob'];
     if ($user=$DOB)
     {
         $pass=md5($password);
         mysqli_query($conn,"UPDATE users SET Password='$pass'");
         $msg1="password change successfully";
     }
   }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>forget Password</title>

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
    <div class='container'>
         <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php echo $error; ?>
            <form class="form-signin" action="forgotpassword.php" method="post">
 <h3 align="center">Forgot Password</h3><br>
   <div class ='form-group'>
    <label>Username</label>
    <input type="text"  name="username" class="form-control" placeholder="Username" required autofocus>
    <label>New password</label>
     <input type="password" id="inputPassword" name="new-password" class="form-control" placeholder="Enter your Password" required>
     <label>Re-Enter password</label>
     <input type="password" id="inputPassword" name="new-password" class="form-control" placeholder="Re-Enter Your  New Password" required>
     <button class="btn btn-lg btn-primary btn-block btn-resetin" type="submit">Reset Password</button>


    </div><!-- /container -->
    </body>
    </html>