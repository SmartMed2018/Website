

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartMed - sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    
  </head>


  <body>

    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php" ><img src="img/logo.png" height= 80 px; width= 300px; style=" top: 0; left:0; position: absolute" alt= "SmartMed logo"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="YourAccount.php">Account</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Contact us.php">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/pill2.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Sign in</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
    
    
    <div data-role="main" class="ui-content">
        
        <?php
        if(isset($_SESSION['u_box'])) {
            echo "You are logged in!";
        }
        ?>
        
        <?php
            if (isset($_SESSION['u_box'])){
                echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit name="submit">Logout</button></form>';
            }
            
                
                /* else {
                echo '<form action="includes/login.inc.php" method="POST">
			 <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Box Serial number</label>
                <input type="number" class="form-control" placeholder="Box Serial number" id="BoxSerialNumber" name="DeviceId"  required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="Email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
                </div>
            </div>
			<input type="submit" name="submit" value="Log in"><br><br>
			</form>';}
            */
            
            ?>
        
   <!-- Signup -->      
        <form action="includes/signup.inc.php" method="POST">
			 <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Box Serial number</label>
                <input type="number" class="form-control" placeholder="Box Serial number" id="BoxSerialNumber" name="DeviceId"  required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="Email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
    
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" id="name" name="FullName" required data-validation-required-message="Please enter your Full name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<input type="submit" name="submit" value="Sign up"><br><br>
		</form>
		

      
			
    </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; SmartMed team 2018</p>          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
