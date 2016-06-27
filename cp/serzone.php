<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
$tex = $_GET['a1'];
//$tex="jalan";
$tex = "$tex%";
echo $tex;

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select * from pindata where cn like '$tex'";
$result=mysql_query($query);

$row = mysql_fetch_array($result);
echo "*";
echo $row[2];	
echo "*";
echo $row[3];	
echo "*";
echo $row[4];	
echo "*";
echo trim($row[1],"�");	
echo "*";


?>