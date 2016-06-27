<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EDIT COURIER ENTRY</title>
<script language="javascript" type="text/javascript" src="datetimepickerpb.js"></script>
<script language="javascript" type="text/javascript" src="js/editce.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/editce.css" />

<style type="text/css">
#wrapper {
	float: left;
	height: 750px;
	width: 1050px;
}
</style>
</head>
<body onload="loadme()">
<div id="wrapper">
  <div id="maindiv">
  <a href="<?php echo $sitename; ?>"><div id="msghead">GO BACK TO MAIN SITE</div></a>
  <form id="abcid" name="abc" action="<?php echo $sitename."ucef.php"; ?>"  method="get">
<div id="table11">
  <table  border="0">
    <tr>
      <td width="137" class="lbltxt" >CLICK SEARCH</td>
      <td width="148" ><input type="button" class="btncls" onclick="sere()" id="serimg" value="SEARCH"/></td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
    <td height="" class="lbltxt">COURIER NO</td>
    <td height=""><input name="cuno" type="text" class="txtbox" id="cuno" value="Z" /></td>
      <td width="142" class="lbltxt">
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
  CUSTOMER CODE 
  <!--/*********************for select**************/-->
        
        <!--CUSTOMER CODE*
        <span class="style1">
        <select name="cucd" id="cucd"  >
          <option value="PS">PLEASE SELECT</option>
          <option value="mp">MP</option>
          <option value="jr">JR</option>
          <option value="jma">JMA</option>
          <option value="britania">BRITANIA</option>
          <option value="everfresh">EVERFRESH</option>
          <option value="nddb">NDDB</option>
          <option value="vm">VM</option>
</select>
        </span>--> </td>
      <td colspan="3">
        <select name="cucd" class="txtbox" id="cucd">
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
      </td>
    </tr>
  <tr>
    <td height="" class="lbltxt">SPECIAL      </td>
    <td height=""><select name="spe" class="txtbox" id="spe"  onchange="chspe()"  >
      <option>yes</option>
      <option selected="selected">no</option>
    </select></td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="" class="lbltxt">DESTINATION
      
    </td>
    <td height="">
      <input name="des" type="text" class="txtbox" id="des"  onkeyup="displayunicode(event)" />
    </td>
    <td colspan="4" class="lbltxt">Booked From Jalandhar</td>
  </tr>
  <tr>
    <td height="" class="lbltxt">SELECT ZONE</td>
    <td height=""><select name="zone" class="txtbox" id="zone" >
      <option value="SHIPPER" selected="selected">SHIPPER</option>
      <option value="ZONE">ZONE</option>
      <option value="ROI">REST OF INDIA</option>
    </select></td>
    <td class="lbltxt">WEIGHT</td>
    <td width="93"> <select name="weight" class="txtbox" id="weight"  onchange="selch()" >
        <option value="250" selected="selected">D250G</option>
        <option value="500">D500G</option>
        <option value="1000">D1KG</option>
        <option value="parcel1kg">P1KG</option>
      </select></td>
    <td width="183"><input name="p1kgt" type="text" class="txtbox" id="p1kgt" value="1" size="3" />
      <span class="lbltxt">KG</span></td>
    <td width="25">&nbsp;</td>
  </tr>
  <tr>
    <td height="" class="lbltxt">PARCEL or DOC</td>
    <td height=""><select name="pord" class="txtbox" id="pord">
      <option value="parcel">Parcel</option>
      <option value="document" selected="selected">Document</option>
    </select></td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="" class="lbltxt">DATE</td>
    <td height=""><a href="javascript:NewCal('da','ddmmyyyy')">
      <input name="da" type="text" class="txtbox" id="da" />
    </a></td>
    <td><a href="javascript:NewCal('da','ddmmyyyy')"><img src="cal.gif" width="30" height="28" border="0" alt="Pick a date" onclick="callsdcheck1()" onkeypress="callsdcheck1()" onkeydown="callsdcheck1()" onkeyup="callsdcheck1()" /></a></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="" class="lbltxt">
        AMOUNT CHARGED
    </td>
    <td height="">
      <input name="amc" type="text" class="txtbox" id="amc" readonly="readonly"  />
    </td>
    <td class="lbltxt">AMOUNT BILLED</td>
    <td colspan="3"><input name="amb" type="text" class="txtbox" id="amb"  /></td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td height="37">&nbsp;</td>
    <td class="lbltxt">NOTES</td>
    <td colspan="3"><textarea name="note" cols="45" rows="2" class="txtbox" id="note" readonly="readonly">empty</textarea></td>
  </tr>
  <tr>
    
    <td>&nbsp;</td>
    <td><input type="submit" class="btncls" id="dsub" value="EDIT MODE"  /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </div>
</form>
  </div>
</div>
  



</body>
</html>