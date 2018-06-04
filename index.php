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
        i{color:#17a2b8};
     @media only screen and (max-width:992px) {
    /* For tablets: */
  #logo, #space1 , #space2{
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
            <div>
              <a class="nav-link"  href="index.php"><img src="img/logo2.png" height="80%" width="250px" id = "logo" top="6px" poisition= fixed left = "0px" alt="SmartMed logo" ></a>  
            </div>
              
              </li>
              
             <li class="nav-item" id = "space1">
                 <a class="nav-link">
         &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  </a>
               <?php
              if( isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("space1").style.display = "none";
                        </script>
                    <?php
                            }
              ?>
              
            </li>
            
                          <li class="nav-item" id = "space2">
           &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
               <?php
              if( isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("space2").style.display = "none";
                        </script>
                    <?php
                            }
              ?>
              
            </li>        
            
           <li class="nav-item">
              <a class="nav-link" id = "AddAlert" href="AddAlert.php">Add New Alert</a>
               <?php
              if( !isset($_SESSION['currentName']) ){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("AddAlert").style.display = "none";
                        </script>
                    <?php
                            }
              ?>
              
            </li>
            
             <li class="nav-item">
              <a class="nav-link" id = "amount" href="Amount.php">Check Amount</a>
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
              <a class="nav-link center" id = "tracking" href="Tracking.php">Tracking Status</a>
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
              <a class="nav-link" id = "manage" href="ManageMedicine.php">Manage Medicines</a>
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
            
                        <li class="nav-item" >
              <a class="nav-link"  >Hello
              <?php
              
              if( !isset($_SESSION['currentName']) ){
                            echo "Guest";
                echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
                    ';
                            }
                else{
                echo $_SESSION['currentName'];
                ?>
                <button type="button" class = "btn btn-info btn-lg" style= "text-font: 12px"  onClick="logout()">Log Out</button>
                <?php
                } 
                ?>

              </a>
            </li>
            </ul>
            
        </div>
      </div>
    </nav>
    
     <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
    
    </header>
			
        <div class="container">
            
            <h1 class="stl1">SmartMed</h1>
            
            <p style="text-align: left;"><b>Meeting The new smart pill taking system that Helps you take medication in an orderly manner,<br>
			smartmed will let you know when its medication taking time and 
			inform your contact of current updates.</b></p>            
            
            
			<hr>
        
     <div class="panel-group">
     
    <div class="panel panel-primary">
      <div class="panel-heading" id="stl2">Why to use ?</div>
      <div class="panel-body" style= "text-align:left">
      <div class="col-md-8">  
        <i style="font-size:20px" class="fa">&#xf14a;</i> Never forget your medication <br>
        <i style="font-size:20px" class="fa">&#xf14a;</i> Keep tracking on inventory management<br>
        <i style="font-size:20px" class="fa">&#xf14a;</i> Improving the patient life<br>
         </div>
          </div>
        </div>
       </div>  
       <div clas="imgrow">
        <img src="img/PIC3.jpeg" alt="SmardMed device" width="20%" class="img1">   
       
       <img src="img/PIC4.jpeg" alt="SmardMed device" width="30%" class="img2">    
       </div>
    	
       
       <hr class="h1">
            <div class="panel panel-primary">
                
      <div class="panel-heading" id="stl2">How does it work?</div>
      <div class="panel-body " style= "text-align:left">
          <div class="col-md-8"> 
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
    </div>
   
<hr>

    <div class="panel panel-primary">
      <div class="panel-heading" id="stl2">About the initiators </div>
      <center><div class="panel-body">
      
      <div id="b"><b>Ido Keynan</b><br>I.S Student at MTA<br> Segmentation Specialist- Taboola   </div>
      <div id="b"><b>Shani Reuveni</b><br>
           I.S Student at MTA<br> PMO IT - Strauss Water<br>&nbsp</div>
      <div id="b"><b>Adam Kobo</b><br>
            I.S Studentat MTA<br> QA Engineer - Hola <br>&nbsp </div>

      
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
          
          <form action="/index.php" method="get" style="width:100%">
          
          
          <div class="top-row">
               <div class="field-wrap">
              <label>
                Email<span class="req">*</span>
              </label>
              <input type="email" name="Email" required autocomplete="off"/>
            </div><br>
            <div class="field-wrap">
              <label>
                Device Id<span class="req">*</span>
              </label>
              <input type="text" name="DeviceId" min="1000" max="100000" required data-validation-required-message="Please enter your Deivce id." required autocomplete="off" />
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
              Email<span class="req">*</span>
            </label>
            <input type="email" name="Email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Device Id<span class="req">*</span>
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
					   

			$ChekingDatasql = "SELECT * FROM Users WHERE Email = '$newEmail' AND DeviceID='$newBoxID'";
			echo "getting the query";
			echo "<br>";
			$ChekingDataResult = $conn->query($ChekingDatasql);
	        	if ($ChekingDataResult->num_rows > 0)
	        	{
					$row = $ChekingDataResult->fetch_assoc();
                    //correct information
					$_SESSION['currentDeviceId'] = $row['DeviceID'];
					$_SESSION['currentName'] = $row['Name'];
					$_SESSION['CurrentEmail'] = $row['Email'];
                    
                    header("Location: ./index.php");
        			$message = "Welcome to SmartMed!";
        		 echo "<script type='text/javascript'>alert('$message');</script>";
                    
	        	    
	        	}
		
			
				else {
				    $message = "Something went wrong";
             echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il'</script>";
				exit();    
      }
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
	        	if ($ChekingDataResult->num_rows < 1)
	        	{
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
            <p class="copyright text-muted">For contact: support@smartmed.com <br> Copyright &copy; SmartMed team 2018</p>
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
