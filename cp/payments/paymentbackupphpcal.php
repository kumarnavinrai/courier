<?php
require_once('calendar/classes/tc_calendar.php');
//if(isset($_GET['sub'])){ echo "dsfsfs"; /*echo $_GET['date1']; echo $_GET['date5'];*/  }
require_once('../php/classObject.php'); require_once('../php/classes.class.php'); 
$Obj=new selectcust(); $disp=$Obj->selectcustnow();
if(isset($_POST['btncust'])){ $obj=new payment(); $ans=$obj->pendingpayments(); }
if(isset($_POST['btnbill'])){  $obj1=new payment(); $rw=$obj1->piconebilldetails(); $rtn=mysql_fetch_array($rw);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BILL | PAYMENTS</title>
<link href="paymentmodule.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }
pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
</head>
<body>
<div class="wrapper" id="wrapperid">
  <div class="outerheader" id="outerheaderid">
    <div class="headerouter" id="headerouterid">
      <div class="header" id="headerid">
        <div class="hlogoimg" id="hlogoimgid"><img src="images/hlogo.jpg" alt="logo" /></div>
        <div class="ptitle" id="ptitle">
          <form action="" method="post" name="form2" class="lbl" id="form2">
        <div id="custcode">
               <label for="custselect">Select Customer : </label>
              <select name="custselect" class="seltxt" id="custselect">
                 <?php echo $disp; ?>
              </select>
              <input name="btncust"  type="submit" class="btn" id="btncustid" value="Pic Payment" />
          </div>
          <div id="listpay">
            <label for="orderd"></label>
            <select name="orderd" size="1" class="ordersel" id="orderd">
              <?php echo $ans; ?>
            </select>
            <div id="btndiv"><input name="btnbill" type="submit" class="btn" value="See Payment" /></div>
          </div>
         </form>
        </div>
      </div>
    </div>
    <div class="sidemenu" id="sidemenuid">
      
      <div class="b2" id="b2id"><div class="b1txtc" id="b1txt">HOME</div></div>
      <div class="b3" id="b3id"><div class="b1txtc" id="b1txt">BILLING</div></div>
      <div class="b4" id="b4id"><div class="b1txtc" id="b1txt">EDIT BILL ENTRY</div></div>
      <div class="b5" id="b5id"><div class="b1txtc" id="b1txt">ADD CUST</div></div>
      <div class="b6" id="b6id"><div class="b1txtc" id="b1txt">EDIT CUST</div></div>
      <div class="b7" id="b7id"><div class="b1txtc" id="b1txt">SEARCH CUST</div></div>
      <div class="b8" id="b8id"><div class="b1txtc" id="b1txt">SEE BILL</div></div>
      <div class="b9" id="b9id"><div class="b1txtc" id="b1txt">GO BACK</div></div>
    </div>
    <div class="middelbody" id="middelbodyid">
	<form action="" method="get" name="form5" id="form5id" enctype="multipart/form-data"> 
	<table width="846" height="685" border="0" cellpadding="3">
  <tr>
    <td width="383">&nbsp;</td>
    <td width="222">&nbsp;</td>
    <td width="215">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <label><span class="txtlbl">BILL NUMBER</span>
        <input name="billno" type="text" class="txtbox" id="billno" tabindex="1" value="<?php if(isset($rtn[7])){ echo $rtn[7];} ?>" />
        </label>    </td>
    <td><label><!--<input name="dtf" type="text" class="txtbox" id="dtf" tabindex="2" />-->
    </label></td>
    <td><label><!--<input name="dtt" type="text" class="txtbox" id="dtt" tabindex="3" />-->
    </label></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="txtlbl">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label><span class="txtlbl">AMOUNT</span>
        <input name="amt" type="text" class="txtbox" id="amt" tabindex="4" value="<?php if(isset($rtn[4])){ echo $rtn[4];} ?>" />
    </label></td>
    <td class="txtlbl"><label>PARTY
        <input name="partytxt" type="text" class="txtbox" id="partytxt" tabindex="5"value="<?php if(isset($rtn[1])){ $res1=selectcust::piconecust($rtn[1]); $rw1=mysql_fetch_array($res1); echo $rw1[0]; } ?>" />
    </label></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" rowspan="4" class="txtlbl"><label>PARTY ADDRESS
      <textarea name="txtarea" cols="45" rows="5" class="txta" id="txtarea"><?php if(isset($rtn[1])){ $res1=selectcust::piconecust($rtn[1]); $rw1=mysql_fetch_array($res1); echo $rw1[1]; } ?></textarea>
    </label></td>
    <td class="txtlbl">&nbsp;</td>
  </tr>
  <tr>
    <td class="txtlbl">&nbsp;</td>
  </tr>
  <tr>
    <td class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="txtlbl">FROM DATE </td>
    <td class="txtlbl"><label for="fdtxt"></label>
      <input name="fdtxt" type="text" class="txtbox" id="fdtxt" value="<?php if(isset($rtn[2])){ echo $rtn[2];} ?>" /></td>
    <td><span class="txtlbl">DATE FROM</span>
      <?php
					  $myCalendar = new tc_calendar("date1", true);
					  $myCalendar->setIcon("images/iconCalendar.gif");
					  $myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1960, 2015);
					  $myCalendar->dateAllow('2010-01-01', '2015-03-01');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
					  $myCalendar->setOnChange("myChanged('test')");
					  //$myCalendar->rtl = true;
					  $myCalendar->writeScript();
					  ?></td>
  </tr>
  <tr>
    <td class="txtlbl">TO DATE</td>
    <td class="txtlbl"><label for="tdtxt"></label>
      <input name="tdtxt" type="text" class="txtbox" id="tdtxt" value="<?php if(isset($rtn[3])){ echo $rtn[3];} ?>" /></td>
    <td><span class="txtlbl">DATE TO</span>
      <?php
					  $myCalendar = new tc_calendar("date5", true);
					  $myCalendar->setIcon("images/iconCalendar.gif");
					  $myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1960, 2015);
					  $myCalendar->dateAllow('2010-01-01', '2015-03-01');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
					  $myCalendar->setOnChange("myChanged('test')");
					  //$myCalendar->rtl = true;
					  $myCalendar->writeScript();
					  ?></td>
  </tr>
  <tr>
    <td class="txtlbl">AMOUNT PAYING NOW</td>
    <td class="txtlbl"><label for="apntxt"></label>
      <input name="apntxt" type="text" class="txtbox" id="apntxt" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txtlbl">AMOUNT PENDING</td>
    <td class="txtlbl"><label for="aptxt"></label>
      <input name="aptxt" type="text" class="txtbox" id="aptxt" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><label>
      <input name="sub" type="submit" class="txtbtn" id="sub" tabindex="9" value="PAY" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
  </div>
  <div class="bottomup" id="bottomupid"></div>
  <div class="footer" id="footerid"></div>
</div>
</body>
</html>
