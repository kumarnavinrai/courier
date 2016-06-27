<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once('calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['btn_cust2'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$exp,$expenses)=$obj->cbillincomegross(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH FOR COURIER NO</title>
<link href="../booksearch/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../booksearch/calendar/calendar.js"></script>
<style type="text/css">
#wrapper {
	height: auto;
	width: 1000px;
}
#wrapper #head {
	background-image: url(../images/header.jpg);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #footer {
	background-image: url(../images/Keating_Footer.jpg);
	float: left;
	height: 100px;
	width: 950px;
}
#wrapper #wrappersec {
	float: left;
	height: auto;
	width: 950px;
	border: 1px solid #666;
	margin-right: 25px;
	margin-left: 25px;
}
#wrapper #wrappersec #middel {
	float: left;
	height: auto;
	width: 950px;
	border: 1px solid #333;
	overflow: scroll;
	font-family: Calibri;
	font-size: 18px;
	font-weight: bolder;
	color: #063;
	text-decoration: none;
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
	width: 750px;
	padding-top: 10px;
	margin-left: 10px;
	padding-left: 200px;
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
#wrapper #wrappersec #formdiv #txtbtn #form1 #calanders {
	float: left;
	height: 25px;
	width: 300px;
}
#wrapper #wrappersec #formdiv #txtbtn #form1 #calanders #fc {
	float: left;
	height: 25px;
	width: 40px;
}
#wrapper #wrappersec #formdiv #txtbtn #form1 #calanders #fcc {
	float: left;
	height: 25px;
	width: 120px;
	font-family: Calibri;
	font-size: 12px;
	color: #000;
}
#wrapper #wrappersec #formdiv #txtbtn #form1 #calanders #tc {
	float: left;
	height: 25px;
	width: 30px;
}
#wrapper #wrappersec #formdiv #txtbtn #form1 #calanders #tcc {
	float: left;
	height: 25px;
	width: 110px;
	font-family: Calibri;
	font-size: 12px;
	color: #000;
	text-decoration: none;
}
.bclscls {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000;
	text-decoration: none;
	background-color: #F7F7F7;
}
.t1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFF;
	text-decoration: none;
	background-color: #666;
}
.txtr {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #333;
	text-decoration: none;
	background-color: #E1E1E1;
}
.txtdtxt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #666;
	text-decoration: none;
	text-align: left;
	border: 1px solid #999;
}
.tctd1txt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #EEE;
	text-decoration: none;
	background-color: #666;
	text-align: left;
}
</style>
<style type="text/css">
#wrapper #wrappersec #middel #table2 {
	float: left;
	height: auto;
	width: 800px;
}
#wrappersec #middel #d1 {
	float: left;
	height: 30px;
	width: 200px;
	text-align: left;
	padding-left: 25px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #EEE;
	text-decoration: none;
}
#wrappersec #middel #d2 {
	float: left;
	height: 30px;
	width: 200px;
	text-align: left;
	padding-left: 25px;
}
#wrappersec #middel #d2 #d3 {
	float: left;
	height: 30px;
	width: 950px;
}
#wrappersec #middel #d2 #d4 {
	float: left;
	height: 30px;
	width: 950px;
}
#wrappersec #middel #d2 #d5 {
	float: left;
	height: 30px;
	width: 950px;
}
#wrapper #wrappersec #middel #d3 {
	float: left;
	height: 30px;
	width: 200px;
	text-align: left;
	padding-left: 25px;
}
#wrapper #wrappersec #middel #d4 {
	text-align: left;
	float: left;
	height: 30px;
	width: 200px;
	padding-left: 25px;
}
#wrapper #wrappersec #middel #d5 {
	text-align: left;
	float: left;
	height: 30px;
	width: 200px;
	padding-left: 25px;
}
#wrapper #wrappersec #middel #tbl {
	float: left;
	height: auto;
	width: 800px;
	padding-left: 25px;
	margin-bottom: 25px;
}

#wrapper #wrappersec #middel #d1 #dii {
	float: left;
	height: 30px;
	width: 150px;
}
#wrapper #wrappersec #middel #d111 {
	float: left;
	height: 28px;
	width: 525px;
}
#wrapper #wrappersec #middel #d222 {
	float: left;
	height: 30px;
	width: 525px;
}
#wrapper #wrappersec #middel #d333 {
	float: left;
	height: 28px;
	width: 525px;
}
#wrapper #wrappersec #middel #d444 {
	float: left;
	height: 30px;
	width: 525px;
}
#wrapper #wrappersec #middel #d555 {
	float: left;
	height: 28px;
	width: 525px;
}
.btnp {
	background-color: #066;
	height: 20px;
	width: 200px;
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
	border: 1px solid #666;
}
#wrapper #wrappersec #footer #print {
	float: right;
	height: 20px;
	width: 950px;
}
#wrapper #wrappersec #head #print {
	float: right;
	height: 25px;
	width: 950px;
	margin-top: 10px;
}
#wrapper #wrappersec #head #printdiv {
	float: right;
	height: 50px;
	width: 800px;
	margin-top: 10px;
	margin-left: 20px;
	text-align: right;
}
#wrapper #wrappersec #head #txtboxdiv {
	float: left;
	height: 50px;
	width: 600px;
	margin-top: 20px;
}

.txttxttxtccc {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #666;
	text-decoration: none;
	background-color: #EEE;
}
.txtdtxtxtx {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #CCC;
	text-decoration: none;
}
</style>
<script type="text/javascript" src="../booksearch/sortTable.js"></script>


</head>

<body onLoad='initTable("table2");'>
<div id="wrapper">
  <div id="wrappersec">
    <div id="head"></div>
    <div id="slogan"> GROSS INCOME REPORT-<a href="<?php echo SITENAME; ?>">GO BACK</a></div>
    <div id="formdiv">
      <div id="txtbtn">
      <form id="form1" name="form1" method="post" action=""><div id="calanders">
        <div id="fc">From</div><div id="fcc"><?php
						$thisweek = date('W');
						$thisyear = date('Y');

						$dayTimes = getDaysInWeek($thisweek, $thisyear);
						//----------------------------------------

						$date1 = date('Y-m-d', $dayTimes[0]);
						$date2 = date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);

						function getDaysInWeek ($weekNumber, $year, $dayStart = 1) {
						  // Count from '0104' because January 4th is always in week 1
						  // (according to ISO 8601).
						  $time = strtotime($year . '0104 +' . ($weekNumber - 1).' weeks');
						  // Get the time of the first day of the week
						  $dayTime = strtotime('-' . (date('w', $time) - $dayStart) . ' days', $time);
						  // Get the times of days 0 -> 6
						  $dayTimes = array ();
						  for ($i = 0; $i < 7; ++$i) {
							$dayTimes[] = strtotime('+' . $i . ' days', $dayTime);
						  }
						  // Return timestamps for mon-sun.
						  return $dayTimes;
						}


					  $myCalendar = new tc_calendar("date3", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d', strtotime($date1)), date('m', strtotime($date1)), date('Y', strtotime($date1)));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow('2009-02-20', "", false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date2);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
					  ?></div><div id="tc">To</div><div id="tcc"><?php
					  $myCalendar = new tc_calendar("date4", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d', strtotime($date2)), date('m', strtotime($date2)), date('Y', strtotime($date2)));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1970, 2020);
					  //$myCalendar->dateAllow("", '2009-11-03', false);
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setDatePair('date3', 'date4', $date1);
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  $myCalendar->writeScript();
					  ?></div>
      </div>
      -
        <input name="btn_cust2" type="submit" class="btn" id="btn_cn_cust" value="GO" />
      </form>
      </div>
    </div>
    <div id="middel">
    <div id="tbl">
    <table width="710" bordercolor="#000000" cellspacing="0" cellpadding="10">
    <tr>
      <td width="406">
    <table width="407">
    <tr><td  colspan="3" class="bclscls">Bills and Charges Details :</td></tr>
    <tr><td class="t1">Customer Name</td><td width="97" class="t1">Amount Billed</td><td width="112" class="t1">Amount Charged</td></tr>
	<?php if(isset($disp)){ echo $disp; } ?>
    </table>
    </td>
    <td colspan="8"></td>
    <td >
    <table>
    <tr><td colspan="4" class="bclscls">Expense Details</td></tr>
    <tr><td class="t1" >Sno.</td><td class="t1" >Expense Type:</td><td class="t1" >Amount:</td><td class="t1" >Date:</td></tr>
    <?php if(isset($expenses)){ echo $expenses; } ?>
    </table>
    </td>
    </tr>
    </table>
    </div>
<div class="tctd1txt" id="d1"> Between :</div><div class="txtdtxt" id="d111">
  <?php if(isset($fd)){ echo $fd; }?>
AND :
<?php if(isset($td)){ echo $td; } ?>
</div>
<div class="txttxttxtccc" id="d2">Amount Charged :</div><div class="txttxttxtccc" id="d222">
Rs
  <?php if(isset($amt)){ echo $amt; } ?>
</div>
<div class="tctd1txt" id="d3">Estemated Bill is :</div><div class="txtdtxt" id="d333">
  Rs
    <?php if(isset($sum)){ echo $sum; } ?>
</div>
<div class="txttxttxtccc" id="d4">Expenses : </div><div class="txttxttxtccc" id="d444">Rs
  <?php if(isset($exp)){ echo $exp; } ?>
</div>
<div class="tctd1txt" id="d5"> Gross Income  : </div><div class="txtdtxt" id="d555">Rs
  <?php if(isset($sum) && isset($amt)){  echo $amt-$sum+$exp; } ?>
</div>

  
    </div>
    <div id="footer"><form action="<?php echo SITENAME."print/grossincome.php"; ?>" method="post" enctype="multipart/form-data"><input type="text" name="pfd" id="pfdid" value="<?php if(isset($fd)){echo $fd; } ?>" style="visibility:hidden" />
<input type="text" name="ptd" id="ptdid" value="<?php if(isset($td)){echo $td; } ?>" style="visibility:hidden" /> <input name="btn_print" type="submit" class="btnp" value="PRINT PDF"/></form><form action="<?php echo SITENAME."print/grossincomeqp.php"; ?>" method="post" enctype="multipart/form-data"><input type="text" name="pfd" id="pfdid" value="<?php if(isset($fd)){echo $fd; } ?>" style="visibility:hidden" />
<input type="text" name="ptd" id="ptdid" value="<?php if(isset($td)){echo $td; } ?>" style="visibility:hidden" /> <input name="btn_print" type="submit" class="btnp" value="PRINT"/></form>
      <div id="dispmsg"></div>
    </div>
  </div>
  
</div>
</body>
</html></html>