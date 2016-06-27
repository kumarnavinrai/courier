<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once('calendar/classes/tc_calendar.php');
if(isset($_GET['sn'])){  $obj=new booksearch(); $disp=$obj->searchbooknew($_GET['sn'],$_GET['ln'],$_GET['sd']);   }
if(isset($_POST['btn_sn'])){  $obj=new booksearch(); $disp=$obj->searchbook(); }
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
	height: 650px;
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
	height: 650px;
	width: 950px;
	border: 1px solid #666;
	margin-right: 25px;
	margin-left: 25px;
}
#wrapper #wrappersec #middel {
	float: left;
	height: 300px;
	width: 900px;
	border: 1px solid #333;
	overflow: scroll;
	padding-left: 50px;
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
	width: 950px;
	padding-top: 10px;
	margin-left: 10px;
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
</style>
<script type="text/javascript" src="sortTable.js"></script>


</head>

<body onLoad='initTable("table2");'>
<div id="wrapper">
  <div id="wrappersec">
    <div id="head"></div>
    <div id="slogan">Enter Courier Numbers To See Status--<a href="<?php echo SITENAME; ?>">GO TO MAIN SITE</a></div>
    <div id="formdiv">
      <div id="txtbtn">
      <form id="form1" name="form1" method="post" action=""><div id="calanders">
        <!--<div id="fc">From</div>--><div id="fcc"><?php /*
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
					  */?></div><!--<div id="tc">To</div>--><div id="tcc"><?php /*
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
					 */ ?></div>
      </div>
        <label for="ftxt">C FROM NUMBER</label>
        <input type="text" name="ftxt" id="cnoid" value="<?php if(isset($_GET['sn'])){ echo $_GET['sn'];  } ?>" />
        <label for="ttxt">C TO NUMBER </label>
        <input type="text" name="ttxt" id="ttxt" value="<?php if(isset($_GET['ln'])){ echo $_GET['ln'];  } ?>" />
<input type="submit" name="btn_sn" id="btn_cn" value="GO" disabled="disabled" />
      </form>
      </div>
    </div>
    <div id="middel">
	<table width="810" border="1" align="center" cellpadding="10" cellspacing="0" ID="table2" bordercolor="#666666"  >
  <TBODY>
  <tr>
    <th width="87" class="txt" scope="col"><font color="#003366">CUSTOMER</font></th>
    <th width="30" class="txt" scope="col"><font color="#003366">C NO.</font></th>
    <th width="62" class="txt" scope="col"><font color="#003366">SPECIAL</font></th>
    <th width="104" class="txt" scope="col"><font color="#003366">DESTINATION</font></th>
    <th width="61" class="txt" scope="col"><font color="#003366">WEIGHT</font></th>
    <th width="27" class="txt" scope="col"><font color="#003366">P or D</font></th>
    <th width="36" class="txt" scope="col"><font color="#003366">BILL AMT</font></th>
    <th width="72" class="txt" scope="col"><font color="#003366">AMOUNT</font></th>
    <th width="40" class="txt" scope="col"><font color="#003366">DATE</font></th>
    <th width="59" class="txt" scope="col"><font color="#003366">NOTES</font></th>
  </tr>
  <TR><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD></TR>
 <?php if(isset($disp)){ echo $disp; } ?>
</table>
  
    </div>
    <div id="footer"></div>
  </div>
  
</div>
</body>
</html></html>