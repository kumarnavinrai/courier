<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");

$tex = $_GET['a1'];

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select ccode from cdata ORDER BY id ASC";
$result=mysql_query($query);

//$tnum=mysql_num_rows($result);
//$row = mysql_fetch_array($result, MYSQL_BOTH);
	$ans="Available";



while($row = mysql_fetch_array($result))
{
$check = $row[0];

	if($check == $tex)
	{
	$ans="Not Available";
	}
	
	
}

echo $ans;	


?>