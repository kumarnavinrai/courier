<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$cucdz ="12";
$as = "jma";

$username = "abc";
$password = "123456";
$hostname = "192.168.0.234";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("cpd",$dbh) 
		or die("Could not select customer data");

$query = "select * from $as";

echo $query;
$result=mysql_query($query);

$tnum=mysql_num_rows($result);
$row = mysql_fetch_array($result, MYSQL_BOTH);


echo "hello";
echo $row['cnno'];

?>

</body>
</html>