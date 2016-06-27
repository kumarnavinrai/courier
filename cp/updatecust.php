<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");



$cnz = $_GET['a1'];
$caz = $_GET['b1'];
$cpz = $_GET['c1'];
$cez = $_GET['d1'];
$ccz = $_GET['e1'];
$s250z = $_GET['f1'];
$s500z = $_GET['g1'];
$s1kgz = $_GET['h1'];
$sp1kgz = $_GET['i1'];
$z250z=$_GET['j1'];
$z500z=$_GET['k1'];
$z1kgz=$_GET['l1'];
$zp1kgz=$_GET['m1'];
$r250z=$_GET['n1'];
$r500z=$_GET['o1'];
$r1kgz=$_GET['p1'];
$rp1kgz=$_GET['q1'];





echo "**CN**\n";
echo $cnz;
echo "**CA**\n";
echo $caz;
echo "**CP**\n";
echo $cpz;
echo "**CE**\n";
echo $cez;
echo "**CC**\n";
echo $ccz;
echo "**S250**\n";
echo $s250z;
echo "**s500**\n";
echo $s500z;
echo "**s1KG**\n";
echo $s1kgz;
echo "**sP1KG**\n";
echo $sp1kgz;
echo "**\n";


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");



$query = "update cdata set cname='$cnz',cadd='$caz',cemail='$cez',ccode='$ccz',cphone='$cpz' where ccode='$ccz'";




$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

mysql_close($dbh);




$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");






$query = "update ratecn set sd250='$s250z',sd500='$s500z',sd1kg='$s1kgz',sp1kg='$sp1kgz',zd250='$z250z',zd500='$z500z',zd1kg='$z1kgz',zp1kg='$zp1kgz',rd250='$r250z',rd500='$r500z',rd1kg='$r1kgz',rp1kg='$rp1kgz',cncode='$ccz' where cncode='$ccz'";



//$query = "insert into ratecn (sd250,sd500,sd1kg,sp1kg,zd250,zd500,zd1kg,zp1kg,rd250,rd500,rd1kg,rp1kg,cncode) values ('$s250z','$s500z','$s1kgz','$sp1kgz','$z250z','$z500z','$z1kgz','$zp1kgz','$r250z','$r500z','$r1kgz','$rp1kgz','$ccz')";

$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "  rate success\n";




mysql_close($dbh);



/*

mysql_close($dbh);



/*$query1 = "insert into inventory (itemid,barcode,product,productdescription,unitprice,quantityinstock) values('$invid','$barcode','$product','$pd','$up','$qs') ";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "Insert data successfully\n";

mysql_close($dbh);

 */





?>