<?php require_once("print/dompdf_config.inc.php"); require_once("projectconstant.php");
if(isset($_POST['btnp'])){ 
$html=$_POST['ajaxrtn']; 
//////////////////////////////////////////////
echo '<link rel="stylesheet" href="bills/css/billformat.css" type="text/css" />';
echo $html;
exit(); }  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINT BILL</title>
<script language="JavaScript" type="text/javascript" src="datetimepickerpb.js">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<link rel="stylesheet" href="css/pb1.css" type="text/css"/>
<link rel="stylesheet" href="bills/css/billformat.css" type="text/css" />
<script src="js/pb1.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" >
$(document).ready(function(){
$("#btnpritdiv").click(function(){
alert("Printing ......");


$("#wrapper").height(0);
$("#wrpmag").height(0);
$("#formdiv").height(0);
$("#divform").height(0);
$("#prndivid").height(0);
$("#wrpmag").toggle();
$("#prndivid").toggle();
});
});
</script>
</head>

<body onload="funstart()">
<div id="wrapper">
<div id="wrpmag" >
    
  <div id="formdiv">
  <a href="../welcome.php"><div id="msg">GO BACK TO MENU</div></a>
    <div id="divform">
    <form id="abcf" name="abcf1" method="post" action="">
      <div id="fddiv">FROM DATE</div>
      <div id="fddivtxt"><input name="fd" type="text" disabled="disabled" class="txt" id="fd" />
      <a href="javascript:NewCal('fd','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a></div>
     <div id="tddiv">TO DATE</div>
      <div id="tddivtxt"><input name="td" type="text" disabled="disabled" class="txt" id="td" />
      <a href="javascript:NewCal('td','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a></div>
    
    <!--/*********************for select**************/-->
<div id="phpcode">
<?PHP
define("__ROOT__",dirname(__FILE__));
require_once("projectconstant.php");

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
<div id="custcode">
CUSTOMER CODE*</div>
<div id="seldiv">
<select name="ccd" class="txt" ID="ccd">
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
</select>
</div>
<div id="btndiv">
    <input name="serchb" type="button" class="btn" id="serchb" onclick="callrpb()" value="SEARCH" /></div>
<div id="ddiv">See Below for Result ↓ 
  <p>&nbsp;</p>
</div>
    </form>
    </div>
   </div>
    
    
  </div>
 </div>
 <div id="prndivid">
   <form id="form1" name="form1" method="post" action="">
     <input name="btnp" type="button" class="btn" id="btnpritdiv" value="PRINT" />
     <label for="textfield"></label>
     <label for="ajaxrtn"></label>
     <input type="text" name="ajaxrtn" id="ajaxrtnid" style="visibility:hidden"  />
   </form>
 </div> 
<div id="wrapmydiv">
<div id="mydiv" >  </div>
</div>

</body>
</html>