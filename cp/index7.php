<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Courier | Billing | System</title>
<link href="courier billing system.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/default.css">

<!-- dd menu -->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
	background-image: url(back%20img/11949893781470530308pattern-line-explosion-0002.svg.med.png);
}

#text1{
	background-color:#FFFFFF;
}

#imglogo
{
	position:absolute;
	
	top:3cm;
	left:20cm;
	 height:400px;
width:400px;
	
	
}

</style>
</head>

<body>
<div id="head1">
  <div id="div1"></div>
  <div id="div2"></div>
  <div id="menu2">
    <ul id="sddm">
      <li><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Home</a>
        <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a href="http://localhost/CP/CrF.PHP">CUSTOMER ADD</a> <a href="http://localhost/CP/EDITCRF.php">CUSTOMER EDIT</a> <a href="http://localhost/CP/searchcust.php">FIND CUSTOMER </a> <a href="http://localhost/CP/CEF1.PHP">BILLING</a> <a href="http://localhost/CP/pb1.PHP">CHECK BILL</a> </div>
      </li>
      <li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">WORK</a>
        <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a href="http://localhost/CP/pb.PHP">RELEASE BILL</a> <a href="#">ESTIMATED DTDC BILL</a> <a href="http://localhost/CP/DCEF.PHP">LINK FOR LUCKY TO PUNCHING</a> <a href="http://localhost/CP/ratesearch.php">RATE SEARCH</a> </div>
      </li>
      <li><a href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()">TO DO</a>
        <div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a href="http://localhost/CP/billsearch.php">BILL SEARCH</a> <a href="#">EXPENSES</a> <a href="http://localhost/CP/payments/payment.php">BILL PAYMENT</a> <a href="http://localhost/CP/EDITCE.php">EDIT BILL ENTRY</a> <a href="http://localhost/CP/payments/paymentdetails.php">BILL PAYMENT DETAILS</a> </div>
      </li>
      <li><a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()">DTDC</a>
        <div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a href="http://localhost/CP/pbdtdc.PHP">BILL AND PROFIT(GROSS)</a> <a href="#">DTDC HOME</a> </div>
      </li>
      <li><a href="#" onmouseover="mopen('m5')" onmouseout="mclosetime()">Contact</a>
        <div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"> <a href="#">E-mail</a> <a href="#">Submit Request Form</a> <a href="#">LIVE CHAT</a> </div>
      </li>
    </ul>
  </div>
  <div id="div3">
    <div id="div33"></div>
    <div id="sec1"></div>
    <div id="sec2"></div>
    <div id="sec3"></div>
    <div id="sec4"></div>
  </div>
  <div id="div4"></div>
  <div id="div5"></div>
</div>
</body>
</html>
