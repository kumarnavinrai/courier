<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRINT BILL</title>
<script language="JavaScript" type="text/javascript" src="datetimepickerpb.js">

</script>
<style type="text/css">
body {
	background-image: url(d.jpg);
	font-family: Arial, Helvetica, sans-serif;
}

.HL {
	position: relative;
	height: auto;
	width: auto;
	left: 2cm;
	top: 1cm;
}

.mdcss {
	left: 1cm;
}
#fwxyz {
	position:absolute;
	
	top:10cm;
	left:5cm;
}

#mydiv {
	position:absolute;
	top:15cm;
	left:3cm;
}

</style>
</head>

<body onload="funstart()">

<script type="text/javascript">
function funstart()
{
document.getElementById("fde").value = document.getElementById("fd").value;
document.getElementById("tde").value = document.getElementById("td").value ; 
document.getElementById("cde").value = document.getElementById("ccd").value ; 
document.getElementById("xyz2").disabled=true;
document.getElementById("fde").hidden = true;
document.getElementById("tde").hidden = true;
document.getElementById("cde").hidden  = true;


	
	
}

</script>


<a href="index.php"><img src="BACKB.png" width="75" height="79" alt="BACK" /></a>
<div align="center" class="HL">
  <div align="left" class="HL">
    <p>PLEASE SELECT FROM DATE, TO DATE, AND CUSTOMER CODE TO PRINT BILL  </p>
    <p></p>
    <form id="abcf" name="abcf1" method="post" action="">
      <label for="fd">FROM DATE</label>
      <input name="fd" type="text" disabled="disabled" id="fd" />
      <a href="javascript:NewCal('fd','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a>
      <label for="td">TO DATE</label>
      <input name="td" type="text" disabled="disabled" id="td" />
      <a href="javascript:NewCal('td','ddmmyyyy')"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a>
    
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
<span class="style1">CUSTOMER CODE*
<select name="ccd" ID="ccd">
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
</span>
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
</select>-->
    <input type="button" name="serchb" id="serchb" value="SEARCH" onclick="callrpb()" />
    </form>
    <p>&nbsp; </p>
    
  <script type="text/javascript">
 function callrpb()
 {
	 var fdx = document.getElementById("fd").value;	 
	 var tdx = document.getElementById("td").value;
	 var ccdx = document.getElementById("ccd").value;
	 
	 if(fdx=="")
	 {
		 alert("please enter the from date");
		 document.getElementById("fd").focus();
		 javascript_abort()
	 }
	
	if(tdx=="")
	 {
		 alert("please enter the from date");
		 document.getElementById("fd").focus();
		javascript_abort()
	 }
	 if(ccdx=="PS")
	 {
		 alert("please enter the customer code");
		 document.getElementById("ccd").focus();
		javascript_abort()
	 }
	
	
var r=confirm("HAVE YOU ENTERED DETAILS CORRECT !!!!!!!!! ");
if (r==true)
  {
  alert("You pressed OK!");
  var url = "http://localhost/cp/rpbdtdc.php?a1="+fdx+"&b1="+tdx+"&c1="+ccdx;
  
  
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  entryxspe=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  entryxspe=new ActiveXObject("Microsoft.XMLHTTP");
  }
entryxspe.onreadystatechange=function()
  {
  if (entryxspe.readyState==4 && entryxspe.status==200)
    {
    document.getElementById("mydiv").innerHTML=entryxspe.responseText;
	
    }
  }

 
entryxspe.open("GET",url,true);
entryxspe.send();

document.getElementById("fd").value = "";
document.getElementById("td").value = "";
document.getElementById("ccd").reset();

	  
}
}

function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
   

}
 
 </script>

    
  </div>
  
</div>
<div id="mydiv" >  </div>

<div id="fwxyz" >

<form  id="WXYZ" name="WXYZ1" method="post" action="http://localhost/cp/rpbexceldtdc.php">
<p>
<p><H3>
THE DATES AND CUSTOMER FOR WHICH EXCEL FILE WILL BE GENERATED</H3></p>
<input name="fde1" type="text" id="fde"  onfocus="callem()"/>
<input name="tde1" type="text" id="tde" onfocus="callem()" />
<input name="cde1" type="text" id="cde" onfocus="callem()" />
<input type="button" name="etoe" id="etoe" value="CHECK"  onclick="funexcel()" />
<input name="xyz22" id="xyz2" type="submit" value="CONVERT TO EXCEL" /> 
</p>
</form>
</div>
 <script type="text/javascript">
 
 function callem()
 {
	alert("Do not focus on these text box as you can't change any value now again select dates and press check !!!");
	document.getElementById("fde").value="";	 
	document.getElementById("tde").value="";
	document.getElementById("cde").value="";
	 
	 
 }
 
 
 function funexcel()
 {
	 var fdx = document.getElementById("fd").value;	 
	 var tdx = document.getElementById("td").value;
	 var ccdx = document.getElementById("ccd").value;
	 
	 if(fdx=="")
	 {
		 alert("please enter the from date");
		 document.getElementById("fd").focus();
		 javascript_abort()
	 }
	
	if(tdx=="")
	 {
		 alert("please enter the from date");
		 document.getElementById("fd").focus();
		javascript_abort()
	 }
	 if(ccdx=="PS")
	 {
		 alert("please enter the customer code");
		 document.getElementById("ccd").focus();
		javascript_abort()
	 }
	
	
var r=confirm("HAVE YOU ENTERED DETAILS CORRECT !!!!!!!!! ");
if (r==true)
  {
  alert("You pressed OK!");
//  var url = "http://localhost/cp/rpbexcel.php?a1="+fdx+"&b1="+tdx+"&c1="+ccdx;
  
document.getElementById("fde").value = document.getElementById("fd").value;
document.getElementById("tde").value = document.getElementById("td").value ; 
document.getElementById("cde").value = document.getElementById("ccd").value ; 
document.getElementById("xyz2").disabled=false;  
document.getElementById("fd").value = "";
document.getElementById("td").value = "";
document.getElementById("ccd").reset();
document.getElementById("fde").hidden = false;
document.getElementById("tde").hidden = false;
document.getElementById("cde").hidden  = false;
document.getElementById("fde").disabled = false;
document.getElementById("tde").disabled = false;
document.getElementById("cde").disabled = false;

}
}

/*function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
   

}*/
 
 </script>


</body>
</html>