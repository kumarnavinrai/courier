<?php require_once('../php/classObject.php'); require_once('../php/classes.class.php');  require_once('calendar1/classes/tc_calendar.php'); require_once("../print/dompdf_config.inc.php");
$obj1=new selectcust(); $rtn=$obj1->selectcustnow();
if(isset($_POST['btnbillcust'])){   $obj=new billdetails();  $disp=$obj->seebilldetails();  }

if(isset($_POST['btnprinttxt'])){ $html='<table  border="1" cellspacing="0"  bordercolor="#666666">
  <tr><td colspan="7" >PRABHNOOR COURIER BILLING SYSTEM </td></tr>
  <tr><td colspan="7" >BILL DETAILS REPORT</td></tr>
  <tr>
    <td >BILL NO</td>
    <td >CUSTOMER</td>
    <td >FROM</td>
    <td >TO</td>
    <td >BALANCE</td>
    <td >PAID</td>
    <td >BILL CHARGED</td>
  </tr>
  
     '.$_POST['txtdisp'].'
</table>'; 
echo $html;
exit();
 }
//////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['btnpdf'])){ $html='<table  border="1" cellspacing="0"  bordercolor="#666666">
  <tr><td colspan="7" >PRABHNOOR COURIER BILLING SYSTEM </td></tr>
  <tr><td colspan="7" >BILL DETAILS REPORT</td></tr>
  <tr>
    <td >BILL NO</td>
    <td >CUSTOMER</td>
    <td >FROM</td>
    <td >TO</td>
    <td >BALANCE</td>
    <td >PAID</td>
    <td >BILL CHARGED</td>
  </tr>
  
     '.$_POST['txtdisp'].'
</table>'; 
//////////////////////////////////////////////
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("billdetails.pdf");

 }

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAYMENT | DETAILS</title>
<link href="../payments/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../payments/calendar/calendar.js"></script>

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
<link href="../payments/paymentdetailcss.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#wrapper {
	height: auto;
	width: 950px;
	border: 1px solid #D6D6D6;
}
#wrapper #head {
	float: left;
	height: 100px;
	width: 950px;
	background-image: url(../images/payment-header.png);
	border: 1px solid #D6D6D6;
	font-family: Calibri;
	font-size: 36px;
	font-weight: bold;
	text-decoration: none;
	text-align: center;
	color: #999;
	vertical-align: middle;
}
#wrapper #bbody {
	float: left;
	height: auto;
	width: 950px;
}
#wrapper #footer {
	float: left;
	height: 100px;
	width: 950px;
	background-image: url(../images/Footer.jpg);
	border: 1px solid #D6D6D6;
	font-family: Calibri;
	font-size: 36px;
	font-weight: bold;
	color: #999;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
}
#wrapper #bbody #accor {
	float: left;
	height: 50px;
	width: 950px;
	border: 1px solid #D6D6D6;
}
#wrapper #bbody #accor #billno {
	float: left;
	height: 35px;
	width: 200px;
	padding-top: 20px;
}
#wrapper #bbody #result {
	float: left;
	height: auto;
	width: 950px;
	border: 1px solid #666;
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #CCC;
	text-decoration: none;
}
#wrapper #bbody #accor #btndiv {
	text-align: center;
	vertical-align: bottom;
	float: left;
	height: 30px;
	width: 100px;
	padding-top: 20px;
}
</style>
</head>

<body>
<div id="wrapper">
  <div id="head">
    <div id="divprn">
      <form id="form2" name="form2" method="post" action="">
        <input name="btnpdf" type="submit" class="btnnp" id="btnpdf" value="PRINT PDF" />
        <label for="txtdisp"></label>
        <input type="text" name="txtdisp" id="txtdisp" value="<?php if(isset($disp)){ echo $disp; } ?>" style="visibility:hidden" />
      </form>
      <form id="form2" name="form2" method="post" action="">
        <input name="btnprinttxt" type="submit" class="btnnp" id="btnpdf" value="PRINT" />
        <label for="txtdisp"></label>
        <input type="text" name="txtdisp" id="txtdisp" value="<?php if(isset($disp)){ echo $disp; } ?>" style="visibility:hidden" />
      </form>
    </div>
  BILL  DETAILS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo SITENAME; ?>">GO BACK</a></div>
  <div id="bbody">
    <div id="accor">
      <form name="form1" id="form1id" action="" method="post" enctype="multipart/form-data">
        <div id="billno"></div>
        <div id="custdiv">
          <select name="acust" class="seltxt">
           <?php echo $rtn; ?> 
          </select>
        </div>
        <div id="fdtddiv">
          <div id="fromdiv">FROM</div>
          <div id="fdiv">
          <?php
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
					  ?>
                      </div>
          <div id="todiv">TO</div>
          <div id="scaldiv">
            <?php
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
					  ?>
          </div>
        </div>
        <div id="btncustdiv" ><input name="btnbillcust" type="submit" class="txtbtn" value="FIND" /></div>
      </form>
    </div>
    <div id="result">
    <table width="auto" border="1" cellspacing="0" cellpadding="10" align="center" bordercolor="#666666">
  <tr>
    <th class="ttxt" scope="col">BILL NO</th>
    <th class="ttxt" scope="col">CUSTOMER</th>
    <th class="ttxt" scope="col">FROM</th>
    <th class="ttxt" scope="col">TO</th>
    <th class="ttxt" scope="col">BALANCE</th>
    <th class="ttxt" scope="col">PAID</th>
    <th class="ttxt" scope="col">BILL CHARGED</th>
  </tr>
  
    <?php if(isset($disp)){ echo $disp;  } ?>
    
  
</table>

    </div>
  </div>
  <div id="footer">COURIER BILLING SYSTEM</div>
</div>
</body>
</html>