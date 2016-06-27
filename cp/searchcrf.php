<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUSTOMER REGISTRATION FORM</title>
<style type="text/css">
body {
	background-image: url(Courier_300dpi.jpg);
}

#cdiv
{
	position:absolute;
	top:2cm;
	left:5cm;
	right:3cm;
	bottom:3cm;
	font-family: Arial, Helvetica, sans-serif; 	
	
}
#cdiv h3 {
	font-family: Arial, Helvetica, sans-serif;
	text-align: left;
}
</style>
</head>

<body>

<div id="cdiv"> 
<h3 align="center">REGISTER NEW CUSTOMER </h3>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
<table width="805" border="1">
  <tr>
    <td width="395">NAME
      
        <label for="cn"></label>
        <input type="text" name="cn" id="cn" /></td>
    <td width="394">ADDRESS
      <label for="ca"></label>
      <input type="text" name="ca" id="ca" /></td>
  </tr>
  <tr>
    <td>PHONE
      <label for="cp"></label>
      <input type="text" name="cp" id="cp" /></td>
    <td>EMAIL
      <label for="ce"></label>
      <input type="text" name="ce" id="ce" /></td>
  </tr>
  <tr>
    <td>CODE
      <label for="cc"></label>
      <input type="text" name="cc" id="cc" />
      <input type="button" id="ab" onclick="funavail()" value="CHECK AVAILABILITY"/></td>
    <td><label for="tav"></label>
      <input name="tav" type="text" disabled="disabled" id="tav" readonly="readonly" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="804" border="1">
  <tr>
    <td colspan="4">SHIPPER RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="s250"></label>
      <input type="text" name="s250" id="s250" /></td>
    <td>500G
      <label for="s500"></label>
      <input type="text" name="s500" id="s500" /></td>
    <td>1KG
      <label for="s1kg"></label>
      <input type="text" name="s1kg" id="s1kg" /></td>
    <td>PARCEL
      <input type="text" name="sp1kg" id="sp1kg" />
      PER/KG</td>
  </tr>
  <tr>
    <td colspan="4">ZONE RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="z250"></label>
      <input type="text" name="z250" id="z250" /></td>
    <td>500G
      <label for="z500"></label>
      <input type="text" name="z500" id="z500" /></td>
    <td>1KG
      <label for="z1kg"></label>
      <input type="text" name="z1kg" id="z1kg" /></td>
    <td>PARCEL
      <label for="zp1kg"></label>
      <input type="text" name="zp1kg" id="zp1kg" />
      PER/KG</td>
  </tr>
  <tr>
    <td colspan="4">REST OF INDIA RATES</td>
    </tr>
  <tr>
    <td>250G
      <label for="r250"></label>
      <input type="text" name="r250" id="r250" /></td>
    <td>500G
      <label for="r500"></label>
      <input type="text" name="r500" id="r500" /></td>
    <td>1KG
      <label for="r1kg"></label>
      <input type="text" name="r1kg" id="r1kg" /></td>
    <td>PARCEL
      <label for="rp1kg"></label>
      <input type="text" name="rp1kg" id="rp1kg" />
      PER/KG</td>
  </tr>
  <tr>
    <td colspan="4"><input type="button" onclick="funadd()"&nbsp;</td>
    </tr>
</table>
</form>
</div>
</body>
</html>