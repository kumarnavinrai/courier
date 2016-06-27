<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once('calendar/classes/tc_calendar.php'); require_once("../print/dompdf_config.inc.php");
if(isset($_POST['btn_sn'])){  $obj=new cnumber(); $disp=$obj->checkcno(); }
///////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['buttontxt'])){ $html='<table  border="1"  cellspacing="0" bordercolor="#666666" frame="void" >
  <tr><td colspan="11" >PRABHNOOR COURIER BILLING SYSTEM</td>
  <tr><td colspan="11" >BOOKED COURIER REPORT</td>
  <tr>
    <td >CUSOMER</td>
    <td >C NO</td>
    <td >DESTINATION</td>
    <td >WEIGHT</td>
    <td >P or D</td>
    <td >B AMT</td>
    <td >AMT</td>
    <td > DATE</td>
    <td >NOTES</td>
    </tr>
  <tr><td colspan="11" ></td>
  '.$_POST['txtdisp'].'
</table>'; 
echo $html;
exit();
}
///////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['buttonpdf'])){ $html='<table  border="1"  cellspacing="0" bordercolor="#666666" frame="void" >
  <tr><td colspan="11" >PRABHNOOR COURIER BILLING SYSTEM</td>
  <tr><td colspan="11" >BOOKED COURIER REPORT</td>
  <tr>
    <td >CUSOMER</td>
    <td >C NO</td>
    <td >DESTINATION</td>
    <td >WEIGHT</td>
    <td >P or D</td>
    <td >B AMT</td>
    <td >AMT</td>
    <td > DATE</td>
    <td >NOTES</td>
    </tr>
  <tr><td colspan="11" ></td>
  '.$_POST['txtdisp'].'
</table>'; 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4','landscape');
$dompdf->render();
$dompdf->stream("courierbook.pdf");}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEARCH FOR COURIER NO</title>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
#wrapper {
	height: auto;
	width: 1000px;
}
#wrapper #head {
	background-image: url(../images/marketing-header.jpg);
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
	font-size: 12px;
	color: #000;
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
	width: 740px;
	padding-top: 10px;
	margin-left: 210px;
	text-align: center;
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
.txtr {
	font-family: Calibri;
	font-size: 16px;
	color: #A00;
	text-decoration: none;
}
.txtr1 {
	font-family: Calibri;
	font-size: 16px;
	color: #FFF;
	text-decoration: none;
	background-color: #036;
}

.txtr8 {
	font-family: Calibri;
	font-size: 16px;
	color: #0000A8;
	text-decoration: none;
	background-color: #B9DCFF;
}


.txtr1234 {
	font-family: Calibri;
	font-size: 16px;
	color: #000;
	text-decoration: none;
	background-color: #CCC;
}
.txthead {
	font-family: Calibri;
	font-size: 18px;
	color: #800;
	text-decoration: none;
}

.txthead1 {
	font-family: Calibri;
	font-size: 18px;
	color: #FFF;
	text-decoration: none;
	background-color: #900;
	text-align: center;
}
</style>
<script type="text/javascript" src="sortTable.js"></script>


</head>

<body onLoad='initTable("table2");'>
<div id="wrapper">
  <div id="wrappersec">
    <div id="head">
      <div id="printdddiv">
        <form id="form2" name="form2" method="post" action="">
          <label for="txtdisp"></label>
          <input name="txtdisp" type="text" class="txt" id="txtdisp" value="<?php if(isset($disp)){ echo $disp; } ?>" style="visibility:hidden" />
          <!--<input name="buttonpdf" type="submit" class="btnpp" id="button" value="PRINT PDF" />-->
        </form>
        <form id="form2" name="form2" method="post" action="">
          <label for="txtdisp"></label>
          <input name="txtdisp" type="text" class="txt" id="txtdisp" value="<?php if(isset($disp)){ echo $disp; } ?>" style="visibility:hidden" />
          <input name="buttontxt" type="submit" class="btnpp" id="button" value="PRINT" />
        </form>
      </div>
    </div>
    <div id="slogan">COURIER BOOKED DETAILS-<a href="<?php echo SITENAME; ?>">GO BACK</a></div>
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
        <input type="submit" name="btn_sn" id="btn_cn" value="GO" />
      </form>
      </div>
    </div>
    <div id="middel">
	<table width="auto" border="1" align="center" cellpadding="10" cellspacing="0" ID="table2" bordercolor="#666666" frame="void" >
  <TBODY>
  
  <TR><TD colspan="11" class="txthead1">&nbsp;</TD>
    </TR>
 <?php if(isset($disp)){ echo $disp; } ?>
</table>
  
    </div>
    <div id="footer"></div>
  </div>
  
</div>
</body>
</html></html>