<?php
// Start the session
session_start();


 $servername = "zebra";
$username = "shaniru";
$password = "sbbzL9TnK^1Y";
$dbname = "shaniru_Drugs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 


?>

<!DOCTYPE html>
<html lang="en">

    
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SmartMed</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    
   <link rel="stylesheet" href="css/foofoo.css">
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
              <a class="nav-link">hello
              <?php
              if( !isset($_SESSION['currentName']) ){
                            echo "user";
                            }
                else
                echo $_SESSION['currentName'];
              ?>
              
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="YourAccount.php">My Account</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Contact us.php">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>SmartMed</h1>
              <span class="subheading">Your Friendly Neighborhood Pill Reminder</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            
        
	 <div class="post-preview" style=float:left;width:40%;>
	     
        <form action="index.php" method="POST">
	    <div class="input-group">
	    <div class="form-group floating-label-form-group controls">
		<label>Box Id</label>
		<input type="number" name="DeviceId" placeholder="Box serial number" required>
	</div>
	</div>
	<div class="input-group">
	    <div class="form-group floating-label-form-group controls">
		<label>Email</label>
		<input type="email" name="Email" placeholder="Email" required>
	</div>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="submit">Log In</button>
	</div>
	    </form>
	    
	    
	 <form action=# method="GET">
			 <div>
              <div class="form-group floating-label-form-group controls">
                <label>Box Serial number</label>
                <input type="number" class="form-control" placeholder="Box Serial number" id="BoxSerialNumber" name="DeviceId"  required data-validation-required-message="Please enter your Deivce id.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" required data-validation-required-message="Please enter your email address.">
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
		 
         <div class="post-preview" style=float:right;width:60%;>
			<p> SmartMed Helps you take medication in an orderly manner,<br>
			it will remind you of the medications and inform your contact of current updates.</p>
		  </div>	
          
      </div>
    </div>



<?php
if ($_GET)
{
    $newBoxID = $_GET['DeviceId'];
    $newName = $_GET['FullName'];
    $newEmail = $_GET['email'];

    $ValidationIDsql = "SELECT * FROM Users WHERE DeviceID='$newBoxID'";
			$ChekingValidResult = $conn->query($ValidationIDsql);
	        	if ($ChekingValidResult->num_rows > 0) {
					    $message = "this device is already exists";
                    echo "<script type='text/javascript'>alert('$message');</script>";
			} 
			else{
			     $sqlInsertNewUser="INSERT INTO Users (DeviceID, Name, Email) VALUES ($newBoxID,'$newName','$newEmail')";
$resultInsertNewUser = $conn->query($sqlInsertNewUser);

      if($resultInsertNewUser){
          	echo "Welcome to SmartMed! <br>";
      }
      else
      echo "Something got wrong, please try again";
      
      for($i=1;$i<=7;$i++)
      {
         $sqlInsertNewCells="INSERT INTO Cell (CellID, PillAmount, IfEmpty,DeviceID) VALUES ($i,0,1,$newBoxID)";
            $resultInsertNewCells = $conn->query($sqlInsertNewCells);
      }
          
      }

}

			



    if ($_POST){ 
        
       // include_once 'dbl.inc.php';
        	$user_box = $_POST['DeviceId'];
            $user_email = $_POST['Email'];
			$ChekingDatasql = "SELECT * FROM Users WHERE Email = '$user_email' AND DeviceID='$user_box'";
			echo "getting the query";
			echo "<br>";
			$ChekingDataResult = $conn->query($ChekingDatasql);
	        	if ($ChekingDataResult->num_rows < 1) {
					    $message = "One or more of the details is not correct";
                    echo "<script type='text/javascript'>alert('$message');</script>";
				exit();
			} 
			
			
				else {
				    $row = $ChekingDataResult->fetch_assoc();
                    //correct information
					$_SESSION['currentDeviceId'] = $row['DeviceID'];
					$_SESSION['currentName'] = $row['Name'];
					$_SESSION['CurrentEmail'] = $row['Email'];
					
					echo "name is ".$_SESSION['currentDeviceId'];
					echo "<br>";
					echo "name is ".$_SESSION['currentName'];
					echo "<br>";
					echo "name is ".$_SESSION['CurrentEmail'];
					echo "<br>";					
				}
				}    

?>
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
            <p class="copyright text-muted">Copyright &copy; SmartMed team 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

    <script>
  /*  function myFunction() {
    window.open("http://shaniru.mtacloud.co.il/signin_test.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=300,height=300");
    }*/
    </script>
  </body>

</html>
