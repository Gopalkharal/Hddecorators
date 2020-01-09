<?php error_reporting(0); ?>
<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
      <title> Wholesaler PVC in Nepal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wholesaler PVC in Nepal">
    <meta name="author" content="The Best Wholeseller PVC in Nepal">
    <meta name="google-site-verification" content="8tHemCMO_Oc1LHgCUL6KoIgYgmzgs8_uLV6MPq6FjNQ" />
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118750867-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118750867-1');
</script>


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
    <link href="css/agency.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Mob :9843246450 </a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top">JJInnovationNepal</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in"></div>
          <div class="intro-heading text-uppercase"></div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#contact"> Contact Us </a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row text-center">
        <?php
        $conn=connectdatabase();
		$stmt=$conn->prepare("SELECT * FROM services");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row= $stmt->fetch()){
			print "<div class='col-md-4'>
            <span class='fa-stack fa-4x'>
            <img class='img-fluid' src=".$row['pathtoimage']." width='2420px' height='1260px'><br>

              <!--<img src='".$row['pathtoimage']."' style='width:400px; border-radius:80%;'>-->
            </span>
            <h4 class='service-heading'>".$row['servicename']."</h4><bR>
            <!---<p class='text-muted'>".$row['description']."</p>-->
          </div>";
		}
		disconnectdatabase($conn);
        ?>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
        	 <?php
        $conn=connectdatabase();
		$stmt=$conn->prepare("SELECT id,pathtoimage,clientname,category FROM projects");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row= $stmt->fetch()){
          print "<div class='col-md-4 col-sm-6 portfolio-item'>
            <a class='portfolio-link' data-toggle='modal' href='#portfolioModal".$row['id']."'>
              <div class='portfolio-hover'>
                <div class='portfolio-hover-content'>
                  <i class='fa fa-plus fa-3x'></i>
                </div>
              </div>
              <img class='img-fluid' src=".$row['pathtoimage']." width='300px' height='200px'>
            </a>
            <div class='portfolio-caption'>
              <h4>".$row['clientname']."</h4>
              <p class='text-muted'>".$row['category']."</p>
            </div>
          </div>";
          }
			disconnectdatabase($conn);
			?>
          
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
            	 <?php
        $conn=connectdatabase();
		$stmt=$conn->prepare("SELECT * FROM about");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row= $stmt->fetch()){
              print "<li>
                <div class='timeline-image'>
                  <img class='rounded-circle img-fluid' src=".$row[pathtoimage]." alt=''>
                </div>
                <div class='timeline-panel'>
                  <div class='timeline-heading'>
                    <!--<h4>".$row['time']."</h4>-->
                    <h4 class='subheading'>".$row['shortdescription']."</h4>
                  </div>
                  <div class='timeline-body'>
                    <p class='text-muted'>".$row['description']."</p>
                  </div>
                </div>
                 </li>";
                if($row=$stmt->fetch()){
             print "
              <li class='timeline-inverted'>
               <div class='timeline-image'>
                  <img class='rounded-circle img-fluid' src=".$row[pathtoimage]." alt=''>
                </div>
                <div class='timeline-panel'>
                  <div class='timeline-heading'>
                    <h4>".$row['time']."</h4>
                    <h4 class='subheading'>".$row['shortdescription']."</h4>
                  </div>
                  <div class='timeline-body'>
                    <p class='text-muted'>".$row['description']."</p>
                  </div>
                </div>
              </li>";
			  }
              }
              disconnectdatabase($conn);
              ?>
             
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                    <br>Of Our
                    <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
        	 <?php
        $conn=connectdatabase();
		$stmt=$conn->prepare("SELECT * FROM team");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row= $stmt->fetch()){
         print "<div class='col-sm-4'>
            <div class='team-member'>
              <img class='mx-auto rounded-circle' src=".$row['pathtoimage']." alt=''>
              <h4>".$row['name']."</h4>
              <p class='text-muted'>".$row['role']."</p>
              <ul class='list-inline social-buttons'>
                <li class='list-inline-item'>
                  <a href=https://".$row['pathtotwitter'].">
                    <i class='fa fa-twitter'></i>
                  </a>
                </li>
                <li class='list-inline-item'>
                  <a href=".$row['pathtofacebook'].">
                    <i class='fa fa-facebook'></i>
                  </a>
                </li>
                <li class='list-inline-item'>
                  <a href=https://".$row['pathtolinkedin'].">
                    <i class='fa fa-linkedin'></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>";
		}
		disconnectdatabase($conn);
		?>
         
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted"></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
            </a>
            <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="" alt="">
              </a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center">
            <h1 class="section-heading text-uppercase"> Call Us</h1>
            <h4 class="section-heading text-uppercase"> 9843246450</h4>
            
            <h3 class="section-subheading text-muted"></h3>
          </div>
          <div class="col-lg-6 text-center">
            <h2 class="section-heading text-uppercase"> </h2>
            <h4 class="section-heading text-uppercase"> </h4>
            <h3 class="section-subheading text-muted"></h4>
           <h3 class="section-subheading text-muted">  <br>
            Address: Chitwan,Nepal<br>
           Opening Hours:10 AM-5 PM <br>
           </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-xs-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6 col-xs-12">

           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d742.7339567823495!2d85.32677682058078!3d27.68460146786044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1516214915793" width="520" height="250" frameborder="0" style="border:0 margin-right:40px;" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; JJInnovationNepal 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://www.facebook.com/JJInnovation-280442935830660/">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/JJInnovation-280442935830660/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/JJInnovation-280442935830660/">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 --> <?php
        $conn=connectdatabase();
		$stmt=$conn->prepare("SELECT * FROM projects");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		while($row= $stmt->fetch()){
	print "<div class='portfolio-modal modal fade' id='portfolioModal".$row['id']."' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='close-modal' data-dismiss='modal'>
            <div class='lr'>
              <div class='rl'></div>
            </div>
          </div>
          <div class='container'>
            <div class='row'>
              <div class='col-lg-8 mx-auto'>
                <div class='modal-body'>
                  <!-- Project Details Go Here -->
                  <h2 class='text-uppercase'>".$row['projectname']."</h2>
                  <p class='item-intro text-muted'>".$row['shortdescription']."</p>
                  <img class='img-fluid d-block mx-auto' src=".$row['pathtoimage'].">
                  <p>".$row['description']."</p>
                  <ul class='list-inline'>
                    <li>Date:".$row['date']."</li>
                    <li>Client: ".$row['clientname']."</li>
                    <li>Category:".$row['category']."</li>
                  </ul>
                  <button class='btn btn-primary' data-dismiss='modal' type='button'>
                    <i class='fa fa-times'></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    }
    disconnectdatabase($conn);
	?>
   
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
