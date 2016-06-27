<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
$cnz = $_GET['a1'];
$cdz = $_GET['b1'];

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select * from $cdz where cnno='$cnz'";
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
echo $row[5];	
echo "*";
echo $row[6];	
echo "*";
echo $row[7];	
echo "*";
echo $row[8];	
echo "*";


?>