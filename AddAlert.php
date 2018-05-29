<?php
session_start();

	
$personalDeviceId = $_SESSION['currentDeviceId'];
$personalName=$_SESSION['currentName'];
$personalEmail=	$_SESSION['CurrentEmail'];

	 $idDrug="";
    if ($_GET){ 
        $DrugName=  $_GET['DrugWanted'];//working-getting the new drug name
	//using the rxcui api to find the rxcui number for the Drug(Name)
	    $urlContentsId="https://rxnav.nlm.nih.gov/REST/rxcui?name=".urlencode($_GET['DrugWanted']);
        $IdData = file_get_contents($urlContentsId); //the result is in xml
		$xml = simplexml_load_string($IdData, "SimpleXMLElement", LIBXML_NOCDATA); //changing to jason
		$json = json_encode($xml);
		$IdArray = json_decode($json,TRUE);

//saving the rxcui number for the Drug 
		$idDrug=$IdArray['idGroup']['rxnormId'];

		//adding the Rxcui to the Url Api to get the interactions	
	    $urlContents="https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=".$idDrug;
        $data = file_get_contents($urlContents);
        $InteractionsArray = json_decode($data, true);
        
        for ($i = 0; $i <= 3; $i++) {
            $InterNames = $InteractionsArray
	    	["interactionTypeGroup"][0]
		    ["interactionType"][0]
		    ["interactionPair"][$i]
	    	["interactionConcept"][1]
	    	["minConceptItem"]["name"];

		      $arrayForNames[$i]=$InterNames;
    }
    
}

 
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


///query for getting a table to add new ALERT!
$sqlAdd = "SELECT *
FROM Alerts INNER JOIN  UserDrugs 
ON Alerts.DeviceID=UserDrugs.DeviceID AND Alerts.CellID = UserDrugs.CellID
where $personalDeviceId =Alerts.DeviceID ORDER BY DayAlert,HourAlert
"; 


//working

$getDrugsName1="SELECT DrugName 
FROM UserDrugs INNER JOIN Cell 
ON (UserDrugs.DeviceID=Cell.DeviceID AND UserDrugs.CellID=Cell.CellID) 
WHERE Cell.DeviceID=$personalDeviceId AND Cell.PillAmount>0";

        $resultCurrentDrugs1 = $conn->query($getDrugsName1);

?>



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


  <style>

	i:hover {
    color:grey;
    background-color: transparent;
    text-decoration: underline;
	}
	i:active {
    color: red;
    background-color: transparent;
    text-decoration: underline;
	}
	</style>
      <script>
        function  logout(){
window.location='logout2.php';
            
                }
        
    </script>
    
  </head>

  <body onload= "getDate();AddNewAlert()">

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

              <a class="nav-link"  href="index.php"><img src="img/logo2.png" height="62px" width="250px" id = "logo" top="6px" poisition= fixed left = "0px" alt="SmartMed logo" ></a>
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
              <a class="nav-link" id = "AddAlert" href="AddAlert.php">Add New alert</a>
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
              <a class="nav-link center" id = "tracking" href="Tracking.php">Tracking status</a>
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
            
                        <li class="nav-item" >
              <a class="nav-link"  >hello
              <?php
              
              if( !isset($_SESSION['currentName']) ){
                            echo "GUEST";
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
    <div class="container-fluid>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto "><br>
        <h1><center> Add New Alert </center></h1>

              
		<form name = "myForm" action="#" method="get">
		<p id="form"> 
		<!--choose a drug name-->
		<div>
		<b> Medicine name: </b> &nbsp 
<?php
             if ($resultCurrentDrugs1->num_rows > 0) { ?>
    	 <select required value="DrugWanted" name="DrugWanted" size="1" >
          <option value="" disabled selected>Please Select a medicine from the list</option>
<?php
        while($row = $resultCurrentDrugs1->fetch_assoc()) {
        echo '<option name="'.$row['DrugName'].'"> '.$row['DrugName'].' </option>'; }
             }?>
            </select>
	</div>
	<!--choose a day-->
						<div><br>
						<b> Day to take the medicine: </b>
						&nbsp
						<input id="Sunday" name="days[]" type="checkbox" value="1" />
						<label>Sunday</label> &nbsp
						<input id="Monday" name="days[]" type="checkbox" value="2" />
						<label>Monday</label> &nbsp
						<input id="Tuesday" name="days[]" type="checkbox" value="3" />
						<label>Tuesday</label> &nbsp
						<input id="Wednesday" name="days[]" type="checkbox" value="4" />
						<label>Wednesday</label> &nbsp
						<input id="Thursday" name="days[]" type="checkbox" value="5" />
						<label>Thursday</label> &nbsp 						&nbsp 			&nbsp		&nbsp

						<input id="Friday" name="days[]" type="checkbox" value="6" />
						<label>Friday</label> &nbsp
						<input id="Saturday" name="days[]" type="checkbox" value="7" />
						<label>Saturday</label> &nbsp
						</div>
	<!--choose an hour-->
						<div><br>
						<b> Time to take the medicine </b>
						&nbsp <input id="Morning" name="time[]" type="checkbox" value="9"  />  
						<label>Morning</label> &nbsp
						<input id="Noon" name="time[]" type="checkbox" value="14" />
						<label>Noon</label> &nbsp
						<input id="evening" name="time[]" type="checkbox" value="19" />
						<label>Evening</label> &nbsp
						<input id="Night" name="time[]" type="checkbox" value="22" />
						<label>Night</label> &nbsp
						</div><br><center>
						<input type="submit" class="btn-primary btn" value="Add alert" id="clickMe"></center> <br><br>	
		</form>	
					
					
<?php
    if ($_GET){ 

if(isset($_GET["days"]) && isset($_GET["time"])){

     $flag=0;
     $personalDrug=$_GET["DrugWanted"];
      echo "<br>";
 foreach($_GET["days"] as $wantedDay){
    foreach($_GET["time"] as $wantedTime) {
        $flag=0;

$resultAdd = $conn->query($sqlAdd);
            if ($resultAdd->num_rows > 0) {
              while($row = $resultAdd->fetch_assoc()) {
                  
             		  if($row["DayAlert"] == $wantedDay && $wantedTime==$row["HourAlert"])
                            {
                                                               echo "<br>";
 
                                echo "there is day and hour the same".$flag;
                        	    if($row["DrugName"]== $personalDrug)
                        	    {
                                    echo "<p style='color:red;'>";
                        	        echo "This medicine has already been taken at this time </p>";
                        	           $flag=1;
                                echo "<br>";
                                echo "first if".$flag;
                        	    }
                            
                            else
                            {
                                echo "entering the else".$flag;
                        	for ($i = 0; $i <= 3; $i++) {
	    
                                if ($arrayForNames[$i]== $row["DrugName"]) 
                                {
                                    //echo $arrayForNames[$i];
                                   // echo "<br>";
                                    echo "<p style='color:red;'>";
                                    echo "This drug can not be taken in parallel with $arrayForNames[$i] drug on ";
                                      if($wantedDay==1)
                                            echo "Sunday";
                                                                                if($wantedDay==2)
                                            echo "Monday";
                                                                                if($wantedDay==3)
                                            echo "Tuesday";
                                                                                if($wantedDay==4)
                                            echo "Wednesday";
                                                                            
                                        if($wantedDay==5)
                                            echo "Thursday";
                                                                            
                                       if($wantedDay==6)
                                            echo "Friday";
                                                                                 if($wantedDay==7)
                                            echo "Saturday";
                                        
                                       echo " at $wantedTime:00 . Please select a different time </p>";
                                        $flag=1;
                                }// if there is an ineraction
                            }//for for the 3 drugs
                         }// else the alert not exists
                  }//if there is already time like this in the table
                echo "<br>";
                echo "first while".$flag;
              }//while rows
                echo "<br>";
                echo "first if".$flag;                
            }//if rows of the current table alert
                echo "<br>";
                echo "finising the loop".$flag;
if($flag==0){

$sqlChekingCellID = "SELECT CellID,DrugName from UserDrugs WHERE $personalDeviceId=DeviceID";
$resultChekingCellID = $conn->query($sqlChekingCellID);
if ($resultChekingCellID->num_rows > 0) {
    // output data of each row
    while($row = $resultChekingCellID->fetch_assoc()) {
        if($row["DrugName"]==$personalDrug)
        {
            $CurrentCell=$row["CellID"];
        }
    }
} 
else {
    echo "0 results";
}

 $sqlAddAlert = "INSERT INTO Alerts(DayAlert, HourAlert, IfTake, CellID, DeviceID) VALUES ($wantedDay, $wantedTime, 0, $CurrentCell, $personalDeviceId)";
 
//show msg after adding an alert
  $resultAddAlert= $conn->query($sqlAddAlert);
     echo "An alarm was added on ";
         if($wantedDay==1)
            echo "Sunday";
        if($wantedDay==2)
            echo "Monday";
        if($wantedDay==3)
            echo "Tuesday";
        if($wantedDay==4)
            echo "Wednesday";
        if($wantedDay==5)
            echo "Thursday";
        if($wantedDay==6)
            echo "Friday";
        if($wantedDay==7)
            echo "Saturday";
        echo " at $wantedTime:00.<br>";
        echo "<br>";

}//if flag=0
  
 }//get hours
}//get days
}

else{
    $message = "Please complete all fields in order to add an alert";
    echo "<script type='text/javascript'>alert('$message');</script>";

}
}
?>
<form>
						</p>
						<div id="idDrug">
						<?php         
								if ($idDrug) {
								}?>					
						</form>		
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
