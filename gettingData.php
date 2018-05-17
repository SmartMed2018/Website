<?php
/*
  ESP8266: send data to your Domain(or mine)
  Embedded-iot.net/dht11/dataCollector.php

  Uses POST command to send DHT data to a designated website
  The circuit:
  * DHT
  * Post to Domain

   Stephen Borsay
   Embedded-iot.net
   www.udemy.com/all-about-arduino-wireless
   https://www.hackster.io/detox
   https://github.com/sborsay/Arduino_Wireless
*/
echo "fdsfdsfsdf";

date_default_timezone_set("America/Los_Angeles");
$TimeStamp = "The current time is " . date("h:i:sa");
file_put_contents('dataDisplayer.html', $TimeStamp, FILE_APPEND);


   if( $_REQUEST["IfTake"]) 
   {
   echo " The Humidity is: ". $_REQUEST['IfTake']. "%<br />";
   echo " The ido is: ". $_REQUEST['ido']. "%<br />";

   }
	  
	
$var1 = $_REQUEST['IfTake'];
$var2 = $_REQUEST['ido'];



$WriteMyRequest=
"<p> The Humidity is : "       . $var1 . "% </p>".
"<p>And the Temperature is : " . $var2 . " Celcius </p>".


file_put_contents('dataDisplayer.html', $WriteMyRequest, FILE_APPEND);


?>