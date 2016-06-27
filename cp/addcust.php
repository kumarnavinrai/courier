<?php
define("__root__",dirname(__FILE__));
require_once(__root__."/projectconstant.php");

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
echo "**R500**\n";
echo $r500z;
echo "**Z1KG**\n";
echo $z1kgz;
echo "**RP1KG**\n";
echo $rp1kgz;
echo "**\n";


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("$serverdatabase",$dbh) 
		or die("Could not select customer data");


//******************************************************


$query = "select id from cdata";
$result=mysql_query($query);

$idt=0;
while($row = mysql_fetch_array($result))
{
$idt=$row["id"];
}

$idt=$idt+1;


//******************************************************
$query = "insert into cdata (cname,cadd,cemail,ccode,cphone,id) values ('$cnz','$caz','$cez','$ccz','$cpz','$idt')";
$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

//******************************************************


$query = "insert into ratecn (sd250,sd500,sd1kg,sp1kg,zd250,zd500,zd1kg,zp1kg,rd250,rd500,rd1kg,rp1kg,cncode) values ('$s250z','$s500z','$s1kgz','$sp1kgz','$z250z','$z500z','$z1kgz','$zp1kgz','$r250z','$r500z','$r1kgz','$rp1kgz','$ccz')";

$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "  rate success\n";

//******************************************************
$query = "DROP TABLE IF EXISTS $ccz";


$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "drop success\n";


//******************************************************

$query = "CREATE TABLE $ccz (
  `cnno` varchar(255) NOT NULL DEFAULT '',
  `special` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `pord` varchar(255) DEFAULT NULL,
  `amtb` varchar(255) DEFAULT NULL,
  `amtc` varchar(255) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
";


$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "table success\n";




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

