<?php
define("__ROOT__",dirnamer(__FILE__));
require_once(__ROOT__."/projectconstant.php");



$cunoz = $_GET['a1'];
$desz = $_GET['b1'];
$weightz = $_GET['c1'];
$pordz = $_GET['d1'];
$ambz = $_GET['e1'];
$amcz = $_GET['f1'];
$cucdz = $_GET['g1'];
$daz = $_GET['h1'];
$notez = $_GET['i1'];
$specialz=$_GET['j1'];
$zonez=$_GET['k1'];
$p1kgz=$_GET['l1'];

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










//*************************************************************start

	
$query1 = "insert into $cucdz (cnno,special,destination,weight,pord,amtb,amtc,date,notes) values('$cunoz','$specialz','$desz','$weightz','$pordz','$ambz','$amcz','$daz','$notez')";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "Success\n";

mysql_close($dbh);

//************************************************************parcel end

?>