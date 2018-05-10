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
	  
	  //getting the existing names
	  $getDrugsName1="SELECT DrugName,CellID FROM UserDrugs WHERE UserDrugs.DeviceID=$personalDeviceId";
        $resultCurrentDrugs1 = $conn->query($getDrugsName1);
     //getting the Cell status
      $getCellStatus="SELECT CellID FROM Cell WHERE DeviceID=$personalDeviceId AND IfEmpty='1'";
        $resultCellStatus = $conn->query($getCellStatus);

        

 
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
      <script>
        function  logout(){
window.location='logout2.php';
            
                }
        
    </script>
      
  </head>

  <body onload= "getDate();ManageMedicine()">
      

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

		</form><br></div></div>

      <div class="row">
          	 <div class="col-md-1">
            </div>
		     <div class="col-md-5">
        <!-- delete a drug !-->
         <h2><center> Delete a Medicine</center></h2>
        	<form name = "myForm2" action="#" method="post">
		<p id="form2"> 
		<!--choose a drug name-->
		<div>
		Please select a medicine you would like to remove:   <br> <br>
<?php
             if ($resultCurrentDrugs1->num_rows > 0) { 
             ?>
    	 <select value="DrugWanted" name="DrugWantedDelete" size="1" required> 
          <option value="" disabled selected>A medicine to remove </option>
<?php
        while($row = $resultCurrentDrugs1->fetch_assoc()) {
        echo '<option name="'.$row['DrugName'].'"> '.$row['DrugName'].' </option>'; }
        ?>
          </select>
         <input type = "submit" class="btn-primary btn" id= "button1" value ="Delete Medicine">
        <?php
             }
             
             else{ 
                echo "There are no medicines for this device"; ?>
                <input type = "submit" value ="Delete Medicine" style="display:none">
 <?php
             }
             ?>
          

	</form><br><br></div></div>
		

            
          <!-- insert area -->
          <br><div class="col-md-5">
          <h2 ><center> Insert New Medicine</center> </h2>
        <p> Please enter a new medicine you would like to add: </p>
          <form action= "#" method="get" style="width:80%;height:400px" >
       <input type="text" size="20 class="form-control" placeholder="Medicine Name" id="DrugName" name="DrugName" required data-validation-required-message="Please enter the medicine name.">

		 <input type= "submit" class="btn-primary btn" value="Add Medicine"> 
		 
		   <?php
		    if ($_GET){
		 $getDrugsName2="SELECT DrugName,CellID FROM UserDrugs WHERE UserDrugs.DeviceID=$personalDeviceId";
        $resultCurrentDrugs2 = $conn->query($getDrugsName2);
		   $flag=0;
		   $NewDrugName=$_GET['DrugName'];

		   if ($resultCurrentDrugs2->num_rows > 0){
		    while($row2 = $resultCurrentDrugs2->fetch_assoc()) {
		          if($NewDrugName==$row2['DrugName']){

         $message = "This medicine is already exists" ;
echo "<script type='text/javascript'>alert('$message');          window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";
		              $flag=1;
		              break;
		          }
		   }
		   }
		   if($flag==0)
		   {
		        $DrugName=  $_GET['DrugName'];//working-getting the new drug name
	//using the rxcui api to find the rxcui number for the Drug(Name)
	    $urlContentsId="https://rxnav.nlm.nih.gov/REST/rxcui?name=".urlencode($_GET['DrugName']);
        $IdData = file_get_contents($urlContentsId); //the result is in xml
		$xml = simplexml_load_string($IdData, "SimpleXMLElement", LIBXML_NOCDATA); //changing to jason
		$json = json_encode($xml);
		$IdArray = json_decode($json,TRUE);

//saving the rxcui number for the Drug 
		$idDrug=$IdArray['idGroup']['rxnormId'];
	
		
		      if ($resultCellStatus->num_rows > 0){
		      $NewCellrow = $resultCellStatus->fetch_assoc();
		      	$NewCell=$NewCellrow['CellID'];
		      	

      if($idDrug>0 ){
 $sqlInsertUserDrug="INSERT INTO UserDrugs (DrugID, DrugName, DeviceID, CellID) VALUES ('".$idDrug."','".$NewDrugName."','".$personalDeviceId."', '".$NewCell."')";

$resultInsertUserDrug = $conn->query($sqlInsertUserDrug);
          
          
      $sqlUpdateCellID =  "UPDATE Cell SET IfEmpty=0 WHERE $NewCell = CellID AND $personalDeviceId= DeviceID";
      $resultUpdateCellID = $conn->query($sqlUpdateCellID);
$message = "This medicine can be added to your device! Enter the pills to cell number: ".$NewCell. "";
echo "<script type='text/javascript'>alert('$message');       
window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";


      }
      
      else{
          $message = "Invalid medicine name";
        echo "<script type='text/javascript'>alert('$message');
          window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";

      }
   
		   }
		   else{
		    $message = "There is no free cell to add the medicine";
echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";


		   }
 } 
		    }
        ?>
		 <br><br><br>
		     </form>
		     </div>
      <?php
      
         if ($_POST){
		   $DrugWantedDelete=$_POST['DrugWantedDelete'];
		   
		      //get cell id of drug
                 
		  $sql1=  " Select CellID FROM UserDrugs WHERE '$DrugWantedDelete' = DrugName AND $personalDeviceId= DeviceID";

            $result1 = $conn->query($sql1);
		   
		   $row = $result1->fetch_assoc();
		   $cell = $row["CellID"];
            
           //delete drug                
		  $sqlDeletetUserDrug=  " DELETE FROM UserDrugs WHERE '$DrugWantedDelete' = DrugName AND $personalDeviceId= DeviceID";

            $resultDeletetUserDrug = $conn->query($sqlDeletetUserDrug);
            
            // delete alerts
            
		  $sqlDeletetAlerts=  " DELETE FROM Alerts WHERE $cell = CellID AND $personalDeviceId= DeviceID";

            $resultDeletetAlerts = $conn->query($sqlDeletetAlerts);
     
            
         // change cell to empty
            
		  $sqlFreeCell=  " UPDATE Cell SET IfEmpty=1 WHERE $cell = CellID AND $personalDeviceId= DeviceID";

            $resultFreeCell = $conn->query($sqlFreeCell);
            
            
            if ($resultDeletetUserDrug ){
		    $message = "Successfully deleted the drug : $DrugWantedDelete";
echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";

            }
         else{
         $message = "Failed to delete the drug : $DrugWantedDelete" ;
echo "<script type='text/javascript'>alert('$message');window.location = 'http://shaniru.mtacloud.co.il/ManageMedicine.php'</script>";

         }
}
      ?>

         <br><div class="col-md-1">
         </div>
 
		</div>
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
            <p class="copyright text-muted">Copyright &copy; SmartMed team 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
    





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
