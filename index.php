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
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <!--
      
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    -->


    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
   
     <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
   <link rel="stylesheet" href="css/loginForm.css">
   <link rel="stylesheet" href="css/indexStl.css">
    
    
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
                            echo "GUEST";
                echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
                    ';
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
              <a class="nav-link" href="index.php">Smartmed</a>
            </li>
            
            
           <li class="nav-item">
              <a class="nav-link" id = "ana" href="AddAlert.php">Add New alert</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("ana").style.display = "none";
                        </script>
                    <?php
                            }

              ?>
              
            </li>
            
             <li class="nav-item">
              <a class="nav-link" id = "amount" href="Amount.php">Check amount</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("amount").style.display = "none";
                        </script>
                    <?php
                            }

              ?>
              
            </li>
            
             <li class="nav-item">
              <a class="nav-link" id = "tracking" href="Tracking.php">Tracking stats</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("tracking").style.display = "none";
                        </script>
                    <?php
                            }

              ?>
              
            </li>
            
             <li class="nav-item">
              <a class="nav-link" id = "manage" href="ManageMedicine.php">Manage medicine</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("manage").style.display = "none";
                        </script>
                    <?php
                            }

              ?>
              
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
              
            </div>
          </div>
        </div>
      </div>
    </header>

        <h1 class = "stl1">SmartMed</h1>
			
        <div class="container">
            
            <p style="text-align: left;"><b> SmartMed, The new smart pill taking system that Helps you<br> take medication in an orderly manner,<br>
			smartmed will let you know when its medication taking time<br> and inform your contact of current updates.</b></p>
			
			<img src= "https://medqpillbox.com/wp-content/uploads/2017/10/pill-box-with-flashing-play-1-1.gif" alt="SmardMed device" height="200" width="250" class="img1"> <br>
			<hr>
        
     <div class="panel-group">
     
    <div class="panel panel-primary">
      <div class="panel-heading" id="stl2">What are our goals?</div>
      <div class="panel-body">
      <div class="col-md-65">  
        +Reduce medication discontinuation<br>
        +Enable drug tracking and inventory management<br>
        +Improve the patient life<br>
        +Allows the patient a worry-free day regarding his or her medications. </div>
          </div>
        </div>
       </div>  
       
       <hr>
            <div class="panel panel-primary">

      <div class="panel-heading" id="stl2">How does it work?</div>
      <div class="panel-body " style= "text-align:left">
      <i style="font-size:20px" class="fa">&#xf0fe;</i>
      Buy a "SmartMed" device at the pharmacies. <br>
      <i style="font-size:20px" class="fa">&#xf0fe;</i>
Connect to the site using the ID number that appears behind the device.<br>
<i style="font-size:20px" class="fa">&#xf0fe;</i>
Add medications and alerts, keep track of the medication. <br>
<i style="font-size:20px" class="fa">&#xf0fe;</i>
Get alerted on the device itself when it the time to take the pill. <br>
<i style="font-size:20px" class="fa">&#xf0fe;</i>
After taking the pill, press the button so everyone will know that the pill was taken and no one will be worried!<br>
      
      </div>
    </div>
<hr>

    <div class="panel panel-primary">
      <div class="panel-heading" id="stl2">What makes us so special?</div>
      <div class="panel-body">
      
      <div class="col-md-6">+ An automatic test during adding a alert is being conducted with the US National Library of Medicine to prevent the taking of medicines that should not be taken together. </div>
           <div class="col-md-6">+ Managing inventory through the website, receiving email notifications if the medication is about to run out. </div>
            <div class="col-md-6">+ sending an email notification if the medicine was not taken 30 minutes after the alert</div>
            <div class="col-md-6">+ A friendly, small and comfortable device. Easy to use for all ages</div>
      
      </div>
    </div>
    
    <hr>

    <div class="panel panel-primary">
      <div class="panel-heading" id="stl2">About the initiators </div>
      <center><div class="panel-body">
      
      <div id="b"><b>Ido Keynan</b><br>I.S Student at MTA<br> Segmentation Specialist- Taboola   </div>
      <div id="b"><b>Shani Reuveni</b><br>
           I.S Student at MTA<br> PMO IT - Strauss Water</div>
      <div id="b"><b>Adam Kobo</b><br>
            I.S Studentat MTA<br> QA Engineer - Hola </div>

      
      </div>
      </center>
    </div>
       </div> 
        
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- login -->
      <div class="modal-body">
      <div class="form">
      
      <ul class="tab-group">
        <li class="tab "><a href="#login">Log In</a></li>
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          
          <form action="/index.php" method="get">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Device Id<span class="req">*</span>
              </label>
              <input type="text" name="DeviceId" min="1000" max="100000" required data-validation-required-message="Please enter your Deivce id." required autocomplete="off" />
            </div><br>
        
            <div class="field-wrap">
              <label>
                Email<span class="req">*</span>
              </label>
              <input type="email" name="Email" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Full Name<span class="req">*</span>
            </label>
            <input type="text" name="FullName"required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Sign up</button>
          </form>

        </div>
        
        <div id="login">   
          
          <form action="/index.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="Email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Device ID<span class="req">*</span>
            </label>
            <input type="text" name="DeviceId" required autocomplete="off"/>
          </div>
                    
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
	    </div>
	 </div>
	 </div>
		              </div>
		                            </div>

    </div>
    </div>
    </div>

  </div>
</div>


<?php
if ($_GET)
{
    $newBoxID = $_GET['DeviceId'];
    $newName = $_GET['FullName'];
    $newEmail = $_GET['Email'];
//ולידציה אם יש מכשיר כזה בכלל
    $ValidationIfExistsql = "SELECT * FROM Device WHERE DeviceID='$newBoxID'";
    $ValidationIfExistsResult = $conn->query($ValidationIfExistsql);
	if ($ValidationIfExistsResult->num_rows == 0) {
					    $message = "This Device id does not exists";
             echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il'</script>";
				exit();
			}

    else{
//ולידציה אם המכשיר כבר קיים
    $ValidationIDsql = "SELECT * FROM Users WHERE DeviceID='$newBoxID'";
			$ChekingValidResult = $conn->query($ValidationIDsql);
	        	if ($ChekingValidResult->num_rows > 0) {
					    $message = "This device is already exists";
             echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il'</script>";
				exit();
			} 
			else{
			     $sqlInsertNewUser="INSERT INTO Users (DeviceID, Name, Email) VALUES ($newBoxID,'$newName','$newEmail')";
                $resultInsertNewUser = $conn->query($sqlInsertNewUser);

      if($resultInsertNewUser){
                for($i=1;$i<=7;$i++){
                     $sqlInsertNewCells="INSERT INTO Cell (CellID, PillAmount, IfEmpty,DeviceID) VALUES ($i,0,1,$newBoxID)";
                    $resultInsertNewCells = $conn->query($sqlInsertNewCells);
            }
					    $message = "Welcome to SmartMed!";
             echo "<script type='text/javascript'>alert('$message');</script>";
      }
      
      else{
			 $message = "Something went wrong";
             echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il'</script>";
				exit();      
         }
 
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
             echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il'</script>";
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
					header("Location: ./index.php");
					
				}
				}    

?>
    <hr>

    <!-- Footer -->
          <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/home">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.facebook.com/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/orgs/SmartMed2018/dashboard">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">For contact: noreply.smartmed@gmail.com <br> Copyright &copy; SmartMed team 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
        <!-- File to handle Navigation on login modal -->
        <script  src="js/loginForm.js"></script>

    <script>
  /*  function myFunction() {
    window.open("http://shaniru.mtacloud.co.il/signin_test.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=300,height=300");
    }*/
    </script>
  </body>

</html>
