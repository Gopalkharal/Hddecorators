<?php error_reporting(0); ?>
<?php
	session_start();
	
    if($_SESSION['adminloggedin'])
	{
	if (isset($_POST['addportfolio'])) {
			
			
			if( empty($_POST['name']) || empty($_POST['description']) || empty($_POST['shortdescription']) ){
				$error="Portfolio not Added. <br />All fields are mandatory.";
			}
			elseif(!empty($_FILES['picture']['error']) || empty($_FILES['picture'])){
				$error="Image Upload Failed.";
			}	
			else{
		include	'functions.php';  //connects to mysql server
			$conn=connectdatabase();
			if($conn){
				$stmt=$conn->prepare("SELECT MAX(id) FROM projects");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$row= $stmt->fetch();
				$currentid=$row['MAX(id)'];
				$path = $_FILES['picture']['name'];
				$ext = pathinfo($path);
				$newfilename = $currentid.'.'.$ext['extension'];
				$destination="img/portfolio/project" . $newfilename;
				move_uploaded_file($_FILES["picture"]["tmp_name"],$destination);
				$stmt=$conn->prepare("INSERT INTO projects (projectname, shortdescription, description, pathtoimage, date, clientname, category) VALUES (:projectname, :shortdescription, :description, :pathtoimage, :date, :clientname, :category)");
				$stmt->bindparam(':projectname',$_POST['name']);
				$stmt->bindparam(':shortdescription',$_POST['shortdescription']);
				$stmt->bindparam(':description',$_POST['description']);
				$stmt->bindparam(':pathtoimage',$destination);
				$stmt->bindparam(':date',$_POST['date']);
				$stmt->bindparam(':clientname',$_POST['clientname']);
				$stmt->bindparam(':category',$_POST['category']);
				$result=$stmt->execute();
			//$result=pg_query_params($pdo,$query,array($category, $subcategory, $name, $specialdescription, $description, $price, $availability, $featured));
			if(!$result)
			{
				$error="something went wrong!!";
			}
			
				else {
					$error="Service Added.";
				}
				}
			
else{
	$error="Couldn't connect to database";
}
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
            <p id="profile-name" class="profile-name-card"> Please fill out the following form!! </p>
            <?php echo $error; ?>
            <form class="form-signin" action="addportfolio.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="Project Name" >	
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="clientname" placeholder="Client Name" >	
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="category" placeholder="Category" >	
				</div>
				<div class="form-group">
				<input type="text" class="form-control" name="date" placeholder="Date" >	
				</div>
				<div class="form-group">
				<textarea class="form-control" rows='4' cols="50" name="shortdescription">Short Description</textarea>
				</div>
				<div class="form-group">
				<textarea class="form-control" rows='4' cols="50" name="description" >Description</textarea>	
				</div>
				<div class="form-group">
				<input type="hidden" name="MAX_FILE_SIZE" value="83886080" >
				<label> Select Image </label>
				<input type="file" class="form-control" name="picture" accept="image/*">	
				</div>
				<div class="form-group">
				<a href="#"><button class="btn btn-default" name="addportfolio">Add Portfolio</button></a>
				</div>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>