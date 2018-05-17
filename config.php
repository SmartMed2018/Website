<?php
define(errorPay,'Error set status  pay');
define(successPay,'Success set status  pay');
//data base connect
$config['hostname']="zebra";//host name for db// 
$config['dbuser'] = "shaniru";//user for db
$config['dbpassword'] = "sbbzL9TnK^1Y";//pass for db
$config['data_base'] = "shaniru_Drugs";// the main name of db


//mysql
define(server, $config['hostname']);
define(dbuser, $config['dbuser']);
define(dbpassword, $config['dbpassword']);
define(data_base, $config['data_base']);
//var from config file
$conn=mysqli_connect(server,dbuser,dbpassword,data_base) or die("error connect to db 1");
mysqli_query($conn, "SET NAMES 'utf8';" ) or die('erorr set names 2 ');

///

?>

