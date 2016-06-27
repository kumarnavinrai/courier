<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$tt="presto";

$username = "abc";
$password = "123456";
$hostname = "192.168.0.234";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("cpd",$dbh) 
		or die("Could not select customer data");


$query = "DROP TABLE IF EXISTS $tt";


$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";




$query = "CREATE TABLE $tt (
  `cnno` varchar(255) NOT NULL DEFAULT '',
  `special` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `pord` varchar(255) DEFAULT NULL,
  `amtb` varchar(255) DEFAULT NULL,
  `amtc` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1
";


$result=mysql_query($query);


if(! $result )
{
  die('Could not insert data: ' . mysql_error());
}
echo "success\n";

//DROP TABLE IF EXISTS `vm`;
/*CREATE TABLE `vm` (
  `cnno` varchar(255) NOT NULL DEFAULT '',
  `special` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `pord` varchar(255) DEFAULT NULL,
  `amtb` varchar(255) DEFAULT NULL,
  `amtc` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
*/



?>
<body>
</body>
</html>