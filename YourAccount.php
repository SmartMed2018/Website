<?php

session_start();

	
$personalDeviceId = $_SESSION['currentDeviceId'];
$personalName=$_SESSION['currentName'];
$personalEmail=	$_SESSION['CurrentEmail'];
$personalDayAlert = $_GET['dayWanted'];


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



    $sqlTracking="SELECT *
      FROM Alerts INNER JOIN UserDrugs 
      ON Alerts.CellID=UserDrugs.CellID
      WHERE '$personalDayAlert' =DayAlert ";

	  $resultTracking = $conn->query($sqlTracking);

 
?>
<!DOCTYPE html>

<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Account</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    
    <link href="css/asd.css" rel="stylesheet" type="text/css">


   <link rel="stylesheet" href="css/foofoo.css">
  
      
  </head>

  <body >
      

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
    <header class="masthead" style="background-image: url('img/Account-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>My Account</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto ">
		<form style="width: 140%;" action="server1">
	     <i class="asd" onclick="AddNewAlert()"> Add New Alert &nbsp;</i>
			
         <i class="asd" onclick="CheckAmount()"> Check amount &nbsp;</i>
			
         <i class="asd" onclick="PillTakingStatus()"> Pill taking Status </i>
         
         <i class="asd" onclick="ManageMedicine()"> Manage Medicines </i>

		</form>
    </div>
    </div>
    </div>


    
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
    

<script type="text/javascript">
    
        function getDate() {
            
        var curr = new Date();
        day = curr.getDay();
        firstday = new Date(curr.getTime() - 60*60*24* day*1000); //will return firstday (ie sunday) of the week
        document.getElementById("date1").innerHTML = firstday.toLocaleDateString();
}


		// document.getElementById("welcome").innerHtml="none";

</script>



<script>
	function AddNewAlert() {

 window.location.href = "AddAlert.php";

}
	function CheckAmount() {
 window.location.href = "Amount.php";
}

	function PillTakingStatus() {

 window.location.href = "Tracking.php";

}
	function ManageMedicine() {

 window.location.href = "ManageMedicine.php";

}

		function closeFunctions() {

        document.getElementById("Update").style.display="none";
         document.getElementById("tracking").style.display="none";
        document.getElementById("insert").style.display="none";
}

</script>

    


  </body>

</html>
