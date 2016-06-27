<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");



$cunoz = $_GET['cuno'];
$desz = $_GET['des'];
$weightz = $_GET['weight'];
$pordz = $_GET['pord'];
$ambz = $_GET['amb'];
$amcz = $_GET['amc'];
$cucdz = $_GET['cucd'];
$daz = $_GET['dann'];
$notez = $_GET['note'];
$specialz=$_GET['spe'];
$zonez=$_GET['zone'];
$p1kgz=$_GET['p1kgt'];
$cucdzhidden=$_GET['cunohidden'];



echo "**CN**\n";
echo $cunoz;
echo "**DES**\n";
echo $desz;
echo "**WEIGHT**\n";
echo $weightz;
echo "**P/D**\n";
echo $pordz;
echo "**AM/B**\n";
echo $ambz;
echo "**AM/C**\n";
echo $amcz;
echo "**CUST CODE**\n";
echo $cucdz;
echo "**DATE**\n";
echo $daz;
echo "**NOTES**\n";
echo $notez;
echo "**\n";


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");


$query1 = "update $cucdz set cnno='$cunoz',special='$specialz',destination='$desz',weight='$weightz',pord='$pordz',amtb='$ambz',amtc='$amcz',date='$daz',notes='$notez' where cnno='$cucdzhidden'";

		
$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

mysql_close($dbh);
echo "<br>";
echo "<a href='".$sitename."'>GO BACK TO HOME</a>";
?>