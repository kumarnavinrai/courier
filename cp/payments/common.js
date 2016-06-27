// JavaScript Document
function checkform()
{
	
	var amt=document.getElementById('apntxtid').value;
	var billno=document.getElementById('billnoid').value;
	
	if(billno==""){
		alert("Please Process Payment");
		document.getElementById('btncustid').focus();
		javascript_abort();
	}
	
	
	var dc=/^[a-zA-Z0-9(\s)]+$/; 
	
	/*if (dc.test(amt))
		{
		true;
		}
		else
		{
		alert("Only enter Characters and Digits ");
		document.getElementById('amtid').focus();
		document.abc.cuno.focus();
		javascript_abort();
		}*/
		
		
		var dc=/^[a-zA-Z(\s)]+$/; 
	
	/*if (dc.test(amt))
		{
		true;
		}
		else
		{
		alert("Only enter Characters");
		document.getElementById('amtid').focus();
		//document.abc.des.focus();
		javascript_abort();
		}*/


 var dc=/^[0-9.(\s)]+$/; 
	
	if (dc.test(amt))
		{
		true;
		var tot=document.getElementById('amtid').value;
		var bal=tot-amt;
		document.getElementById('aptxtid').value=bal;
		}
		else
		{
		alert("Only enter Digits only ");
		document.getElementById('apntxtid').focus();
		javascript_abort();
		}
		
		if(document.getElementById('btnverifyid').style.visibility=="visible"){
			document.getElementById('btnverifyid').style.visibility="hidden";
			document.getElementById('btn_payid').style.visibility="visible";
		}else if(document.getElementById('btnverifyid').style.visibility=="hidden"){
		    document.getElementById('btnverifyid').style.visibility="visible";
			document.getElementById('btn_payid').style.visibility="hidden";
		}
			
		
		
	
	}