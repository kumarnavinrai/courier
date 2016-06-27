<?php require_once("projectconstant.php"); require_once("php/classes.class.php"); ?>
<?php //if(isset($_GET['cuno'])){ echo "Form Submitted"; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURIER BILLING SYSTEM</title>
<!--<script language="javascript" src="js/ucef.js" ></script>-->
<script type="text/javascript" >
// JavaScript Document
var sitename="http://subcp1.dekhfashion.com/";
function first()
{

document.getElementById("abc").reset();
document.getElementById("cuno").focus();
//document.getElementById("p1kgt").disabled= true ;
//document.getElementById("amb").disabled= true ;
	//document.getElementById("amc").disabled= true ;
document.getElementById("ndiv").style.display = "none";
}

function fillv()
{
//**********************************************************************

var cucdt=document.getElementById("tempcd").value;
var spet = document.getElementById("temps").value;
var pordt = document.getElementById("temppd").value;
var weightt = document.getElementById("tempw").value;
var tid = document.getElementById("si").value;

//*****************************************************



//document.getElementById("cucd").selectedIndex=tid;


//******************************************************
if(spet=="yes")
document.getElementById("spe").selectedIndex=0;
if(spet=="no")
document.getElementById("spe").selectedIndex=1;

//**************************************
if(pordt=="parcel")
document.getElementById("pord").selectedIndex=0;
if(pordt=="document")
document.getElementById("pord").selectedIndex=1;
//**********************************************
if(weightt=="250")
document.getElementById("weight").selectedIndex=0;
if(weightt=="500")
document.getElementById("weight").selectedIndex=1;
if(weightt=="1000")
document.getElementById("weight").selectedIndex=2;
if(weightt=="parcel1kg")
document.getElementById("weight").selectedIndex=3;

var state = document.getElementById("ndiv").style.display;
            if (state == "block") {
                document.getElementById("ndiv").style.display = "none";
            } else {
                document.getElementById("ndiv").style.display = "block";
            }

//document.getElementById("ndiv").style.display="none";

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//*********************************function to display key code start and find city
function displayunicode(e){
var unicode=e.keyCode;//? e.keyCode : e.charCode;
//alert(unicode);
var abc = document.getElementById("des").value;

//alert(abc);

 var url = sitename+"sercity.php?a1="+abc;
  
   $.ajax({  
             type: "GET", url: sitename+"sercity.php?a1="+abc, 
			         complete: function(data){  
                 
				
	            
				document.getElementById("sctext").value=data.responseText;
	            var res = data.responseText;
	            filltext(res);
				
				}  
            
			});  
  
  
  
/*  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  aser=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  aser=new ActiveXObject("Microsoft.XMLHTTP");
  }
aser.onreadystatechange=function()
  {
  if (aser.readyState==4 && aser.status==200)
    {
    document.getElementById("sctext").value=aser.responseText;
	var res = aser.responseText;
	filltext(res);
    }
  }

 
aser.open("GET",url,true);
aser.send(); */




if(unicode ==13)
{
//alert("this is 13 !!!!");

document.getElementById("des").value=document.getElementById("sctext").value;

	
}

}
//*******************************************main function brace close

//******************************function fill text start

function filltext(str)
{

var len = str.length;
var textboxcall=0;
var string="";
var index;
index = str.indexOf("*");
var x = index;


for(x=x+1;x<=len;x++)
{

var check = str.charAt(x);
												
		
						if(check == "*")
							{
							document.getElementById("sctext").value=string;
							
							}
							
							
						if(check != "*" )
							{
							string += check;
							}
}


}

//*******************************function fill text end
function findcity()
{
	var abc = document.getElementById("des").value;
	
	alert(abc);
	
}

//*********************************function to display key code stop and find city
//*********************************checking shipper and destination

function callsdcheck1()
{
	
var q = confirm("HAVE SELECTED RIGHT ZONE FOR THIS DESTINATION AND HAVE YOU SELECTED RIGHT CUSTOMER !!!");

	
if(q==true)
{
	
}
if(q==false)
{
document.getElementById("zone").focus();

javascript_abort();
	
}

}


function callsdcheck()
{
	
var q = confirm("HAVE SELECTED RIGHT ZONE FOR THIS DESTINATION AND HAVE YOU SELECTED RIGHT CUSTOMER !!!");

	
if(q==true)
{
	
}
if(q==false)
{
document.getElementById("zone").focus();

javascript_abort();
	
}

}





//***********************************checking shipper destination
//**********************************checking special
function chspe()
{
	
var check = document.getElementById("spe").value;

if(check == "yes")
{
	
	document.getElementById("amb").disabled= false ;
	document.getElementById("amc").disabled= false ;
	document.getElementById("amb").focus();
	
}

if(check == "no")
{

document.getElementById("amb").disabled= true ;
document.getElementById("amc").disabled= true ;
}
}

//**********************************checking special
//*********************************function for select change
function selch()
{
	
var check = document.getElementById("weight").value;

if(check == "parcel1kg")
{
	
	document.getElementById("p1kgt").disabled= false ;
	document.getElementById("p1kgt").focus();
	
}

if(check != "parcel1kg")
{
	
	document.getElementById("p1kgt").disabled= true ;
	
	
}
}
//*********************************function for select change ENDS

//************************************ FUNCTION TO ADD ENTRY START MAIN FUNCTION
function adde()
{
	callsdcheck();
	
//alert(" i am running");
var cunox = document.getElementById("cuno").value;
//alert (cunox);
var spex = document.getElementById("spe").value;
//alert (spex);

var desx = document.getElementById("des").value;
//alert (desx);
var weightx = document.getElementById("weight").value;
//alert (weightx);

var p1kgtx = document.getElementById("p1kgt").value;
//alert (p1kgtx);
var pordx = document.getElementById("pord").value;
//alert (pordx);
var ambx = document.getElementById("amb").value;
//alert (ambx);
var amcx = document.getElementById("amc").value;
//alert (amcx);
var cucdx = document.getElementById("cucd").value;
//alert (cucdx);
var dax = document.getElementById("da").value;
//alert (dax);
var notex = document.getElementById("note").value;
//alert (notex);
var zonex = document.getElementById("zone").value;

var p1kgtx = document.getElementById("p1kgt").value;


//***************************************validation start


 if(cunox=="")
 {
	  alert("Please enter Cosignment No");
	  document.abc.cuno.focus();
 	  javascript_abort();
     }


var dc=/^[a-zA-Z0-9(\s)]+$/; 
	
	if (dc.test(cunox))
		{
		true;
		}
		else
		{
		alert("Only enter Characters and Digits ");
		document.abc.cuno.focus();
		javascript_abort();
		}
	


if(desx=="")
 {
	  alert("Please enter Destination Station");
	  document.abc.des.focus();
 	  javascript_abort();
     }


var dc=/^[a-zA-Z(\s)]+$/; 
	
	if (dc.test(desx))
		{
		true;
		}
		else
		{
		alert("Only enter Characters");
		document.abc.des.focus();
		javascript_abort();
		}



if(weightx=="parcel1kg" && p1kgtx=="")
 {
	  alert("Please enter weight of the parcel");
	  document.abc.p1kgt.focus();
 	  javascript_abort();
     }
	 
	 var dc=/^[0-9(\s)]+$/; 
	
	if (dc.test(p1kgtx))
		{
		true;
		}
		else
		{
		alert("Only enter Digits only ");
		document.abc.p1kgt.focus();
		javascript_abort();
		}



if(weightx=="parcel1kg" && pordx=="document")
 {
	  alert("Please change to parcel as you are entering parcel data");
	  document.abc.pord.focus();
 	  javascript_abort();
     }

if(cucdx=="PS")
 {
	  alert("Please Select a customer code");
	  document.abc.cucd.focus();
 	  javascript_abort();
     }

if(dax=="")
 {
	  alert("Please enter date on which consignment was sent");
	  document.abc.da.focus();
 	  javascript_abort();
     }

if(spex=="yes" && ambx=="0" )
 {
	  alert("Please enter billing amount as this consignment was sent as special.");
	  document.abc.amb.focus();
 	  javascript_abort();
     }

if(spex=="yes" && amcx=="0")
 {
	  alert("Please enter charged amount as this consignment was sent as special.");
	  document.abc.amc.focus();
 	  javascript_abort();
     }

if(spex=="yes" && ambx=="" )
 {
	  alert("Please enter billing amount as this consignment was sent as special.");
	  document.abc.amb.focus();
 	  javascript_abort();
     }

if(spex=="yes" && amcx=="")
 {
	  alert("Please enter charged amount as this consignment was sent as special.");
	  document.abc.amc.focus();
 	  javascript_abort();
     }

var dc=/^[0-9(\s)]+$/; 
	
	if (dc.test(ambx))
		{
		true;
		}
		else
		{
		alert("Only enter Digits only ");
		document.abc.amb.focus();
		javascript_abort();
		}
		
var dc=/^[0-9(\s)]+$/; 
	
	if (dc.test(amcx))
		{
		true;
		}
		else
		{
		alert("Only enter Digits only ");
		document.abc.amc.focus();
		javascript_abort();
		}



//**************PARCEL + PARCEL CHECK
if(weightx == "parcel1kg" && pordx == "document")
{
	
	alert("Please select parcel for parcel");
	document.getElementById("pord").focus();
	 	  javascript_abort();

	
}

if(weightx != "parcel1kg" && pordx != "document")
{
	
	alert("Please select proper weight or parcel or document");
	document.getElementById("pord").focus();
	 	  javascript_abort();

	
}

//*************PARCEL + PARCEL CHECK



//************************************validation end

//************************************special starts
if (spex== "yes")
{
//alert("speical working");

var r=confirm("HAVE YOU ENTERED SPECIAL C\N DETAILS CORRECT !!!!!!!!! ");
if (r==true)
  {
  alert("You pressed OK!");
  var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
  
 
  /*$.ajax({  
             type: "GET", url: sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx, 
			         complete: function(data){  
                 
				
	            $("#mydiverr").html()=data.responseText;
				
				
				}  
            
			});*/  
  
  
  /*if (window.XMLHttpRequest)
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
    document.getElementById("mydiverr").innerHTML=entryxspe.responseText;
	
    }
  }

 
entryxspe.open("GET",url,true);
entryxspe.send(); */

document.getElementById("cuno").value = "";
document.getElementById("des").value = "";
document.getElementById("weight").value = "D250";
document.getElementById("da").value = "";
document.getElementById("p1kgt").value = "1";

document.getElementById("abc").reset();
  
  
  }
else
  {
  alert("You pressed Cancel!");
  }

javascript_abort();	
}

//***********************************special ends


//**************************CONFIRMATION STAET

var rC=confirm("HAVE ENTERED C\N DETAILS CORRECT !!!!");
if (rC==true)
  {
  //alert("You pressed OK!");
  }
else
  {
	  javascript_abort();
  //alert("You pressed Cancel!");
  }

//*************************CONFIRMATION END



//alert(pordx);
//*************************************PARCEL START

if(pordx=="parcel")
{
	//alert("i am parcel");
weightx=p1kgtx;
if(zonex=="SHIPPER")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ZONE")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ROI")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

}
//*********************PARCEL END
	
//*********************************DUCUMENT START

if(pordx=="document")
{
//document brace open
if(zonex=="SHIPPER")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}
if(zonex=="ZONE")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ROI")
{
var url = sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}
}
//***************************************************document brace close

xurl=url;


 /*$.ajax({  
             type: "GET", url: xurl, 
			         complete: function(data){  
                 
				
	            $("#mydiverr").html()=data.responseText;
				alert("ajax");
				
				}  
            
			}); */ 



/*if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  entryx=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  entryx=new ActiveXObject("Microsoft.XMLHTTP");
  }
entryx.onreadystatechange=function()
  {
  if (entryx.readyState==4 && entryx.status==200)
    {
    document.getElementById("mydiverr").innerHTML=entryx.responseText;
	
    }
  }

 
entryx.open("GET",url,true);
entryx.send();*/

/*document.getElementById("cuno").value = "";
document.getElementById("des").value = "";
document.getElementById("weight").value = "D250";
document.getElementById("da").value = "";
document.getElementById("p1kgt").value = "1";

document.getElementById("abc").reset();
document.getElementById("cuno").focus();
document.getElementById("p1kgt").disabled= true ;
document.getElementById("amb").disabled= true ;
document.getElementById("amc").disabled= true ;
document.getElementById("abc").reset();*/


}
//************************************ FUNCTION TO ADD ENTRY START MAIN FUNCTION ENDS
//*************abort javascript function

function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
document.getElementById("abc").reset();
document.getElementById("cuno").focus();
document.getElementById("p1kgt").disabled= true ;
document.getElementById("amb").disabled= true ;
	document.getElementById("amc").disabled= true ;

}



</script>
<!-----------              ------------>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<?php 
$cunoz = $_GET["cuno"];
$cucdz = $_GET["cucd"];
$spez = $_GET["spe"];
$desz = $_GET["des"];
$zonez = $_GET["zone"];
$weightz = $_GET["weight"];
$p1kgtz = $_GET["p1kgt"];
$pordz = $_GET["pord"];
$daz =$_GET["da"];
$ambz = $_GET["amb"];
$amcz = $_GET["amc"];
$notez = $_GET["note"];
?>
<style type="text/css">
#wrapper {
	height: 820px;
	width: 950px;
	border: 2px double #11396A;
}
#wrapper #head {
	background-image: url(images/OUICK.jpg);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #mydiverr {
	font-family: Calibri;
	font-size: 12px;
	font-weight: bold;
	color: #036;
	text-decoration: none;
	text-align: center;
	float: left;
	height: 30px;
	width: 950px;
	background-color: #EEE;
}
#wrapper # {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #069;
	text-decoration: none;
	background-color: #BCF;
	float: left;
	height: 30px;
	width: 950px;
	text-align: center;
}
#wrapper #btndivid {
	text-align: center;
	float: left;
	height: 30px;
	width: 950px;
}
#wrapper #formdivid {
	float: left;
	height: 500px;
	width: 950px;
}
#wrapper #formdivid #abc #ndiv {
	float: left;
	height: 475px;
	width: 925px;
	text-align: left;
	padding-left: 25px;
}
#wrapper #formdivid #abc #downtxtboxid {
	float: left;
	height: 30px;
	width: 950px;
}
#wrapper #footer {
	background-image: url(images/affinity-artifacts.jpg);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #head #gbdivid {
	float: right;
	height: 25px;
	width: 200px;
	margin-top: 10px;
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
}
#wrapper #txtdivid11 {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #FC6;
	background-color: #11396A;
	text-align: center;
	float: left;
	height: 30px;
	width: 950px;
}
.btn1 {
	color: #11396A;
	background-color: #FC6;
	height: 25px;
	width: 450px;
	border: 1px solid #11396A;
}
.btn2 {
	color: #FC6;
	background-color: #036;
	border: 1px solid #006;
}
.txtbox {
	font-family: Calibri;
	color: #002C58;
	text-decoration: none;
	border: 1px solid #006;
}
.lblcls {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #036;
	text-decoration: none;
	text-align: right;
}
</style>
</head>
<body onload="first()" >
<div id="wrapper">
<div id="head">
 <a href="<?php echo $sitename; ?>"><div id="gbdivid">GO BACK</div></a></div>
<div id="mydiverr"></div>
<div id="txtdivid11">PLEASE CHANGE DETAILS OF CONSIGNMENT SENT AND SELECT RIGHT ZONE FOR YOUR DESTINATION AND CLICK UPDATE</div>
<div id="btndivid"><input type="button" class="btn1" onclick="fillv()" value="PLEASE CLICK ME TO CONTINUE EDITING OF THIS FORM"/></div>
<div id="formdivid">
<form id="abcid" name="abc" method="get" action="updatecef.php" >
<!-------------------------------------------------------------->
<div id="ndiv">
<table width="900" height="460" border="3" id="mtab">
  <tr bgcolor="#FF9900">
    <td width="193" class="lblcls">COURIER NO*</td>
    <td width="212"><input name="cuno" type="text" class="txtbox" id="cuno" value="<?php echo $cunoz; ?>" /><input name="cunohidden" type="text" value="<?php echo $cunoz; ?>" style="visibility:hidden"/>
      </td>
    <td width="134" class="lblcls">SPECIAL</td>
    <td width="343"><select name="spe" class="txtbox" id="spe"  onchange="chspe()"  >
      <option>yes</option>
      <option selected="selected">no</option>
      </select></td>
  </tr>
  <tr bgcolor="#FFCC66">
    <td class="lblcls">DESTINATION*</td>
    <td>
      <input name="des" type="text" class="txtbox" id="des"  onkeyup="displayunicode(event)" value="<?php echo $desz; ?>" />
    </td>
    <td colspan="2" class="lblcls">
      <input name="sctext1" disabled="disabled" id="sctext"  />
       BOOKED FROM JALANDHAR</td>
  </tr>
  <tr bgcolor="#FF9900">
    <td class="lblcls">ZONE</td>
    <td><select name="zone" class="txtbox" id="zone" >
      <option value="SHIPPER" selected="selected">SHIPPER</option>
      <option value="ZONE">ZONE</option>
      <option value="ROI">REST OF INDIA</option>
    </select></td>
    <td></td><td></td>
  </tr>
  <tr bgcolor="#FFCC66">
    <td class="lblcls">WEIGHT</td>
    <td>
      <select name="weight" class="txtbox" id="weight"  onchange="selch()" >
        <option value="250" selected="selected">D250G</option>
        <option value="500">D500G</option>
        <option value="1000">D1KG</option>
        <option value="parcel1kg">P1KG</option>
      </select>
      <input name="p1kgt" type="text" id="p1kgt" value="<?php echo $p1kgtz; ?>" size="6" />
      <span class="lblcls">KG</span></td>
    <td class="lblcls">PARCEL or DOC</td>
    <td><select name="pord" class="txtbox" id="pord">
      <option value="parcel">Parcel</option>
      <option value="document" selected="selected">Document</option>
    </select></td>
  </tr>
  <tr bgcolor="#FF9900">
    <td class="lblcls">
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
$tempid=0;
?>
CUSTOMER CODE*
<!--/*********************for select**************/-->
    
     <!--<span class="style1">CUSTOMER CODE*
      <select name="cucd" id="cucd" >
<option value="PS" selected="">PLEASE SELECT</option>
<option value="mp">MP</option>
<option value="jr">JR</option>
<option value="jma">JMA</option>
<option value="britania">BRITANIA</option>
<option value="everfresh">EVERFRESH</option>
<option value="nddb">NDDB</option>
<option value="vm">VM</option>
      </select> -->
      <label for="ccddup"></label>
      <input name="ccddup" type="text" disabled="disabled" id="ccddup" readonly="readonly" value="<?php echo $cucdz;  ?>" style="visibility:hidden" size="4" />
    </td>
    <td>
      <select name="cucd" class="txtbox" id="cucd">
        <option value="PS">Please Select</option>
        <?php
while($row = mysql_fetch_array($result))
{
//echo $row["ccode"];
//echo $row[1];

?>    <?php
	if($row["ccode"]==$cucdz)
	{
		?><option value="<?php echo $row["ccode"];?>" selected="selected"><?php echo $row["ccode"];?></option><?php
		$tempid=$row["id"];
	}else{ ?><option value="<?php echo $row["ccode"];?>"><?php echo $row["ccode"];?></option> <?php }

}
?>
        
    
      </select>
    </td>
    <td class="lblcls">DATE*</td>
    <td><input name="dann" type="text"  readonly="readonly" id="da"  value="<?php echo $daz; ?>" size="6" />
      <a href="javascript:NewCal('da','ddmmyyyy')"><img src="cal.gif" width="24" height="19" border="0" alt="Pick a date" onclick="callsdcheck1()" onkeypress="callsdcheck1()" onkeydown="callsdcheck1()" onkeyup="callsdcheck1()" />DD-MM-YYYY</a></span></td>
  </tr>
  <tr bgcolor="#FFCC66">
    <td class="lblcls">AMOUNT BILLED</td>
    <td><input name="amb" type="text" class="txtbox" id="amb" value="<?php echo $ambz; ?>" />
    </td>
    <td class="lblcls">AMT CHARGED</td>
    <td> <input name="amc" type="text" class="txtbox" id="amc" value="<?php echo $amcz; ?>" />
    </span></td>
  </tr>
  <tr bgcolor="#FF9900">
    <td colspan="2"><span class="lblcls">NOTES</span><textarea name="note" cols="45" rows="2" class="txtbox" id="note"><?php echo $notez; ?></textarea></td>
    <td colspan="2"><input name="SUB" type="button" class="btn2" id="SUB" onclick="adde()" value="CHECK"   />__<input name="SUB" type="submit" class="btn2" id="SUB" value="UPDATE TO BILL"   /></td>
  </tr>
</table>
</div>
  
<div id="downtxtboxid">
    <input name="tempcd" type="text" disabled="disabled" id="tempcd" value="<?php echo $cucdz; ?>" style="visibility:hidden" />
    <input type="text" name="tempz" id="tempz" value="<?php echo $zonez; ?>" style="visibility:hidden" />
    <input type="text" name="temps" id="temps" value="<?php echo $spez; ?>" style="visibility:hidden" />
    <input type="text" name="tempw" id="tempw" value="<?php echo $weightz; ?>"  style="visibility:hidden"/>
    <input type="text" name="temppd" id="temppd" value="<?php echo $pordz; ?>" style="visibility:hidden"/>
      <label for="si"></label>
      <input type="text" name="si" id="si"  value="<?php echo $tempid;?>" style="visibility:hidden"/>
</div>  
  <!-------------------------------------------------------------->
</form>
</div><!--formdiv -->
<div id="footer"></div>
</div><!--wrapper -->
</body>
</html>
