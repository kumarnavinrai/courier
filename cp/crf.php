<?php require_once("projectconstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUSTOMER REGISTRATION FORM</title>
<link href="css/custadd.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/custadd.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
function removeSpaces(xx){
var aa=document.getElementById('cc').value	
document.getElementById('cc').value=removeSpaces1(aa);
}

function removeSpaces1(string) {
 return string.split(' ').join('');
}
</script>
<style type="text/css">
#wrapper #main #cdiv {
	float: left;
	height: 450px;
	width: 900px;
	background-image: url(images/sky.jpg);
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#wrapper #main #cdiv #formhead {
	float: left;
	height: 25px;
	width: 650px;
	padding-top: 3px;
	padding-right: 50px;
	padding-bottom: 3px;
	padding-left: 200px;
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #CE4E7E;
	text-decoration: none;
}
#wrapper #main #cdiv #form1 #table1div {
	float: left;
	height: 120px;
	width: 900px;
}
#wrapper #main #cdiv #form1 #table2div {
	float: left;
	height: auto;
	width: 900px;
}
.txtlbl {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #CE4E7E;
	text-decoration: none;
	text-align: center;
}
.txtlbl1 {
	font-family: Calibri;
	font-size: 18px;
	font-weight: bold;
	color: #FFB693;
	text-decoration: none;
	text-align: center;
}
.txtbox1 {
	border: 1px solid #CE4E7E;
	text-align: center;
	font-family: Calibri;
	font-size: 12px;
	color: #400000;
	text-decoration: none;
}
.btn1 {
	background-color: #900;
	border: 2px solid #066;
	text-align: center;
	font-family: Calibri;
	color: #FFF;
}
.table1 {
	border: 3px solid #033;
}
.tbl1 {
	border: 3px solid #FFF;
}
#wrapper #main #head #goback {
	float: left;
	height: 15px;
	width: 250px;
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #000;
	margin-top: 10px;
	margin-left: 50px;
}
.txtlbl2 {
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #CD573D;
	text-decoration: none;
	text-align: center;
}
</style>
</head>

<body onload="fload()">

<div id="wrapper">
<div id="main">
<div id="head">
  <a href="<?php echo $sitename; ?>"><div id="goback">GO BACK TO MAIN MENU</div></a>
</div>
<div id="mydivcust"> </div>
<div id="cdiv"> 
<div id="formhead">ADD NEW CUSTOMER</div>
<form id="form1" name="form1" method="post" action="">
<div id="table1div">
  <table width="900" border="0">
    <tr>
      <td width="119" class="txtlbl">NAME
        
        <label for="cn"></label></td>
      <td width="274"><input name="cn" type="text" class="txtbox1" id="cn" onfocus="color1()" onkeyup="fenter1(event)" /></td>
      <td width="163" class="txtlbl">ADDRESS
        <label for="ca"></label></td>
      <td width="231"><input name="ca" type="text" class="txtbox1" id="ca" onfocus="color2()" onkeyup="fenter2(event)" /></td>
      </tr>
    <tr>
      <td class="txtlbl">PHONE
        <label for="cp"></label></td>
      <td><input name="cp" type="text" class="txtbox1" id="cp" onfocus="color3()" onkeyup="fenter3(event)" /></td>
      <td class="txtlbl">EMAIL
        <label for="ce"></label></td>
      <td><input name="ce" type="text" class="txtbox1" id="ce" onfocus="color4()" onkeyup="fenter4(event)" /></td>
      </tr>
    <tr>
      <td class="txtlbl">CODE
        <label for="cc"></label></td>
      <td><input name="ccaa" type="text" class="txtbox1" id="cc" onfocus="color5()" onkeyup="fenter5(event)"  onblur="removeSpaces(1);" /></td>
      <td><label for="tav"></label>
        <input type="button" class="btn1" id="ab" onclick="funavail()" value="CHECK AVAILABILITY"/></td>
      <td><input name="tav" type="text" disabled="disabled" id="tav" style="border:none" readonly="readonly" /></td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      </tr>
  </table>
</div>
<div id="table2div">
  <table width="900" border="0"  id="ratetable">
    <tr class="table1">
      <td height="40" colspan="4" class="txtlbl2">SHIPPER RATES</td>
      </tr>
    <tr class="tbl1">
      <td width="184" height="37" class="txtlbl1">250G
        <label for="s250"></label>
        <input name="s250" type="text" class="txtbox1" id="s250" onfocus="color6()" onkeyup="fenter6(event)" size="4" />
        RS</td>
      <td width="184" class="txtlbl1">500G
        <label for="s500"></label>
        <input name="s500" type="text" class="txtbox1" id="s500" onfocus="color7()" onkeyup="fenter7(event)" size="4" />
        RS</td>
      <td width="180" class="txtlbl1">1KG
        <label for="s1kg"></label>
        <input name="s1kg" type="text" class="txtbox1" id="s1kg" onfocus="color8()" onkeyup="fenter8(event)" size="4" />
        RS</td>
      <td width="265" class="txtlbl1">PARCEL
        <input name="sp1kg" type="text" class="txtbox1" id="sp1kg" onfocus="color9()"  onkeyup="fenter9(event)" size="4" />
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td height="38" colspan="4" class="txtlbl2">ZONE RATES</td>
      </tr>
    <tr class="tbl1">
      <td height="40" class="txtlbl1">250G
        <label for="z250"></label>
        <input name="z250" type="text" class="txtbox1" id="z250" onfocus="color10()" onkeyup="fenter10(event)" size="4" />
        RS</td>
      <td class="txtlbl1">500G
        <label for="z500"></label>
        <input name="z500" type="text" class="txtbox1" id="z500" onfocus="color11()" onkeyup="fenter11(event)" size="4" />
        RS</td>
      <td class="txtlbl1">1KG
        <label for="z1kg"></label>
        <input name="z1kg" type="text" class="txtbox1" id="z1kg" onfocus="color12()" onkeyup="fenter12(event)" size="4" />
        RS</td>
      <td class="txtlbl1">PARCEL
        <label for="zp1kg"></label>
        <input name="zp1kg" type="text" class="txtbox1" id="zp1kg" onfocus="color13()" onkeyup="fenter13(event)"  size="4"/>
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td height="42" colspan="4" class="txtlbl2">REST OF INDIA RATES</td>
      </tr>
    <tr class="tbl1">
      <td height="47" class="txtlbl1">250G
        <label for="r250"></label>
        <input name="r250" type="text" class="txtbox1" id="r250" onfocus="color14()" onkeyup="fenter14(event)" size="4" />
        RS</td>
      <td class="txtlbl1">500G
        <label for="r500"></label>
        <input name="r500" type="text" class="txtbox1" id="r500" onfocus="color15()" onkeyup="fenter15(event)" size="4" />
        RS</td>
      <td class="txtlbl1">1KG
        <label for="r1kg"></label>
        <input name="r1kg" type="text" class="txtbox1" id="r1kg" onfocus="color16()" onkeyup="fenter16(event)" size="4" />
        RS</td>
      <td class="txtlbl1">PARCEL
        <label for="rp1kg"></label>
        <input name="rp1kg" type="text" class="txtbox1" id="rp1kg" onfocus="color17()" onkeyup="fenter17(event)" size="4" />
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td colspan="4"><input name="sc" type="button" class="btn1" id="sc" onclick="funadd()" onkeyup="fenter18(event)" value="SAVE CUSTOMER" />&nbsp;</td>
      </tr>
  </table>
</div>
</form>
</div>
<div id="footer"></div>
</div>
</div>
<div id="statusid" style="visibility:hidden" >sdfsfs</div>
</body>
</html>