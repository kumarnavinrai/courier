<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once('calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['btn_sn_cust'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$custcode)=$obj->cbillcustamt(); 
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
	float: left;
	height: 100px;
	width: 950px;
	background-color: #E0E0E0;
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
	width: 890px;
	border: 1px solid #333;
	overflow: hidden;
	padding-left: 10px;
	color: #333;
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
.txt1 {
	font-family: Calibri;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}

.txtrr {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal;
	color: #FFF;
	text-decoration: none;
	background-color: #666;
}
.txtrrr {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal;
	color: #333;
	text-decoration: none;
	background-color: #DADADA;
}

.downtxt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #666;
	text-decoration: none;
	background-color: #E0E0E0;
}
#dispmsg111 {
	float: left;
	height: 80px;
	width: 950px;
	background-color: #E0E0E0;
}
</style>
<script type="text/javascript" src="../booksearch/sortTable.js"></script>


</head>

<body onLoad='initTable("table2");'>
<div id="wrapper">
  <div id="wrappersec">
    <div id="head">
      <div id="printdiv"><form action="<?php echo SITENAME."print/cbillacccustamt.php"; ?>" enctype="multipart/form-data" name="aaa" method="post"><input name="pfd" type="text" value="<?php if(isset($fd)){ echo $fd; } ?>" style="visibility:hidden" /><input name="ptd" type="text" value="<?php if(isset($td)){ echo $td; } ?>" style="visibility:hidden" /><input type="text" name="custcode" value="<?php if(isset($custcode)){ echo $custcode; } ?>" style="visibility:hidden"/><input name="btn_sn_cust" type="submit" value="PRINT PDF" id="btn_sn_cust1" /></form><form action="<?php echo SITENAME."print/cbillacccustamtqp.php"; ?>" enctype="multipart/form-data" name="aaa" method="post"><input name="pfd" type="text" value="<?php if(isset($fd)){ echo $fd; } ?>" style="visibility:hidden" /><input name="ptd" type="text" value="<?php if(isset($td)){ echo $td; } ?>" style="visibility:hidden" /><input type="text" name="custcode" value="<?php if(isset($custcode)){ echo $custcode; } ?>" style="visibility:hidden"/><input name="btn_sn_cust" type="submit" value="PRINT" id="btn_sn_cust1" /></form></div>
    </div>
    <div id="slogan"> INCOME FROM ONE CUSTOMER---<a href="<?php echo SITENAME; ?>">GO BACK</a></div>
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
        <label for="txtccode">CUSTOMER</label>
        <select name="txtccoden" id="txtccode">
        <?php echo $cust; ?>
        </select>
        <input name="btn_sn_cust" type="submit" class="btn" id="btn_cn_cust" value="GO" />
      </form>
      </div>
    </div>
    <div id="middel">
	<table width="auto" border="1" align="center" cellpadding="10" cellspacing="0"  >
  <TBODY>
  <tr>
    <th class="txt" scope="col"><font color='#000000'>CUSTOMER</font></th>
    <th class="txt" scope="col"><font color='#000000'>C NO.</font></th>
    <th class="txt" scope="col"><font color='#000000'>SPECIAL</font></th>
    <th class="txt" scope="col"><font color='#000000'>DESTINATION</font></th>
    <th class="txt" scope="col"><font color='#000000'>WEIGHT</font></th>
    <th class="txt" scope="col"><font color='#000000'>P or D</font></th>
    <th class="txt" scope="col"><font color='#000000'>BILL AMT</font></th>
    <th class="txt" scope="col"><font color='#000000'>DATE</font></th>
    <th class="txt" scope="col"><font color='#000000'>NOTES</font></th>
  </tr>
  <TR><TD class="txt1">&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD></TR>
 <?php if(isset($disp)){ echo $disp; } ?>
</table>
  
    </div>
    <div id="footer">
      <div id="dispmsg111"><span class="downtxt">Estemated Bill is : <?php if(isset($sum)){ echo $sum; } ?> Rs Between :<?php if(isset($fd)){ echo $fd; }?> AND :<?php if(isset($td)){ echo $td; } ?> Amount Charged :<?php if(isset($amt)){ echo $amt; } ?> Rs<br />
        Income In this Time Span : <?php if(isset($sum) && isset($amt)){  echo $amt-$sum; } ?> Rs</span></div>
    </div>
  </div>
  
</div>
</body>
</html></html>