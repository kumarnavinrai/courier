// JavaScript Document
var sitename="http://127.0.0.1/welcome14/cp/";
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
  var url = sitename+"rpb.php?a1="+fdx+"&b1="+tdx+"&c1="+ccdx;
  
  
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
