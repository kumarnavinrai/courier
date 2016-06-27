// JavaScript Document
var sitename="http://127.0.0.1/welcome14/cp/";
function loadme()
{
document.getElementById("serimg").disabled=false;	
document.getElementById("dsub").disabled=true;
	
}
///////////////////////////////////////////////////////////////////
function sere()
{
	
document.getElementById("serimg").disabled=true;
document.getElementById("dsub").disabled=false;	
var cnx	= document.getElementById("cuno").value;
var cdx	= document.getElementById("cucd").value;

if(cnx=="")
{
alert("PLEASE ENTER THE CONSIGNMENT NO.");
	document.getElementById("cuno").focus;
	javascript_abort();

}

if(cnx!="")
{
var dc=/^[a-zA-Z0-9(\s)]+$/; 
	
	if (dc.test(cnx))
		{
		true;
		}
		else
		{
		alert("Only enter Characters and Digits ");
		document.spe.cuno.focus();
		javascript_abort();
		}
}



if(cdx=="PS")
{
alert("PLEASE SELECT THE CUSTOMER !!!");
	document.getElementById("cucd").focus;
	javascript_abort();
}


var url = sitename+"sercn.php?a1="+cnx+"&b1="+cdx;
 
 $.ajax({  
             type: "GET", url: sitename+"sercn.php?a1="+cnx+"&b1="+cdx, 
			         complete: function(data){  
                  //  $("#downdivforser").html(data.responseText); 
				
				document.getElementById("cuno").value=data.responseText;
	            var res = data.responseText;
	            
				filltext(res);
				}  
            
			});  

 /* if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  aser1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  aser1=new ActiveXObject("Microsoft.XMLHTTP");
  }
aser1.onreadystatechange=function()
  {
  if (aser1.readyState==4 && aser1.status==200)
    {
    document.getElementById("cuno").value=aser1.responseText;
	var res = aser1.responseText;
	filltext(res);
    }
  }

  
aser1.open("GET",url,true);
aser1.send(); */
	
}
//*********************************** fill text start
function filltext(str)
{

var len = str.length;
var textboxcall=0;
var string="";
var index;
index = str.indexOf("*");
var x = index;
var ind = 0;



for(x=x+1;x<=len;x++)
{

var check = str.charAt(x);
												
		
						if(check == "*")
							{
							
							if(ind==0)
							{
							document.getElementById("cuno").value=string;
							}
							
							
							if(ind==1)
							{
								if(string=="yes")
								{
							    document.getElementById("spe").selectedIndex=0;
								}
								if(string=="no")
							    {
								document.getElementById("spe").selectedIndex=1;
								}
							}
							
							if(ind==2)
							{
							document.getElementById("des").value=string;
							}
							
							
							if(ind==3)
							{
							
							 if(string=="250")
							 {
							 document.getElementById("weight").selectedIndex=0;
							 }
							 if(string=="500")
							 {
							 document.getElementById("weight").selectedIndex=1;
							 }
							 if(string=="1000")
							 {
							 document.getElementById("weight").selectedIndex=2;
							 }
							 if(parseInt(string)<250)
							 {				
							 document.getElementById("weight").selectedIndex=3;
							 document.getElementById("p1kgt").value=string;
							 
							 }
							}
							 					
							
							
							
							if(ind==4)
							{
								if(string=="parcel")
							    {
								document.getElementById("pord").selectedIndex=0;
								}
								if(string=="document")
								{
								document.getElementById("pord").selectedIndex=1;
								}
							}
							
							
							if(ind==5)
							{
							document.getElementById("amb").value=string;
							}
							
							
							if(ind==6)
							{
							document.getElementById("amc").value=string;
							}
							
							
							if(ind==7)
							{
							document.getElementById("da").value=string;
							}
							
							
							if(ind==8)
							{
							document.getElementById("note").value=string;
							}
							
							
							string="";
							ind=ind+1;
							
							}
							
							
						if(check != "*" )
							{
							string += check;
							}
}


}
//*********************************************filltext end

function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
document.getElementById("spe").reset();

}