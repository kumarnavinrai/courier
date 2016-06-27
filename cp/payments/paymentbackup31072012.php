<?php
require_once('../php/classObject.php'); require_once('../php/classes.class.php'); 
$ans1='';
$Obj=new selectcust(); $disp=$Obj->selectcustnow();
if(isset($_POST['btncust'])){ $obj=new payment(); $ans=$obj->pendingpayments(); }
if(isset($_POST['btnbill'])&& isset($_POST['orderd'])){ if($_POST['orderd']!=""){ $obj1=new payment(); $rw=$obj1->piconebilldetails(); $rtn=mysql_fetch_array($rw);}else{ $ans1="Please Select Customer and find payments"; }
}
if(isset($_POST['btn_pay'])){  $obj5=new payment(); $ans1=$obj5->paypayments();
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BILL | PAYMENTS</title>
<script language="JavaScript" src="calendar_us.js"></script>
<script language="JavaScript" src="common.js"></script>
<link rel="stylesheet" href="calendar.css">
<link href="paymentmodule.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.txtlbl1 {
	font-family: Calibri;
	font-size: 12px;
	font-weight: bold;
	color: #915898;
	text-decoration: none;
	background-color: #BBEBFF;
	text-align: center;
	height: auto;
	width: 300px;
	border: 1px solid #7D4F9A;
}
</style>
</head>
<body>
<div class="wrapper" id="wrapperid">
<div id="head"></div>
  <div class="outerheader" id="outerheaderid">
    <form action="" method="post" name="form2" class="lbl" id="form2">
      <div id="custlist">
      <div id="custcode">
              <div class="lbltxt" id="lblsc"> SELECT CUSTOMER</div>
              <div id="idsel"><select name="custselect" id="custselect">
                 <?php echo $disp; ?>
</select></div>
              <div id="btndiv">
          <input name="btncust"  type="submit" class="btncls" id="btncustid" value="Pic Bill" />
            </div><a href="<?php echo SITENAME; ?>"><div class="lbltxt" id="goback">GO BACK TO MAIN MENU</div></a>
      </div>
          <div id="listpay">
            <div id="sel1div">
            <select name="orderd" size="1" id="orderd">
              <?php echo $ans; ?>
            </select></div>
            <div id="btndiv"><input name="btnbill" type="submit" class="btncls" value="See Bill Details" /></div>
          </div>
          </div>
         </form>
        </div>

<div class="middelbody" id="middelbodyid">
      <form method="post" action="" name="form5" id="form5id" enctype="multipart/form-data"> 
	<table width="705" height="" border="0" cellpadding="3">
    <tr>
    <td width="111"></td>
    <td width="194">&nbsp;</td>
    <td width="161">&nbsp;</td>
    <td width="169" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="27" class="lbltxt">&nbsp;</td>
      <td colspan="2" class="lblforpayment"><?php echo $ans1; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27" class="lbltxt">&nbsp;</td>
      <td colspan="3" class="lblforpayment">You can write in white boxes only</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td height="27" class="lbltxt">
      BILL NUMBER
            </td>
    <td><input name="billno" type="text" class="txtbox" id="billnoid" tabindex="1" value="<?php if(isset($rtn[7])){ echo $rtn[7];} ?>" readonly="readonly" /></td>
    <td><span class="lbltxt">PAYMENT DATE</span></td>
    <td>
      <input name="paydate" id="paydateid" type="text"   class="txtbox" readonly="readonly" value="<?php echo date("m/d/Y"); ?>" />
    </td>
    <td><!-- calendar attaches to existing form element --><script language="JavaScript">
	new tcal ({
		// form name
		'formname': 'form5',
		// input name
		'controlname': 'paydate'
	});
	</script></td>
    </tr>
  <tr>
    <td class="lbltxt">PARTY</td>
    <td colspan="2" class="txtlbl"><input name="partytxt" type="text" class="txtlbl1" id="partytxt" tabindex="5"value="<?php if(isset($rtn[1])){ $res1=selectcust::piconecust($rtn[1]); $rw1=mysql_fetch_array($res1); echo $rw1[0]; } ?>" readonly="readonly" /></td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="lblforpayment">AMOUNT PAYING NOW</td>
    <td colspan="3" class="lblforpayment"><input name="apntxt" type="text" class="txtboxforpayment" id="apntxtid" /></td>
    </tr>
  <tr>
    <td class="lbltxt">AMOUNT
    </td>
    <td class="txtlbl"><input name="amt" type="text" class="txtbox" id="amtid" tabindex="4" value="<?php if(isset($rtn[4])){ echo $rtn[4];} ?>" readonly="readonly" /></td>
    <td class="lbltxt">AMOUNT PENDING</td>
    <td colspan="2" class="txtlbl"><input name="aptxt" type="text" class="txtbox" id="aptxtid" readonly="readonly"  /></td>
    </tr>
  <tr>
    <td class="lbltxt">PARTY ADDRESS</td>
    <td colspan="2" class="txtlbl"><input name="txtarea" type="text" class="txtlbl1" value="<?php if(isset($rtn[1])){ $res1=selectcust::piconecust($rtn[1]); $rw1=mysql_fetch_array($res1); echo $rw1[1]; } ?>" readonly="readonly" /></td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="lbltxt">FROM DATE </td>
    <td class="txtlbl">
      <input name="fdtxt" type="text" class="txtbox" id="fdtxt" value="<?php if(isset($rtn[2])){ echo $rtn[2];} ?>" readonly="readonly" /></td>
    <td class="lbltxt">&nbsp;</td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="lbltxt">TO DATE</td>
    <td class="txtlbl">
      <input name="tdtxt" type="text" class="txtbox" id="tdtxt" value="<?php if(isset($rtn[3])){ echo $rtn[3];} ?>" readonly="readonly" /></td>
    <td class="txtlbl">&nbsp;</td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" class="lbltxt"><span class="lblforpayment">NOTES/Check No/DD No/Cash etc.</span></td>
    <td colspan="3" class="txtlbl"><input name="notetxt" type="text" class="txtboxforpayment" id="notetxt" /></td>
    </tr>
  <tr>
    <td class="lbltxt">&nbsp;</td>
    <td class="txtlbl"><input name="btnverify"  type="button" class="btncls" id="btnverifyid" value="VERIFY" onclick="checkform()" style="visibility:visible" /></td>
    <td class="txtlbl"><input name="btn_pay" type="submit" class="btncls" id="btn_payid" tabindex="9" value="PAY" style="visibility:hidden"  /></td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="lbltxt">&nbsp;</td>
    <td class="txtlbl">&nbsp;</td>
    <td class="txtlbl">&nbsp;</td>
    <td colspan="2" class="txtlbl">&nbsp;</td>
    </tr>
  <tr>
    <td class="lbltxt">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  </table>
</form>

  </div>
</div>
</div>
</div>
</body>
</html>
