<?php
define("__ROOT__",dirname(__FILE__));
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

//$query = "select * from ratecn where cncode='$cucdz'";
//$result=mysql_query($query);

//$tnum=mysql_num_rows($result);
//$row = mysql_fetch_array($result, MYSQL_BOTH);





//*************************************************************parcel start

//checking for zone for rate
//if($zonez=="ROI")
//zone open brace
//{
	//echo "i am roi";
//if($pordz=="parcel")
//{
	//parcel checking brace open
	//echo "this is parcel";

//if($cucdz=="JMA")
//{
//jma brace open


//$query1 = "

		//CHECKING FOR WEIGHT 250 brace open
		
	/* // $ratenow = $row["rp1kg"]; */
	
	//echo $ratenow;
	//$amtcz=$ratenow*$p1kgz;
	
$query1 = "insert into $cucdz (cnno,special,destination,weight,pord,amtb,amtc,date,notes) values('$cunoz','$specialz','$desz','$weightz','$pordz','$ambz','$amtcz','$daz','$notez')";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

mysql_close($dbh);

?>

/*
//echo "i am jma";
//jma brace close
//}
//parcel brace close
}
//zone bracket close
}

//************************************************************parcel end








//***********************************************roi doc start
//checking for zone for rate
if($zonez=="ROI")
//zone open brace
{
	//echo "i am zone";
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
	$ratenow = $row["rd250"];
	echo $ratenow;
	$amtcz=$ratenow;
$query1 = "insert into $cucdz (cnno,special,destination,weight,pord,amtc,date,notes) values('$cunoz','$specialz','$desz','$weightz','$pordz','$amtcz','$daz','$notez')";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

mysql_close($dbh);


//CHECKING FOR WEIGHT 250 brace close	
	}
	
	

	if($weightz==500)
	{
		//CHECKING FOR WEIGHT 500 brace open
	$ratenow = $row["rd500"];
	echo $ratenow;
	$amtcz=$ratenow;
$query1 = "insert into $cucdz (cnno,special,destination,weight,pord,amtc,date,notes) values('$cunoz','$specialz','$desz','$weightz','$pordz','$amtcz','$daz','$notez')";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

mysql_close($dbh);


//CHECKING FOR WEIGHT 500 brace close	
	}


if($weightz==1000)
	{
		//CHECKING FOR WEIGHT 1000 brace open
	$ratenow = $row["rd1kg"];
	echo $ratenow;
	$amtcz=$ratenow;
$query1 = "insert into $cucdz (cnno,special,destination,weight,pord,amtc,date,notes) values('$cunoz','$specialz','$desz','$weightz','$pordz','$amtcz','$daz','$notez')";

$retval = mysql_query( $query1, $dbh );

if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "successfully\n";

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

//***********************************************roi doc end

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

