<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURIER BILLING SYSTEM</title>
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript" language="javascript">

</script>
<script type="text/javascript">
//////////////////////////////////
$(document).ready(function(){
	////////////social search starts here///////////////////////
$("#des").keyup(function(){
	///////////////////////////////////////////////////
var abc = document.getElementById("des").value;
var m = document.getElementById("mind").value;

var sitename="http://subcp1.dekhfashion.com/";

 var url = sitename+"sercity.php?a1="+abc;


	/////////////////////////ajax starts here //////
	
	   /////////////////////////////////////////////////
	   $.ajax({  
              type: "GET", url: sitename+'sercity.php?a1='+abc, 
			         complete: function(data){  
                    $("#resultforjquerydiv").html(data.responseText); 
					var c=$("#resultforjquerydiv").html();
	
				    document.getElementById("sctext").value=c; 
					
				}  
            
			});  
		
			////////////////////////////////////////////

	
	
	
	///////////////////////ajax ends here//////////////////////////
});  //
});
////////////////////////////////
</script>
<link rel="stylesheet" href="css/cef1.css" type="text/css"/>
<script type="text/javascript" src="js/cef1.js" language="javascript"></script>
<style type="text/css">
#wrapper #maindiv #head #message {
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #C8B79D;
	text-decoration: none;
	float: left;
	height: 30px;
	width: 880px;
	margin-top: 10px;
	margin-left: 20px;
}
#wrapper #maindiv #head #gtb {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #CFC1A7;
	text-decoration: none;
	float: left;
	height: 20px;
	width: 200px;
	padding-left: 700px;
	margin-top: 30px;
}
</style>
</head>

<body onload="first()" >
<div id="wrapper">
<div id="maindiv">
<div id="head">
  <div id="message">COURIER ENTRY</div>
  <a href="<?php echo $sitename; ?>"><div id="gtb">GO BACK TO MAIN SITE</div></a>
</div>

<div id="mydiverr"></div>
<form id="abc" name="abc" action="" >
<div id="table1">
<table width="" height="" id="maintable" >
<tr>
  <td>
  <div id="table2">
  <table width="900" height="438" id="maintable2" >
    <tr >
      <td colspan="5" >
       <div id="htxt1"><input name="zonestate" type="text" class="txtup" id="zonestate" readonly="readonly" /></div><div id="htxt2"><input name="zonedis8" type="text" class="txtup" id="zonedis8" readonly="readonly" /></div> <div id="htxt3"><input name="zonecity" type="text" class="txtup" id="zonecity" readonly="readonly" /></div><div id="htxt4"><input name="pincode" type="text" class="txtup" id="pincode" readonly="readonly" /></div></td>
      </tr>
    <tr class="tbborder" >
      <td width="294" height="44"><div class="lblall" id="lbl1">COURIER NO</div>
        <div id="txt1"><input name="cuno" type="text" class="txtall" id="cuno" tabindex="1" onfocus="color1()" onkeyup="displayunicode11(event)" value="Z"    /></div></td>
      <td colspan="4"><div class="lblall" id="lbl2">SPECIAL</div>
        <div id="txt2"><select name="spe" class="txtall" id="spe" tabindex="2" onfocus="color2()"  onchange="chspe()" onkeypress="displayunicode12(event)"  >
          <option>yes</option>
          <option selected="selected">no</option>
        </select></div></td>
      </tr>
    <tr >
      <td height="45"><div class="lblall" id="lbl3">DESTINATION</div>
        <div id="txt3"><input name="desname" type="text" class="txtall" id="des" tabindex="3"  onfocus="color3()"  onkeyup="displayunicode(event)" /></div></td>
      <td width="224" ><div id="txt4"><input name="sctext1" disabled="disabled" class="txtall" id="sctext"  /></div>
      </td>
      <td colspan="3" >&nbsp;</td>
      </tr>
    <tr >
      <td><div class="lblall" id="lbl5">ZONE</div>
        <div id="txt5"><select name="zone" class="txtall" id="zone" onfocus="timepass()" onkeyup="displayunicode13(event)"  >
          <option value="SHIPPER" selected="selected">SHIPPER</option>
          <option value="ZONE">ZONE</option>
          <option value="ROI">REST OF INDIA</option>
        </select>  </div>    </td>
      <td><div class="lblall" id="lbl6">WEIGHT</div></td>
      <td width="139"><div id="txt6"><select name="weightname" class="txtall" id="weight" onfocus="color4()"  onchange="selch()" onkeyup="displayunicode14(event)" >
          <option value="250" selected="selected">D250G</option>
          <option value="500">D500G</option>
          <option value="1000">D1KG</option>
          <option value="parcel1kg">P1KG</option>
        </select></div>
      </td>
      <td colspan="2"><div id="txt7">
  <input name="p1kgtn" type="text" id="p1kgt" value="1" onfocus="color5()" onkeyup="displayunicode15(event)" size="5" /></div>
        <div class="lblall" id="lbl7">KG</div></td>
      </tr>
    <tr>
      <td height="45"><div class="lblall" id="lbl8">PARCEL or DOC</div> 
        <div id="txt8"><select name="pordn" class="txtall" id="pord" onfocus="color6()" onkeyup="displayunicode16(event)" >
          <option value="parcel">Parcel</option>
          <option value="document" selected="selected">Document</option>
        </select></div></td>
      <td><div class="lblall" id="lbl9">CUST CODE</div></td>
      <td><div id="txt9">
        <select name="cucd" class="txtall" id="cucd" onfocus="color7()" onkeyup="displayunicode17(event)" >
          <option value="PS">Please Select</option>
          <?PHP
		  define("__ROOT__",dirname(__FILE__));
		  require_once(__ROOT__."/projectconstant.php");
$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db("$serverdatabase",$dbh) 
		or die("Could not select customer data");

$query = "select ccode,id from cdata ORDER BY id ASC";
$result=mysql_query($query);

?>
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
      </td>
      <td width="74">&nbsp;</td>
      <td width="145">&nbsp;</td>
    </tr>
    <tr >
      <td ><div class="lblall" id="lbl10">DATE</div>
        <div id="txt10"><input name="da" type="text" disabled="disabled" class="txtall" id="da"  readonly="readonly"  /></div>      </td>
      <td><div class="lblall" id="lbl11"><a href="javascript:NewCal('da','ddmmyyyy')" id="imgdh" onfocus="color8()" onclick="displayunicode18(event)"  ><img src="cal.gif" id="imgd" border="0" alt="Pick a date"/></a></div></td>
      <td><div class="lblall" id="lbl12">DD-MM-YYYY</div></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td height="45"><!--/*********************for select**************/-->
        
        <!--/*********************for select**************/-->
        <!--
    <span class="style1">CUSTOMER CODE*
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
    </span>
    
    
    --><div class="lblall" id="lbl13">AMOUNT BILL</div>
        <div id="txt13"><input name="amb" type="text" class="txtall" id="amb" onfocus="color11()" onkeyup="displayunicode21(event)" value="0" /></div>      </td>
      <td colspan="3"><div class="lblall" id="lbl14">AMOUNT CHARGED</div>
        <div id="txt14"><input name="amc" type="text" class="txtall" id="amc"  onfocus="color12()" onkeyup="displayunicode22(event)" value="0" /></div>      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="89" ><div id="divlbltxt15">
        <div class="lblall" id="lbl15">NOTES</div>
        <div id="txtarea1"><textarea name="note" onfocus="color9()" id="note" cols="45" rows="2" onkeyup="displayunicode19(event)" >empty</textarea></div>
      </div></td>
      <td></td>
      <td colspan="2"><div id="btndiv"><input name="SUB" type="button" class="btn" id="SUB" onfocus="color10()" onclick="adde()" value="ADD TO BILL"     /></div></td>
      <td>&nbsp;</td>
    </tr>
    </table><!--main table 2 -->&nbsp;</div></td>
</tr>
</table><!--main table1-->
</div>
  <div id="sertb"></div>
   <div id="htxt">
    <input name="mind" type="text" disabled="disabled" id="mind" value="0" readonly="readonly" />
    <label for="tind"></label>
    <input name="tind" type="text" disabled="disabled" id="tind" value="0" readonly="readonly" />
    <label for="qind"></label>
    <input name="qind" type="text" disabled="disabled" id="qind" value="0" readonly="readonly" />
    <label for="tempp1kgt"></label>
    <input name="tempp1kgt" type="text" disabled="disabled" id="tempp1kgt" value="0" readonly="readonly" />
    </div>
</form>

</div><!--maindiv-->
</div><!--wrapper-->
<div id="resultforjquerydiv" style="visibility:hidden"></div>
</body>
</html>
