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

session_start();
 $sqlGetRealAmount="SELECT *
 FROM Cell  INNER JOIN UserDrugs 
      ON Cell.CellID=UserDrugs.CellID AND Cell.DeviceID = UserDrugs.DeviceID
      INNER JOIN Users ON Users.DeviceID = UserDrugs.DeviceID
      WHERE PillAmount< 5 AND IfEmpty = 0 ORDER BY Users.Email";
$resultGetRealAmount = $conn->query($sqlGetRealAmount);
$num_rows = mysqli_num_rows($resultGetRealAmount);
echo "this is num ". $num_rows;
echo"<br>";
echo "yoyoy ". $row['DrugName'];
echo"<br>";
echo"<br>";

 if ($resultGetRealAmount->num_rows > 0 ) {
     
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = "ssl";
	$mail->Port = 465;
    $mail->SMTPAuth = true;

    $mail->Username = 'noreply.smartmed@gmail.com';
    $mail->Password = 'sadna2018';
    $mail->setFrom('noreply.smartmed@gmail.com', 'SmartMed');
$i=0;
$rowFlag = $resultGetRealAmount->fetch_assoc();

$mail->addAddress($rowFlag['Email']);

$mail->Subject = 'Pills status in Device: '.$rowFlag['DeviceID'];
$mail->Body.=    "Hello " .$rowFlag['Name']."\n";
$mail->Body.=    "The following cells have less then 5 pills:\n";
$resultGetRealAmount = $conn->query($sqlGetRealAmount);

	   while($row = $resultGetRealAmount->fetch_assoc())
	   {
	       $i++;
	           echo "the while ".$row['DrugName'];
	           echo "<br>";
	           echo "the while row ".$row['Email'];
	           echo "<br>";
	           echo "the while rowflag ".$rowFlag['Email'];
	           echo "<br>";	 
	           echo $i;
	           echo "<br>";	 

	           
	       if($rowFlag['Email']==$row['Email']){
	           
	           $mail->Body.=    "The medicine ". $row['DrugName']. " has ".$row['PillAmount']. " pills in cell number  ".$row['CellID']."\n";
	           
	           if($i==$num_rows)
	           {
	               
                    $mail->Body.=    "\n good day, \n ";
                    $mail->Body.=    "SmartMed \n";
	               	  if ($mail->send()){
    	              echo "Mail sent ".$rowFlag['Email'];
    	                echo "<br>";	   
	           }
    	        if (!$mail->send()){
                        echo 'mailer error: '. $mail->ErrorInfo;
    	        }
	           }	           
	           
	           
          
	       }
	       
	       else{
                    $mail->Body.=    "\n good day, \n ";
                    $mail->Body.=    "SmartMed \n";	           
	                if ($mail->send()){
    	                 echo "Mail sent ".$rowFlag['Email'];
    	                	           echo "<br>";	   

	           }
    	        if (!$mail->send()){
                        echo 'mailer error: '. $mail->ErrorInfo;
    	        }
    	          $rowFlag = $row;
    	          
                  $mail = new PHPMailer();

                  $mail->Host = "smtp.gmail.com";
                  $mail->SMTPSecure = "ssl";
	              $mail->Port = 465;
                  $mail->SMTPAuth = true;

                  $mail->Username = 'noreply.smartmed@gmail.com';
                  $mail->Password = 'sadna2018';
                  $mail->setFrom('noreply.smartmed@gmail.com', 'SmartMed');

 	           echo "the while rowflag ".$rowFlag['Email'];
	           echo "<br>";	   
	           
            $mail->addAddress($rowFlag['Email']);
            $mail->Subject = 'Pills status in Device: '.$rowFlag['DeviceID'];
            $mail->Body.=    "Hello " .$rowFlag['Name']."\n";
            $mail->Body.=    "The following cells have less then 5 pills:\n";
$mail->Body.=    "The medicine ". $rowFlag['DrugName']. " has ".$rowFlag['PillAmount']. " pills in cell number  ".$rowFlag['CellID']; 


	           echo "the while ".$row['DrugName'];
	           echo "<br>";
	           echo "the while row ".$row['Email'];
	           echo "<br>";
	           echo "the while rowflag ".$rowFlag['Email'];
	           echo "<br>";	   
	           	           echo "<br>";	 
	           echo $i;
	           echo "<br>";	 
	           echo $num_rows;
	           if($i==$num_rows)
	           {
                    $mail->Body.=    "\n good day, \n ";
                    $mail->Body.=    "SmartMed \n";	               
	               	  if ($mail->send()){
    	              echo "Mail sent ".$rowFlag['Email'];
    	              	           echo "<br>";	   
	           }
    	        if (!$mail->send()){
                        echo 'mailer error: '. $mail->ErrorInfo;
    	        }
	           }

          }//else
          
          
	   }//while fetch
	   
	   
	  }//if the numrows>0
 

?>





