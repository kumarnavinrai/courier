<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINT BILL</title>
<script language="JavaScript" type="text/javascript" src="datetimepickerpb.js"></script>
<link rel="stylesheet" type="text/css" href="css/pb.css"/>
<script type="text/javascript" language="javascript" src="js/pb.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<style type="text/css">
#wrapper {
	height: auto;
	width: 1000px;
}
#wrapper #maindiv {
	float: left;
	height: 600px;
	width: 950px;
	margin-right: 25px;
	margin-left: 25px;
	background-image: url(images/css-professional-72-web-templates%20copy.jpg);
}
#wrapper #maindiv #bothformdiv {
	float: left;
	height: 190px;
	width: 750px;
	padding-top: 110px;
	padding-right: 100px;
	padding-bottom: 200px;
	padding-left: 100px;
}
</style>
</head>

<body onload="funstart()">
<div id="wrapper">
<div id="maindiv">
<div id="bothformdiv">
<a href="<?php echo $sitename; ?>"><div id="gtb">GO BACK TO MAIN MENU</div></a>
<div id="heading">
ONCE BILL WILL BE RELEASED IT WILL GO TO ACCOUTING AND YOU WILL NOT BE ABLE TO RELEASE BILL FOR ACCOUNTED RELEASED BILL DATES SO BE CAREFULL WHILE RELEASING BILL</div>
<div id="form1div">
 
    <div id="head2div">PLEASE SELECT FROM DATE, TO DATE, AND CUSTOMER CODE TO RELEASE BILL</div>
    
    <form id="abcf" name="abcf1" method="post" action="">
      <div class="txtlbl" id="fddiv">FROM DATE</div><div id="fdtxtdiv"><input name="fd" type="text" disabled="disabled" class="txtbox" id="fd" /></div><div id="caldiv"><a href="javascript:NewCal('fd','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a></div>
      <div class="txtlbl" id="tddiv">TO DATE</div><div id="divtdtxt"><input name="td" type="text" disabled="disabled" class="txtbox" id="td" /></div><div id="caldiv"><a href="javascript:NewCal('td','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a></div>
   <div id="phpcode"> 
    <!--/*********************for select**************/-->
<?PHP
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select ccode,id from cdata ORDER BY id ASC";
$result=mysql_query($query);

?></div>
<div id="selectdiv">
<select name="ccd" class="txtbox" ID="ccd">
<option value="PS">Please Select</option>
<?php
while($row = mysql_fetch_array($result))
{
echo $row["ccode"];
echo $row[1];

?>
<option value="<?php echo $row["ccode"];   ?>"><?php echo $row["ccode"];   ?></option>
<?php
}
?>
</select></div>
<!--/*********************for select**************/-->
    
    <!--<label>CUSTOMER CODE</label>
    <select name="ccd" id="ccd">
      <option value="PS">PLEASE SELECT</option>
      <option value="mp">MP</option>
      <option value="jr">JR</option>
      <option value="jma">JMA</option>
      <option value="britania">BRITANIA</option>
      <option value="everfresh">EVERFRESH</option>
      <option value="nddb">NDDB</option>
      <option value="vm">VM</option>
</select>--><div class="txtlbl" id="messgeserbtn">CLICK HERE TO SEE THE BILL</div><div id="serbtn"><input name="serchb" type="button" class="btncls" id="serchb" onclick="callrpb()" value="SEARCH" /></div>
    </form>
    </div>

<div id="form2div">
<form  id="WXYZ" name="WXYZ1" method="post" action="<?php echo $sitename."rpbexcel.php"; ?>">
<div class="txtlbl" id="f2message">THE DATES AND CUSTOMER FOR WHICH BILL WILL BE RELEASED</div>
<div id="f2txt1"><input name="fde1" type="text" class="txtbox" id="fde"  onfocus="callem()"/></div>
<div id="f2txt2"><input name="tde1" type="text" class="txtbox" id="tde" onfocus="callem()" /></div>
<div id="f2txt3"><input name="cde1" type="text" class="txtbox" id="cde" onfocus="callem()" /></div>
<div id="f2txt4"><input name="etoe" type="button" class="btncls" id="etoe"  onclick="funexcel()" value="GET READY RELEASE" /></div>
<div id="f2btn"><input name="xyz22" type="submit" class="btncls" id="xyz2" value="RELEASE BILL" /></div> 
</form>
</div>
</div>
</div>
<div id="mydiv" >  </div>
</div>
</body>
</body>
</html>