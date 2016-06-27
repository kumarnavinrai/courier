<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php");
if(isset($_POST['btn_cn'])){ $obj=new nusearch(); $disp=$obj->searchcn(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH FOR COURIER NO</title>
<style type="text/css">
#wrapper {
	height: 650px;
	width: 1000px;
}
#wrapper #head {
	background-image: url(../images/JBanner-004.png);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #footer {
	background-image: url(../images/images44.jpg);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #wrappersec {
	float: left;
	height: 650px;
	width: 950px;
	border: 1px solid #666;
	margin-right: 25px;
	margin-left: 25px;
}
#wrapper #wrappersec #middel {
	float: left;
	height: 300px;
	width: 950px;
	border: 1px solid #333;
	overflow: scroll;
}
#wrapper #wrappersec #slogan {
	font-family: Calibri;
	font-size: 36px;
	color: #F00;
	text-decoration: none;
	float: left;
	height: 80px;
	width: 950px;
	text-align: center;
	padding-top: 20px;
}
#wrapper #wrappersec #formdiv {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #999;
	text-decoration: none;
	float: left;
	height: 50px;
	width: 950px;
}
#wrapper #wrappersec #formdiv #txtbtn {
	font-family: Calibri;
	font-size: 17px;
	font-weight: bold;
	color: #999;
	text-decoration: none;
	float: left;
	height: 40px;
	width: 430px;
	margin-right: 250px;
	margin-left: 250px;
	padding-top: 10px;
	padding-left: 20px;
}
#wrapper #wrappersec #formdiv #txtbtn #form1 #btn_cn {
	background-color: #093;
	height: 20px;
	width: 75px;
	border: 1px solid #000;
	margin-left: 10px;
}
#wrapper #wrappersec #middel table {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #CCC;
}
.txt {
	font-family: Calibri;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}
.txtn {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #093;
	text-decoration: none;
}
</style>
</head>

<body>
<div id="wrapper">
  <div id="wrappersec">
    <div id="head"></div>
    <div id="slogan">Enter Courier Number To See Status--<a href="<?php  echo SITENAME; ?>">GO TO MAIN SITE</a></div>
    <div id="formdiv">
      <div id="txtbtn">
      <form id="form1" name="form1" method="post" action="">
        <label for="cno">CONSIGNMENT NUMBER</label>
        <input type="text" name="cno" id="cnoid" />
        <input type="submit" name="btn_cn" id="btn_cn" value="Submit" />
      </form>
      </div>
    </div>
    <div id="middel">
	<table width="auto" border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#666666">
  <tr>
    <th class="txt" scope="col">CUSTOMER</th>
    <th class="txt" scope="col">C NO.</th>
    <th class="txt" scope="col">SPECIAL</th>
    <th class="txt" scope="col">DESTINATION</th>
    <th class="txt" scope="col">WEIGHT</th>
    <th class="txt" scope="col">P or D</th>
    <th class="txt" scope="col">BILL AMT</th>
    <th class="txt" scope="col">AMOUNT</th>
    <th class="txt" scope="col">DATE</th>
    <th class="txt" scope="col">NOTES</th>
  </tr>
 <?php if(isset($disp)){ echo $disp; } ?>
</table>
   
    </div>
    <div id="footer"></div>
  </div>
  
</div>
</body>
</html>