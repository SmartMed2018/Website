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


 $sqlGetRealAmount="SELECT *
 FROM Cell  INNER JOIN UserDrugs 
      ON Cell.CellID=UserDrugs.CellID 
      WHERE PillAmount< 5 AND IfEmpty = 0 ";

 $resultGetRealAmount = $conn->query($sqlGetRealAmount);
	  
require_once  'autoload.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("AIzaSyAY0jYeve75xV4lQHiTWc9dIuUBW-JNrYo");

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}

	  // send in a mail - DrugID in cell number CellID has less then 5 pills.
	 /*
$user = 'me';
$strSubject = 'Test mail using GMail API' . date('M d, Y h:i:s A');
$strRawMessage = "From: myAddress<no.reply.smartmed@gmail.com>\r\n";
$strRawMessage .= "To: toAddress <shanireuveni31@gmail.com>\r\n";
$strRawMessage .= 'Subject: =?utf-8?B?' . base64_encode($strSubject) . "?=\r\n";
$strRawMessage .= "MIME-Version: 1.0\r\n";
$strRawMessage .= "Content-Type: text/html; charset=utf-8\r\n";
$strRawMessage .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";
$strRawMessage .= "this <b>is a test message!\r\n";
// The message needs to be encoded in Base64URL
$mime = rtrim(strtr(base64_encode($strRawMessage), '+/', '-_'), '=');
$msg = new Google_Service_Gmail_Message();
$msg->setRaw($mime);
//The special value **me** can be used to indicate the authenticated user.
$service->users_messages->send("me", $msg);

*/
?>