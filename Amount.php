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

          <script>
        function  logout(){
window.location='logout2.php';
            
                }
        
    </script>
  </head>

  <body onload= "getDate(); CheckAmount()">
      

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
              <a class="nav-link" id = "tracking" href="Tracking.php">Tracking status</a>
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
        <div class="col-lg-8 col-md-10 mx-auto "><br>
	
        <h1><center> Check Amount </center></h1>

		
</div>
</div>
	
        <div id="Update" style="clean:both;">	 
        
<!-- Update area -->
      <div class="row">
    <div class= "col-md-2"	>
    </div>
    <div class= "col-md-5"	>

      <p> Enter a cell and an amount you want to add/remove</p>
       <form id="UpdateForm" action="#" method="get" style="width:80%" >
    	 Choose a cell for update: 
    	 <select name="cellWanted" size="1" required>
		 <option value="1" selected > 1 </option>
		 <option value="2" > 2 </option>
		 <option value="3" > 3 </option>
		 <option value="4" > 4 </option>
		 <option value="5" > 5 </option>
		 <option value="6" > 6 </option>
		 <option value="7" > 7 </option>
		 </select>
		 <input type="Number" value="AmountToUpdate" name= "AmountToUpdate" placeholder="Enter amount" style="max-width:149px" required><br><br>
		 <input type= "submit" class="btn-primary btn" value="Update">
        </form>
        </div>
        
    <div class= "col-md-3"	>
   <?php
   
   $sql = "SELECT Cell.CellID, Cell.PillAmount, UserDrugs.DrugName
            FROM Cell
            INNER JOIN UserDrugs 
            ON Cell.DeviceID=UserDrugs.DeviceID AND Cell.CellID=UserDrugs.CellID
            WHERE UserDrugs.DeviceID='$personalDeviceId' ORDER BY Cell.CellID";
$result = $conn->query($sql);


$personalAmount=$_GET['AmountToUpdate'];
$personalCell=$_GET['cellWanted'];
    
if ($result->num_rows > 0) {
    
     echo "<style>table{ color: black; text-align:center; background-color: white; border: 2px black solid;} tr{ color: black; border: 2px blue solid;} td{ color: black ; border: 2px black solid;}</style><center><table class= 'table table-sm table-striped sm' ><tr><th>Medicine Name &nbsp </th><th>Cell number&nbsp  </th><th>Amount</th></tr>";
     // output data of each row
     echo "<br><br>";
            while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["DrugName"]. "</td>
            <td>" . $row["CellID"]. "</td>
            <td>" . $row["PillAmount"]. "</td> </tr>" ;
            
            if($personalCell==$row["CellID"])
            {
                $SavePillAmount=$row["PillAmount"];
                echo "<br>";
              }
              }
echo "</table></center>";
}
else {
     echo "0 results";
}

if ($_GET)
{

$updatedAmount=$SavePillAmount+$personalAmount;


    $chekingSql="SELECT IfEmpty FROM Cell WHERE CellID=$personalCell AND $personalDeviceId=DeviceID AND IfEmpty='0'";

$result = $conn->query($chekingSql);

    if($updatedAmount<0)
    {
       $message = "The new amount is ".$updatedAmount."  and it cant be negative";
        echo "<script type='text/javascript'>alert('$message');
          window.location = 'http://shaniru.mtacloud.co.il/Amount.php';
        </script>";
    }
    else {
       if ($result->num_rows>  0) {
        
             $UpdateSql="UPDATE Cell SET PillAmount=$updatedAmount WHERE CellID=$personalCell AND $personalDeviceId=DeviceID";
                $conn->query($UpdateSql);
              $message = "The cell number ".$personalCell."  was updated successfully";
        echo "<script type='text/javascript'>
        alert('$message'); 
        window.location = 'http://shaniru.mtacloud.co.il/Amount.php';

        </script>";
        
        }
        
        else {
         $message = "The cell number ".$personalCell."  does not have any drug";
        echo "<script type='text/javascript'>alert('$message');
         window.location = 'http://shaniru.mtacloud.co.il/Amount.php';
        </script>";
        

        }
}
        echo "<script type='text/javascript'>clearFrom();</script>";


}


?>
   </div> 
        <div class= "col-md-2"	>
    </div>
    
    
    <script>
function clearFrom() {
    document.getElementById("UpdateForm").reset();
}
</script>
        
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

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

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
