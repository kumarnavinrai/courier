// JavaScript Document
var sitename="http://127.0.0.1/welcome14/cp/";
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
  alert("here");
   $.ajax({  
             type: "GET", url: sitename+"sercity.php?a1="+abc, 
			         complete: function(data){  
                 
				alert("ajax");
	            
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
  
 
  $.ajax({  
             type: "GET", url: sitename+"updatecef.php?a1="+cunox+"&b1="+desx+"&c1="+weightx+"&d1="+pordx+"&e1="+ambx+"&f1="+amcx+"&g1="+cucdx+"&h1="+dax+"&i1="+notex+"&j1="+spex+"&k1="+zonex+"&l1="+p1kgtx, 
			         complete: function(data){  
                 
				
	            $("#mydiverr").html()=data.responseText;
				
				
				}  
            
			});  
  
  
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
alert(xurl);
 $.ajax({  
             type: "GET", url: xurl, 
			         complete: function(data){  
                 
				
	            $("#mydiverr").html()=data.responseText;
				alert("ajax");
				
				}  
            
			});  



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
document.getElementById("abc").reset();


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
