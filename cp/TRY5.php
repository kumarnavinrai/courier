<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<select name="TRY" ID="TRY">
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>


</select>
<!--/*********************for select**************/-->
<?PHP
$username = "cpu";
$password = "12345";
$hostname = "localhost";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("cpd",$dbh) 
		or die("Could not select customer data");

$query = "select ccode,id from cdata";
$result=mysql_query($query);

?>
<span class="style1">CUSTOMER CODE*
<select name="cucd" ID="cucd">
<option value="PS">Please Select</option>
<?php
while($row = mysql_fetch_array($result))
{
echo $row["ccode"];
echo $row["id"];

?>
<option value="<?php echo $row["ccode"];?>"><?php echo $row["ccode"];?></option>
<?php
}
?>
</select>
</span>
<!--/*********************for select**************/-->
</body>
</html>