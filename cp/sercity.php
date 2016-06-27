<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
$tex = $_GET['a1'];
//$tex="jalan";
$tex = "$tex%";


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

//$query = "select * from citysearch5 where name like '$tex' order by id acs";
$query = "select * from cityview10 where name like '$tex'";


$result=mysql_query($query);

$row = mysql_fetch_array($result);

echo $row[0];	


?>