<?php
define("__ROOTx__",dirname(__FILE__));
require_once("projectconstant.php");

$cuz = $_GET['a1'];


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select * from cdata where ccode='$cuz'";
$result=mysql_query($query);

$row = mysql_fetch_array($result);
echo "*";
echo $row[0];	
echo "*";
echo $row[1];	
echo "*";
echo $row[2];	
echo "*";
echo $row[3];	
echo "*";
echo $row[4];	
echo "*";
//echo $row[5];	
//echo "*";


$query = "select * from ratecn where cncode='$cuz'";
$result=mysql_query($query);

$row = mysql_fetch_array($result);






echo $row[0];	
echo "*";
echo $row[1];	
echo "*";
echo $row[2];	
echo "*";
echo $row[3];	
echo "*";
echo $row[4];	
echo "*";
echo $row[5];	
echo "*";
echo $row[6];	
echo "*";
echo $row[7];	
echo "*";
echo $row[8];	
echo "*";
echo $row[9];	
echo "*";
echo $row[10];	
echo "*";
echo $row[11];	
echo "*";


?>