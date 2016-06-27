<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURIER BILLING SYSTEM</title>

<script language="javascript" type="text/javascript" src="datetimepicker.js">

</script>

<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<style type="text/css">
<!--
.style2 {
	color: #CCCCCC
}
#form1 p label {
	font-family: Arial, Helvetica, sans-serif;
}
#abc p {
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-image: url(back2.jpg);
}
#ndiv
{
	position:absolute;
	left:3cm;
	top:3cm;
	right:5cm;
	bottom:2cm;
}

#sertb
{
	position:absolute;
	left:9.895cm;
	top:1.561cm;
}
.sp1 {
	font-family: Arial, Helvetica, sans-serif;
}
.pord1 {
	font-family: Arial, Helvetica, sans-serif;
}
.notes1 {
	font-family: Arial, Helvetica, sans-serif;
}
.H31 {
	font-family: Arial, Helvetica, sans-serif;
}
.Z1 {
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<script language="JavaScript" type="text/javascript">
function first()
{

document.getElementById("abc").reset();
document.getElementById("cuno").focus();
document.getElementById("p1kgt").disabled= true ;
document.getElementById("amb").disabled= true ;
	document.getElementById("amc").disabled= true ;
	
}
</script>
</head>

<body onload="first()" >


<div id="mydiverr"></div>
<label><H3 class="H31">PLEASE ENTER DETAILS OF CONSIGNMENT SENT AND SELECT RIGHT ZONE FOR YOUR DESTINATION</H3></label>


<div id="ndiv" style="border:3px solid black">
<form id="abc" name="abc" action="" >
<table width="900" height="460" border="0">
  <tr>
    <td width="375"><span class="style1">Fields marked with * are compulsary</span></td>
    
  </tr>
  <tr>
    <td><span class="style1">Courier No*
      <input name="cuno" type="text" id="cuno" value="Z" />
    </span></td>
    <td width="615"><span class="sp1">SPECIAL</span>
      <select name="spe2" id="spe"  onchange="chspe()"  >
        <option>yes</option>
        <option selected="selected">no</option>
      </select></td>
  </tr>
  <tr>
    <td><span class="style1">Destination*
      <input type="text" name="des" id="des"  onkeyup="displayunicode(event)" />
    </span></td>
    <td><span class="style1">
      <input name="sctext1" disabled="disabled" id="sctext"  />
      <label for="spe"></label>
      <label><span class="dots">...</span> Booked From Jalandhar</label>
    </span></td>
  </tr>
  <tr>
    <td><span class="Z1">ZONE</span><select name="zone" id="zone" >
  <option value="SHIPPER" selected="selected">SHIPPER</option>
  <option value="ZONE">ZONE</option>
  <option value="ROI">REST OF INDIA</option>
</select></td>
    
  </tr>
  <tr>
    <td><span class="style1">Weight
      <select name="weight" id="weight"  onchange="selch()" >
        <option value="250" selected="selected">D250G</option>
        <option value="500">D500G</option>
        <option value="1000">D1KG</option>
        <option value="parcel1kg">P1KG</option>
      </select>
      <input name="p1kgt" type="text" id="p1kgt" value="1" />
      KG    </span></td>
    <td><span class="pord1">PARCEL or DOCUMENT</span><select name="pord" id="pord">
  <option value="parcel">Parcel</option>
  <option value="document" selected="selected">Document</option>
</select></td>
  </tr>
  <tr>
    <td><span class="style1">CUSTOMER CODE*
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
    </span></td>
    <td><span class="style1">DATE*
      <input name="da" type="text" disabled="disabled" id="da"  />
      <a href="javascript:NewCal('da','ddmmyyyy')"><img src="cal.gif" width="24" height="19" border="0" alt="Pick a date" onclick="callsdcheck1()" onkeypress="callsdcheck1()" onkeydown="callsdcheck1()" onkeyup="callsdcheck1()" /></a>    DD-MM-YYYY</span></td>
  </tr>
  <tr>
    <td><span class="style1">AMOUNT BILLED
      <input name="amb" type="text" id="amb" value="0" />
    </span></td>
    <td><span class="style1">AMOUNT CHARGED
      <input name="amc" type="text" id="amc" value="0" />
    </span></td>
  </tr>
  <tr>
    <td><span class="notes1">NOTES</span><textarea name="note" id="note" cols="45" rows="5">empty</textarea></td>
    <td><input type="button" name="SUB" id="SUB" value="ADD TO BILL" onclick="adde()"   /></td>
  </tr>
</table>

  <label><span class="style1"><br />
  </span></label>
  <div id="sertb"></div>
  <p>&nbsp;</p>
  <p>
    <label>  </label>
  </p>
  <p>
    <label><span class="style1"></span></label>
  </p>
  <p>    <span class="style1">
      <label> </label>
</span></p>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
    <label><span class="style2"><span class="style1">....................</span>......................................................................</span></label>
  </p>
  <p>&nbsp;</p>
</form>
</div>
<a href="index.php"><img src="BACKB.png" width="93" height="83" alt="BACK" /></a></div>

<script type="text/javascript">
//*********************************function to display key code start and find city
function displayunicode(e){
var unicode=e.keyCode;//? e.keyCode : e.charCode;
//alert(unicode);
var abc = document.getElementById("des").value;

//alert(abc);

 var url = "http://192.168.0.234/cp/sercity.php?a1="+abc;
  
  
  if (window.XMLHttpRequest)
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
aser.send();




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
</script>

<script type="text/javascript">
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
  var url = "http://192.168.0.234/cp/speentry.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
  
  
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
    document.getElementById("mydiverr").innerHTML=entryxspe.responseText;
	
    }
  }

 
entryxspe.open("GET",url,true);
entryxspe.send();

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
var url = "http://192.168.0.234/cp/addentrys.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ZONE")
{
var url = "http://192.168.0.234/cp/addentryz.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ROI")
{
var url = "http://192.168.0.234/cp/addentryr.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

}
//*********************PARCEL END
	
//*********************************DUCUMENT START

if(pordx=="document")
{
//document brace open
if(zonex=="SHIPPER")
{
var url = "http://192.168.0.234/cp/addentrys.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}
if(zonex=="ZONE")
{
var url = "http://192.168.0.234/cp/addentryz.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}

if(zonex=="ROI")
{
var url = "http://192.168.0.234/cp/addentryr.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx;
}
}
//***************************************************document brace close


if (window.XMLHttpRequest)
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
entryx.send();

document.getElementById("cuno").value = "";
document.getElementById("des").value = "";
document.getElementById("weight").value = "D250";
document.getElementById("da").value = "";
document.getElementById("p1kgt").value = "1";

document.getElementById("abc").reset();
document.getElementById("cuno").focus();
document.getElementById("p1kgt").disabled= true ;
document.getElementById("amb").disabled= true ;
document.getElementById("amc").disabled= true ;

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
</body>
</html>
