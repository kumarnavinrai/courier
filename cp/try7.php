<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$username = "abc";
$password = "123456";
$hostname = "192.168.0.234";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("cpd",$dbh) 
		or die("Could not select customer data");

$query = "select * from citysearch";
$result=mysql_query($query);

$tnum=mysql_num_rows($result);
$row = mysql_fetch_array($result, MYSQL_BOTH);

echo $tnum;
$id=0;
$sd=26;
while($row = mysql_fetch_array($result))
{
	
	
	echo "-\n";	
	$s= strlen($row[0]);
	
	if($s>26)
	{
	echo "**";

	$iname=$row[0];
	
	$iname=str_ireplace("'","",$iname);
	$iname=rtrim($iname);
	$iname=ltrim($iname);
		echo $iname;
	echo "**";
	
	$query1 = "insert into try77 (name,id) values('$iname','$sd')";
$retval = mysql_query( $query1, $dbh );

/*if(! $retval )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

*/
	
	
	///////////////////////////////	
	
	$id=$id+1;
	}
	$id=0;
}



?>
</body>
</html>