<?php


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
    $todayID=7;
date_default_timezone_set("Asia/Jerusalem");  
$nowHour= date(" H");  
echo $nowHour;

/*$sqlUpdateDrugTaken="UPDATE Alerts SET IfTake='1'
      WHERE DayAlert=$todayID AND CellID = '2' AND HourAlert=$nowHour AND DeviceID='123'";*/
      
$sqlUpdateDrugTaken="UPDATE Alerts SET IfTake='1'
     WHERE DayAlert='1' AND CellID = '2' AND HourAlert='19' AND DeviceID='123'"; 
      
       $resultUpdateDrugTaken = $conn->query($sqlUpdateDrugTaken);

$sqlGetPillAmount="Select PillAmount From Cell 
      WHERE CellID = '2' AND DeviceID='123'";  
      
       $resultGetPillAmount = $conn->query($sqlGetPillAmount);

      $row = $resultGetPillAmount->fetch_assoc();
        $amount = $row['PillAmount']-1;
        echo $amount;
        
        
$sqlUpdateAmount="UPDATE Cell SET PillAmount=$amount
     WHERE CellID = '2' AND DeviceID='123'"; 
      
       $resultUpdateAmount = $conn->query($sqlUpdateAmount);



?>
