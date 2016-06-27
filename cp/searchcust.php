<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH CUSTOMER</title>
<link rel="stylesheet" href="css/searchcust.css" type="text/css"/>
<script type="text/javascript" src="js/searchcust.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
</head>

<body>
<div id="wrapper">
<div id="maindiv">
<div id="head">
  <a href="<?php echo $sitename; ?>"><div id="gobtms">GO BACK TO MAIN SITE</div></a>
</div>
<div id="mydivcust"> </div>
<div id="cdiv"> 
<div id="heading">CUSTOMER CONTACTS</div>
<!--/*********************for select**************/-->
<div id="custcode">
<div id="phpcode">
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

?>
</div>
<div id="custcode1">CUSTOMER CODE*</div>
<div id="custcode2">
<select name="cucd" class="txtbox1" ID="cucd">
<option value="PS">Please Select</option>
<?php
while($row = mysql_fetch_array($result))
{

?>
<option value="<?php echo $row["ccode"];?>"><?php echo $row["ccode"];?></option>
<?php
}
?>
</select></div><!-- cust code2 --></div><!-- cust code -->

<!--/*********************for select**************/-->
<div id="btndiv"><input type="button" class="btn" onclick="cser()" value="SEARCH"/></div>
<form id="form1" name="form1" method="post" action="">
<div id="table1">
  <table width="800" height="250" border="0" style="border-collapse:collapse" style="border-color:#003" >
  <tr>
    <td class="lbltxt1">NAME
      
      <label for="cn"></label></td>
    <td class="txtbox1" ><input name="cn" type="text" class="txtbox1" id="cn" /></td>
    <td class="lbltxt1" >ADDRESS
      <label for="ca"></label></td>
    <td class="txtbox1" ><input name="ca" type="text" class="txtbox1" id="ca" /></td>
  </tr>
  <tr>
    <td class="lbltxt1" >PHONE
      <label for="cp"></label></td>
    <td class="txtbox1"><input name="cp" type="text" class="txtbox1" id="cp" /></td>
    <td class="lbltxt1">EMAIL
      <label for="ce"></label></td>
    <td class="txtbox1"><input name="ce" type="text" class="txtbox1" id="ce" /></td>
  </tr>
  <tr>
    <td class="lbltxt1" >CODE
      <label for="cc"></label></td>
    <td class="txtbox1"><input name="cc" type="text" disabled="disabled" class="txtbox1" id="cc" /></td>
    <td colspan="2" class="txtbox1"><label for="tav"></label>
      <input name="tav" type="text" class="txtbox1" id="tav" style="visibility:hidden" />
      <input type="button" id="ab" onclick="funavail()" value="GET CUSTOMER READY FOR EDIT" style="visibility:hidden" /></td>
  </tr>
  </table>
</div>
<table width="804" border="0" style="visibility:hidden">
  <tr>
    <td colspan="4">SHIPPER RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="s250"></label>
      <input type="text" name="s250" id="s250" />
      RS</td>
    <td>500G
      <label for="s500"></label>
      <input type="text" name="s500" id="s500" />
      RS</td>
    <td>1KG
      <label for="s1kg"></label>
      <input type="text" name="s1kg" id="s1kg" />
      RS</td>
    <td>PARCEL
      <input type="text" name="sp1kg" id="sp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4">ZONE RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="z250"></label>
      <input type="text" name="z250" id="z250" />
      RS</td>
    <td>500G
      <label for="z500"></label>
      <input type="text" name="z500" id="z500" />
      RS</td>
    <td>1KG
      <label for="z1kg"></label>
      <input type="text" name="z1kg" id="z1kg" />
      RS</td>
    <td>PARCEL
      <label for="zp1kg"></label>
      <input type="text" name="zp1kg" id="zp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4">REST OF INDIA RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="r250"></label>
      <input type="text" name="r250" id="r250" />
      RS</td>
    <td>500G
      <label for="r500"></label>
      <input type="text" name="r500" id="r500" />
      RS</td>
    <td>1KG
      <label for="r1kg"></label>
      <input type="text" name="r1kg" id="r1kg" />
      RS</td>
    <td>PARCEL
      <label for="rp1kg"></label>
      <input type="text" name="rp1kg" id="rp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4"><input type="button" onclick="funadd()" value="SAVE CUSTOMER" />&nbsp;</td>
    </tr>
</table>
</form>
</div><!-- cdiv -->
<div id="foot"></div><!-- footer -->
<div id="foot1"></div>
</div><!-- maindiv -->
</div><!-- wrapper -->
</body>
</html>