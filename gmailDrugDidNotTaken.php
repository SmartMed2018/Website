<?php

session_start();

	
$personalDeviceId = $_SESSION['currentDeviceId'];
$personalName=$_SESSION['currentName'];
$personalEmail=	$_SESSION['CurrentEmail'];


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

$today= date("l");
$todayID;

   if($today==Sunday)
     $todayID=1;
    if($today==Monday)
     $todayID=2;
    if($today==Tuesday)
     $todayID=3;
     if($today==Wednesday)
     $todayID=4;
     if($today==Thursday)
     $todayID=5;
     if($today==Friday)
     $todayID=6;
     if($today==Saturday)

date_default_timezone_set("Asia/Jerusalem");  
$nowHour= date(" H")+3;  

    
    if ( date("i") == 30){

 $sqlGetDrugDidNotTaken="SELECT *
 FROM Alerts  INNER JOIN UserDrugs 
      ON Alerts.CellID=UserDrugs.CellID 
       AND Alerts.DeviceID = UserDrugs.DeviceID
      INNER JOIN Users ON Users.DeviceID = UserDrugs.DeviceID
      WHERE DayAlert=$todayID AND  HourAlert=$nowHour AND IfTake = 0";
      
 $resultGetDrugDidNotTaken = $conn->query($sqlGetDrugDidNotTaken);
	  
	  
 if ($resultGetDrugDidNotTaken->num_rows > 0 ) {
    require 'phpmailer/PHPMailerAutoload.php';


 while($row = $resultGetDrugDidNotTaken->fetch_assoc())
     
 {
         $mail = new PHPMailer();

     
     $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
    $mail->SMTPAuth = true;

    $mail->Username = 'noreply.smartmed@gmail.com';
    $mail->Password = 'sadna2018';
    $mail->setFrom('noreply.smartmed@gmail.com', 'SmartMed');
    
$mail->addAddress($row ['Email']);
$mail->Subject = 'SmartMed: Medication was not taken ';
$mail->Body.=    "Hello " .$row['Name']."\n";
 $mail->Body.=    "We wanted to update that drug " .$row['DrugName'] ."  in cell number " .$row['CellID'] ." was not taken today at " .$row['HourAlert'].":00 \n  \n";
 $mail->Body.=    "Remember - taking medication keeps your health. \n  \n";
 $mail->Body.=    "good day, \n ";
 $mail->Body.=    "SmartMed \n";



    	        if ($mail->send()){
                        echo 'mail send  ';
    	        }
	       
	       else{
                        echo 'mailer error: '. $mail->ErrorInfo;
    	        }
	           
	           

}
}
}
?>
