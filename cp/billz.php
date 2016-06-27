<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");


$weightz = $_GET['a1'];
$pordz = $_GET['b1'];
$zonez=$_GET['c1'];
$p1kgz=$_GET['d1'];


$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select * from rateb where cncode='dtdc'";
$result=mysql_query($query);

$tnum=mysql_num_rows($result);
$row = mysql_fetch_array($result, MYSQL_BOTH);








//*************************************************************parcel start

//checking for zone for rate
if($zonez=="ZONE")
//zone open brace
{
	//echo "i am SHIPPER";
if($pordz=="parcel")
{
	//parcel checking brace open
	//echo "this is parcel";

//if($cucdz=="JMA")
///{
//jma brace open




		//CHECKING FOR WEIGHT 250 brace open
	$ratenow = $row["zp1kg"];
	$ratenow=$ratenow*$p1kgz;
	echo "*";
	echo $ratenow;
	echo "*";
mysql_close($dbh);

//echo "i am jma";
//jma brace close
//}
//parcel brace close
}
//zone bracket close
}

//************************************************************parcel end










//********************************************************shipper start
//checking for zone for rate
if($zonez=="ZONE")
//zone open brace
{
	//echo "i am shipper";
if($pordz=="document")
{
	//document checking brace open
	//echo "this is document";

//if($cucdz=="JMA")
//{
//jma brace open




	if($weightz==250)
	{
		//CHECKING FOR WEIGHT 250 brace open
	$ratenow = $row["zd250"];
	echo "*";
	echo $ratenow;
	echo "*";

	
mysql_close($dbh);


//CHECKING FOR WEIGHT 250 brace close	
	}
	
	

	if($weightz==500)
	{
		//CHECKING FOR WEIGHT 500 brace open
	$ratenow = $row["zd500"];
	echo "*";
	echo $ratenow;
	echo "*";

mysql_close($dbh);


//CHECKING FOR WEIGHT 500 brace close	
	}


if($weightz==1000)
	{
		//CHECKING FOR WEIGHT 1000 brace open
	$ratenow = $row["zd1kg"];
	echo "*";
	echo $ratenow;
	echo "*";

	
mysql_close($dbh);


//CHECKING FOR WEIGHT 1000 brace close	
	}



	
	
	
//echo "i am jma";
//jma brace close
//}
//document brace close
}
//zone bracket close
}
//********************************************************shipper end


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