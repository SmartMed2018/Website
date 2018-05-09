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
    
    <script>
        function  logout(){
window.location='logout2.php';
            
                }
        
    </script>
    
        <style>
     @media only screen and (max-width:992px) {
    /* For tablets: */
  #sub{
	  display:none;
  }

 }
 </style>
  </head>

  <body>

        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
      
              
            <li class="nav-item">
              <a class="nav-link" >hello
              <?php
              

              if( !isset($_SESSION['currentName']) ){
                            echo "user";
                            }
                else{
                echo $_SESSION['currentName'];
                ?>
                <button type="button" class = "btn-primary btn-sm" style= "text-font: 12px" onClick="logout()">Log Out</button>
                <?php
                } 
                ?>

              </a>
            </li>
            </ul>
            
            <ul class= "navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign in</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" id = "account" href="YourAccount.php">My Account</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("account").style.display = "none";
                        </script>
                    <?php
                            }

              ?>
              
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Contact us.php">Contact us</a>
            </li>
            
          </ul>
           <ul class= "navbar-nav ml-auto">
               </ul>
                          <ul class= "navbar-nav ml-auto">
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
              <span class="subheading" id="sub">Your Friendly Neighborhood Pill Reminder</span>
            </div>
          </div>
        </div>
      </div>
    </header>

 
		 
         <div class="post-preview text-center" >
			<p><b><cetner> SmartMed Helps you take medication in an orderly manner,<br>
			it will remind you of the medications and inform your contact of current updates.</center></b></p>
			
			<img src= "https://medqpillbox.com/wp-content/uploads/2017/10/pill-box-with-flashing-play-1-1.gif" alt="SmardMed device" height="300" width=300" class="img-rounded"> <br><br>
			<b><p><center>What are our goals?</center></p></b>
        <div class="container">
        <div class="row">
           <div class="col-md-3">  Reduce medication discontinuation </div>
           <div class="col-md-3"> Allow the contact to monitor the taking of drugs, the stock of pills and the treatment of a common case. </div>
            <div class="col-md-3"> Improve the life of taking medication </div>
            <div class="col-md-3"> Allow the drug user a free life without thinking about the common use of medications </div>
            <br><br>


		  </div>	
             <p><b> <center>How It Works?</center></b></p>
             Buy a "SmartMed" device at the pharmacies. <br>
Connect to the site using the ID number that appears behind the device.<br>
Add medications and alerts, keep track of the medication. <br>
Get alerted on the device on time to take a ball. <br>
After taking the ball, push the button so everyone knows that the ball is taken and no one will worry! <br>

  <p> <b><center>What is special about us?</center></b></p>
        <div class="row">
         <div class="col-md-3">When an alert is added, a check is conducted with the international drug store to prevent the taking of parallel drugs that are dangerous to take together.</div>
       <div class="col-md-3">  Managing inventory through the website, receiving updates to the email if the medication is about to run out.</div>
        <div class="col-md-3"> An update on non-taking if the drug was not taken for half an hour.</div>
        <div class="col-md-3"> A friendly, small and comfortable device.</div>
        </div>
        
             <b> <p><center>About us</center></p></b>
         <div class="row">
               <div class="col-md-4">Ido Keynan <br> Student Information Systems at Tel Aviv University, wears tabula socks .</div>
                <div class="col-md-4">Shani Reuveni <br> Student Information Systems at Tel Aviv University, PMO IT - "Strauss Water" Company.</div>
                 <div class="col-md-4">Adam Kobo <br> Student Information Systems at Tel Aviv University, </div>
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
