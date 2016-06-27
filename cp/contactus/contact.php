<?php require_once("../php/projectConstant.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Search</title>
<script type="text/javascript">
function addf()
{
var aa1=document.getElementById('a1id').value;	
var a=document.getElementById('hsitenameid').value;
if(aa1!=""){ 
location.href= a+"qtodo/btodo/payments/searchpayment/"+aa1;
}else{ alert("Enter Expense No"); document.getElementById('a1id').focus(); }
	
}
</script>
<style type="text/css">
#wrapper {
	height: 700px;
	width: 950px;
}
#wrapper #maindiv {
	margin: 50px;
	float: left;
	height: 600px;
	width: 900px;
}
#wrapper #maindiv #head {
	float: left;
	height: 100px;
	width: 900px;
	background-image: url(../images/Keating_Footer.jpg);
}
#wrapper #maindiv #foot {
	float: left;
	height: 100px;
	width: 900px;
	background-image: url(../images/csb_header.jpg);
}
#wrapper #maindiv #middel {
	float: left;
	height: 100px;
	width: 900px;
	padding-top: 120px;
	padding-bottom: 120px;
}
#wrapper #maindiv #middel #t1lbl {
	float: left;
	height: 55px;
	width: 310px;
	text-align: right;
}
#wrapper #maindiv #middel #t1text {
	float: left;
	height: 55px;
	width: 525px;
	padding-left: 5px;
}
#wrapper #maindiv #btndiv {
	padding: 10px;
	float: left;
	height: 30px;
	width: 410px;
}
#wrapper #maindiv #middel #btndiv {
	float: left;
	height: 30px;
	width: 410px;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 420px;
}
#wrapper #maindiv #head #gtb {
	padding: 10px;
	float: right;
	height: 25px;
	width: 200px;
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #333;
	text-decoration: none;
}
.lbl {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #063;
	text-decoration: none;
}
.txt {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #066;
	text-decoration: none;
	width: 200px;
}
.btn {
	color: #CCC;
	background-color: #099;
	border: 1px solid #060;
}
</style>
</head>

<body>
 <div id="wrapper">
<div id="maindiv">
<div id="head">
  <a href="<?php echo SITENAME; ?>"><div id="gtb">GO BACK</div></a><input id="hsitenameid" name="hsitename" type="text" style="visibility:hidden" value="<?php echo SITENAME; ?>"/>
</div>
<div id="middel">
<div class="lbl" id="t1lbl">PRABHNOOR SOFTWARE 56A KALIA  </div>
<div id="t1text"><span class="lbl"> COLONY AMRITSAR ROAD JALANDHAR PUNJAB INDIA 144008 __PHONE 181-2602742, KUMARNAVINRAI@HOTMAIL.COM</span></div><div id="btndiv"></div>
</div>
<div id="foot"></div>
</div>
</div>
</body>
</html>