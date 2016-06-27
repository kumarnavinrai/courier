<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/ratesearch.css" type="text/css"/>
<script type="text/javascript" language="javascript" src="js/ratesearch.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<title>SEARCH CUSTOMER RATES</title>
<style type="text/css">
#wrapper {
	height: 750px;
	width: 950px;
}
#wrapper #maindiv {
	margin: 25px;
	float: left;
	height: 700px;
	width: 900px;
}
#wrapper #maindiv #mydivcust {
	float: left;
	height: 20px;
	width: 600px;
	background-color: #B988F5;
	padding-left: 300px;
}
#wrapper #maindiv #head {
	background-image: url(images/jhnkh.jpg);
	float: left;
	height: 100px;
	width: 900px;
}
#wrapper #maindiv #foot {
	background-image: url(images/jkhn.jpg);
	float: left;
	height: 50px;
	width: 900px;
}


#wrapper #maindiv #cdiv {
	background-image: url(images/Gradient%20Background.png);
	float: left;
	height: 400px;
	width: 900px;
}
#wrapper #maindiv #cdiv #frid {
	float: left;
	height: 20px;
	width: 900px;
}
#wrapper #maindiv #cdiv #phpcpde {
	float: left;
	height: 20px;
	width: 25px;
}
#wrapper #maindiv #cdiv #cc {
	float: left;
	height: 30px;
	width: 200px;
}
#wrapper #maindiv #cdiv #seltxt {
	float: left;
	height: 30px;
	width: 200px;
}
#wrapper #maindiv #cdiv #serbox {
	float: left;
	height: 30px;
	width: 200px;
}
#wrapper #maindiv #cdiv #form1 #bothtabl {
	float: left;
	height: 400px;
	width: 900px;
}
#wrapper #maindiv #cdiv #form1 #bothtabl #tbl1 {
	float: left;
	height: 100px;
	width: 900px;
}
#wrapper #maindiv #cdiv #form1 #bothtabl #tbl2 {
	float: left;
	height: 200px;
	width: 900px;
}
.txt1 {
	font-family: Calibri;
	font-size: 12px;
	font-weight: bold;
	color: #B045B9;
	text-decoration: none;
	background-color: #FCFDFE;
	height: 20px;
	width: 70px;
	border: 1px solid #B1CEED;
	text-align: center;
}
.txtlbl {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #A20175;
	text-decoration: none;
	text-align: center;
}
.txtlbl2 {
	font-family: Calibri;
	font-size: 18px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
	text-align: center;
}
.txtlbl3 {
	font-family: Calibri;
	font-size: 20px;
	font-weight: bold;
	color: #B988F5;
	text-decoration: none;
	text-align: center;
}
.btn {
	color: #FFF;
	background-color: #9A0075;
	border: 1px solid #6B8FBB;
	text-align: center;
}
#wrapper #maindiv #head #gtb {
	font-family: Calibri;
	font-size: 18px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
	float: left;
	height: 30px;
	width: 300px;
	margin-top: 20px;
	margin-left: 100px;
}
</style>
</head>

<body>
<div id="wrapper">
<div id="maindiv">
<div id="head">
  <a href="<?php echo $sitename; ?>"><div id="gtb">GO BACK TO MAIN MENU</div></a>
</div>
<div id="mydivcust"><span class="txtlbl2">CHECK CUSTOMER RATES</span> </div>
<div id="cdiv"> 
<div class="txtlbl2" id="frid"></div>
<div id="phpcpde">
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

?>
</div>
<div class="txtlbl2" id="cc">CUSTOMER CODE*</div>
<div id="seltxt">
<select name="cucd" ID="cucd">
<option value="PS">Please Select</option>
<?php
while($row = mysql_fetch_array($result))
{

?>
<option value="<?php echo $row["ccode"];?>"><?php echo $row["ccode"];?></option>
<?php
}
?>
</select>
</div>
<!--/*********************for select**************/-->
<div id="serbox"><input type="button" class="btn" onclick="cser()" value="SEARCH"/></div>
<form id="form1" name="form1" method="post" action="">
<div id="bothtabl">
<div id="tbl1">
<table width="805" border="0" style="visibility:hidden">
  <tr>
    <td width="395" class="txtlbl">NAME
          <input type="text" name="cn" id="cn" /></td>
    <td width="394" class="txtlbl">ADDRESS
        <input type="text" name="ca" id="ca" /></td>
  </tr>
  <tr>
    <td class="txtlbl">PHONE
        <input type="text" name="cp" id="cp" /></td>
    <td class="txtlbl">EMAIL
        <input type="text" name="ce" id="ce" /></td>
  </tr>
  <tr>
    <td height="32"><input name="cc" type="text" disabled="disabled" id="cc" />
      <input type="button" id="ab" onclick="funavail()" value="GET  EDIT" style="visibility:hidden" /></td>
    <td>
      <input name="tav" type="text" id="tav" style="visibility:hidden" /></td>
  </tr>
</table>
</div>
<div id="tbl2">
<table width="804" border="0" align="center">
  <tr>
    <td colspan="4" class="txtlbl3">SHIPPER RATES</td>
    </tr>
  <tr>
    <td width="156" class="txtlbl">250G
      <label for="s250"></label>
      <input name="s250" type="text" class="txt1" id="s250" />
      RS</td>
    <td width="166" class="txtlbl">500G
      <label for="s500"></label>
      <input name="s500" type="text" class="txt1" id="s500" />
      RS</td>
    <td width="194" class="txtlbl">1KG
      <label for="s1kg"></label>
      <input name="s1kg" type="text" class="txt1" id="s1kg" />
      RS</td>
    <td width="270" class="txtlbl">PARCEL
      <input name="sp1kg" type="text" class="txt1" id="sp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4" class="txtlbl3">ZONE RATES</td>
    </tr>
  <tr>
    <td class="txtlbl">250G
      <label for="z250"></label>
      <input name="z250" type="text" class="txt1" id="z250" />
      RS</td>
    <td class="txtlbl">500G
      <label for="z500"></label>
      <input name="z500" type="text" class="txt1" id="z500" />
      RS</td>
    <td class="txtlbl">1KG
      <label for="z1kg"></label>
      <input name="z1kg" type="text" class="txt1" id="z1kg" />
      RS</td>
    <td class="txtlbl">PARCEL
      <label for="zp1kg"></label>
      <input name="zp1kg" type="text" class="txt1" id="zp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4" class="txtlbl3">REST OF INDIA RATES</td>
    </tr>
  <tr>
    <td class="txtlbl">250G
      <label for="r250"></label>
      <input name="r250" type="text" class="txt1" id="r250" />
      RS</td>
    <td class="txtlbl">500G
      <label for="r500"></label>
      <input name="r500" type="text" class="txt1" id="r500" />
      RS</td>
    <td class="txtlbl">1KG
      <label for="r1kg"></label>
      <input name="r1kg" type="text" class="txt1" id="r1kg" />
      RS</td>
    <td class="txtlbl">PARCEL
      <label for="rp1kg"></label>
      <input name="rp1kg" type="text" class="txt1" id="rp1kg" />
      RS PER/KG</td>
  </tr>
  <tr>
    <td colspan="4"><input type="button" onclick="funadd()" value="SAVE CUSTOMER" style="visibility:hidden" />&nbsp;</td>
    </tr>
</table>
</div>
</div>
</form>
</div>
<div id="foot"></div>
</div>
</div>
</body>
</html>