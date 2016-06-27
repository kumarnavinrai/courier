<?php
define("__ROOT__",dirname(__FILE__));
require_once("../projectconstant.php");
require_once("../php/classes.class.php");
require_once("../php/classes5.class.php");	
$fdz = $_GET['a1'];
$tdz = $_GET['b1'];
$ccdz = $_GET['c1'];
$totalamotofbillaftergroupornotgroup=0;
$groupfinished="no";
$fdy=strtotime($fdz); 
$tdy=strtotime($tdz);

$countertogivepagebreak=1;
$obj=new billscustnew();

$custdatax=$obj->getselfname();

$group=$obj->getgroup();

if($group and is_array($group)){
foreach($group as $tt):
$grouparr=explode(",",$tt['mygroup']);

if(in_array($ccdz,$grouparr)){

	$cdataforall=$obj->getBillsDataarray($grouparr,$fdy,$tdy,$ccdz);	
	$groupindicator=1; 
	break;
}
endforeach;
}


//////////////////////////goto label starts///////////////////////////////////
if($groupindicator!=1){
$cdataforall=$obj->getBillsData($ccdz,$fdy,$tdy);
}



//print_r($cdataforall);





///////////////////////////goto label ends
		

$datadisp=$obj->getCustData($ccdz);

$customername=strtoupper($datadisp[0]);
$customeraddress=$datadisp[1];
$customerphone=$datadisp[3];
$customeremail=$datadisp[2];

$ambsum=0;
$amcsum=0;
$cswitch=0;

?>

<!--------------------------------------------------------------------->
  <?php foreach($cdataforall as $gg): ?>
<?php //echo $gg['mydata']['cn']; ?>
<?php //echo $gg['mydata']['des']; ?>
<?php //echo $gg['mydata']['we']; ?>
<?php //echo $gg['mydata']['amtc']; ?>
<?php //echo $gg['mydata']['dt']; ?>
<?php if($gg['mydata']['pd']=="document"){ //echo "D"; }else{ //echo "P";  
 } ?>
<?php ///echo "Special ".$gg['mydata']['sp']." ".$gg['mydata']['notes']; ?>
  <?php $countertogivepagebreak++; if($countertogivepagebreak>20){  
//echo ''; $countertogivepagebreak=1;  
 } ?>
  <?php endforeach; ?>
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <?php $subtotal=0; $fulecharge=0; $servicetax=0; $grandtotal=0; ?>
  <?php foreach($cdataforall as $gg): ?>
  <?php //$subtotal+=$gg['mydata']['amtaftertax'];
  			$subtotal+=$gg['mydata']['amtc'];
        $fulecharge+=$gg['mydata']['fulecharges'];
		$servicetax+=$gg['mydata']['servicetax'];                        ?>  
  <?php endforeach; $grandtotal=$subtotal+$fulecharge+$servicetax; 
  
  $subtotal=round($subtotal);
        //$fulecharge=round($fulecharge);
		//$servicetax=round($servicetax);
		$grandtotal=round($grandtotal);
  
   ?>
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
     <?php //echo $subtotal.".00"; ?>
    
   
<?php //echo $fulecharge; ?>

<?php //echo $servicetax; ?>
    
<?php //echo $grandtotal.".00"; ?>
  <!------------------------------------------------------------------->
  <?php
  $amcsum=ceil($grandtotal);
  $samtc = (string)$amcsum;

$nwords = array(  "", "one", "two", "three", "four", "five", "six", 
	      	  "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", 
	      	  "fourteen", "fifteen", "sixteen", "seventeen", "eightteen", 
	     	  "nineteen", "twenty", 30 => "thirty", 40 => "fourty",
                     50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eigthy",
                     90 => "ninety" );

function number_to_words ($x)
{
     global $nwords;
     if(!is_numeric($x))
     {
         $w = '#';
     }else if(fmod($x, 1) != 0)
     {
         $w = '#';
     }else{
         if($x < 0)
         {
             $w = 'minus ';
             $x = -$x;
         }else{
             $w = '';
         }
         if($x < 21)
         {
             $w .= $nwords[$x];
         }else if($x < 100)
         {
             $w .= $nwords[10 * floor($x/10)];
             $r = fmod($x, 10);
             if($r > 0)
             {
                 $w .= ' '. $nwords[$r];
             }
         } else if($x < 1000)
         {
		
             	$w .= $nwords[floor($x/100)] .' hundred';
             $r = fmod($x, 100);
             if($r > 0)
             {
                 $w .= ' '. number_to_words($r);
             }
         } else if($x < 1000000)
         {
         	$w .= number_to_words(floor($x/1000)) .' thousand';
             $r = fmod($x, 1000);
             if($r > 0)
             {
                 $w .= ' ';
                 if($r < 100)
                 {
                     $w .= ' ';
                 }
                 $w .= number_to_words($r);
             }
         } else {
             $w .= number_to_words(floor($x/1000000)) .' million';
             $r = fmod($x, 1000000);
             if($r > 0)
             {
                 $w .= ' ';
                 if($r < 100)
                 {
                     $word .= ' ';
                 }
                 $w .= number_to_words($r);
             }
         }
     }
     return $w;
}

$rr=$samtc;

$sgrandtotal=strtoupper(number_to_words($rr));




?>
  <!--------------------------------------------------------------------->
<?php //echo $sgrandtotal." RUPEES ONLY"; ?>
    
<?php //echo "M/s $custdatax[0]"; ?>

<?php //echo $custdatax[3]; ?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Bill Format</title>
<style type="text/css">
#wrap {
	height: 1200px;
	width: 950px;
	margin-right: auto;
	margin-left: auto;
	border: 1px solid #000;
}
#sec1 {
	float: left;
	height: 145px;
	width: 948px;
	border: 2px solid #000;
}
#sec11 {
	float: left;
	height: 145px;
	width: 400px;
}
#seciline {
	float: left;
	height: 25px;
	width: 395px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
	color: #036;
	text-decoration: none;
	padding-top: 10px;
	padding-left: 5px;
}
#sec1add {
	float: left;
	height: 15px;
	width: 395px;
	padding-top: 5px;
	padding-left: 5px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #666;
	text-decoration: none;
}
#sec22 {
	float: right;
	height: 145px;
	width: 340px;
}
#sec2 {
	float: left;
	height: 747px;
	width: 400px;
	border: 2px solid #000;
}
#sec21 {
	float: left;
	height: 25px;
	width: 390px;
	margin-top: 10px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #333;
	text-decoration: none;
	padding-top: 2px;
	padding-left: 10px;
}
#sec222 {
	float: left;
	height: 675px;
	width: 375px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #333;
	text-decoration: none;
	padding-top: 25px;
	padding-left: 25px;
}
#sec31 {
	float: left;
	height: 51px;
	width: 138px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #333;
	text-decoration: none;
	padding-top: 22px;
	padding-left: 10px;
	border: 1px solid #000;
}
#sec3111 {
	float: left;
	height: 51px;
	width: 383px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000;
	text-decoration: none;
	padding-top: 22px;
	padding-left: 10px;
	border: 1px solid #000;
}
#foot1 {
	float: left;
	height: 48px;
	width: 928px;
	padding-top: 25px;
	padding-left: 20px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #333;
	text-decoration: none;
	border: 1px solid #000;
}
#wrap #foot2 {
	float: left;
	height: 224px;
	width: 923px;
	border: 1px solid #000;
	padding-left: 25px;
}
.txthead {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000;
	text-decoration: none;
	text-align: left;
}
.txtmain {
	font-family: Calibri;
	font-size: 12px;
	font-weight: bold;
	color: #000;
	text-decoration: none;
}
.txtnormal {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000;
	text-decoration: none;
}
#wrapper {
	height: auto;
	width: 950px;
	margin-right: auto;
	margin-left: auto;
}
#seprator {
	float: left;
	height: 100px;
	width: 950px;
}
#divdetails {
	float: left;
	height: auto;
	width: 950px;
}
</style>
</head>

<body>
<div id="wrapper">
  <div id="wrap">
    <div id="sec1">
      <div id="sec11">
        <div id="seciline">DTDC COURIER AND CARGE LIMITED</div>
        <div id="sec1add">H.O JALANDHAR BRANCH</div>
        <div id="sec1add">N.R. KMV COLLEGE, BASRA COMPLEX</div>
        <div id="sec1add">PATHANKOT BYEPASS CHOWNK, JALANDHAR 144001</div>
        <div id="sec1add">Phone : 0181-5000312/9815351400</div>
        <div id="sec1add">E-mail : css.jalandhar@dtdc.com</div>
      </div>
      <div id="sec22"><img src="<?php echo SITENAME; ?>/bills/image/D_13310231521.jpg" height="145" width="340" /></div>
    </div>
    <div id="sec2">
      <div id="sec21">To</div>
      <div id="sec222">
        <p><?php echo $customername; ?></p>
        <p><?php echo $customeraddress; ?></p>
        <p><?php echo $customerphone." - ".$customeremail; ?></p>
      </div>
    </div>
    <div id="sec31">Invoice Period</div>
    <div id="sec3111"><?php echo $fdz; ?> TO <?php echo $tdz; ?></div>
    <div id="sec31">Invoice No.</div>
    <div id="sec3111">temp</div>
    <div id="sec31">Invoice Date</div>
    <div id="sec3111"><?php echo date('d-m-Y'); ?></div>
    <div id="sec31">Amount</div>
    <div id="sec3111"><?php echo $subtotal.".00"; ?></div>
    <div id="sec31">Service Charges</div>
    <div id="sec3111"></div>
    <div id="sec31">Fule Surcharge*</div>
    <div id="sec3111"><?php echo $fulecharge; ?></div>
    <div id="sec31">Service Tax</div>
    <div id="sec3111"><?php $sb=$subtotal; $sb1=$sb; echo (($sb+$fulecharge)*10/100); ?></div>
    <div id="sec31">Edu-Cess @ 2%</div>
    <div id="sec3111"><?php echo $grandtotal*2/100; ?></div>
    <div id="sec31">SHEC @ 1%</div>
    <div id="sec3111"><?php echo $grandtotal*1/100; ?></div>
    <div id="sec31">Grand Total</div>
    <div id="sec3111"><?php echo $grandtotal.".00"; ?></div>
    <div id="foot1">AMOUNT in Words : <?php echo $sgrandtotal." RUPEES ONLY"; ?></div>
    <div id="foot2">
      <table width="925" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="444" class="txthead" scope="col">STATUTORY GUIDELINES</th>
          <th width="481" class="txthead" scope="col">General Guidelines</th>
        </tr>
        <tr>
          <td class="txtmain">-Pan No. ACCPS7702B</td>
          <td class="txtnormal">-Kindly acknowledge the receipt of the bill by handling over the bill-acknowledgement, duly filled up, to our representative who delivers the bill to you.</td>
        </tr>
        <tr>
          <td class="txtmain">-Service Tax No. ACCPS7702BSD001</td>
          <td class="txtnormal">-While making the payment please handover the payment advise with full details.</td>
        </tr>
        <tr>
          <td class="txtnormal">-Payment should be made ONLY by crossed cheque or DD in favour of &quot;DTDC Courier &amp; Cargo Ltd&quot; after obtaining money receipt positively</td>
          <td class="txtnormal">-Any mistake/correction found in the invoice has to be reported in writing within 7 days from the recipt of the invoice.</td>
        </tr>
        <tr>
          <td class="txtnormal">-PAYMENT DUE DATE</td>
          <td class="txtnormal">-This is a computer-generated invoice and hence does not require signature.</td>
        </tr>
        <tr>
          <td class="txtnormal">-Any delay in payment after due date will be charged 24% per annum on prorata base.</td>
          <td class="txtnormal">-For any queires please contact Regional Commercial department</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="txtmain">-FR/J.S ENTERPRISES, JALANDHAR</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
  </table>
      
    </div>
  </div>
  <div id="seprator"></div>
  <div id="divdetails">
  
  <!---------------------------------------------------------------------->
  <table width="950" border="0" cellspacing="0" cellpadding="0" style="page-break-after:auto" >
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="201">&nbsp;</td>
    <td width="110">&nbsp;</td>
    <td width="101">&nbsp;</td>
    <td width="107">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="192">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="titlecls">CN/NO</td>
    <td class="titlecls">DESTINATION</td>
    <td class="titlecls">WEIGHT</td>
    <td class="titlecls">AMOUNT</td>
    <td class="titlecls">DATE</td>
    <td class="titlecls">P/D</td>
    <td colspan="3" class="titlecls">REMARKS</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <!--------------------------------------------------------------------->
  <?php foreach($cdataforall as $gg): ?>
  <tr>
    <td colspan="2" class="cclassforata"><?php echo $gg['mydata']['cn']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['des']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['we']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['amtc']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['dt']; ?></td>
    <td class="remarksclass"><?php if($gg['mydata']['pd']=="document"){ echo "D"; }else{ echo "P";   } ?></td>
    <td colspan="3" class="remarksclass"><?php echo "Special ".$gg['mydata']['sp']." ".$gg['mydata']['notes']; ?></td>
  </tr>
  <?php $countertogivepagebreak++; if($countertogivepagebreak>20){  
echo '<tr style="page-break-before: always"><td colspan="7"></td></tr>'; $countertogivepagebreak=1;   } ?>
  <?php endforeach; ?>
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <?php $subtotal=0; $fulecharge=0; $servicetax=0; $grandtotal=0; ?>
  <?php foreach($cdataforall as $gg): ?>
  <?php //$subtotal+=$gg['mydata']['amtaftertax'];
  			$subtotal+=$gg['mydata']['amtc'];
        $fulecharge+=$gg['mydata']['fulecharges'];
		$servicetax+=$gg['mydata']['servicetax'];                        ?>  
  <?php endforeach; $grandtotal=$subtotal+$fulecharge+$servicetax; 
  
  $subtotal=round($subtotal);
        //$fulecharge=round($fulecharge);
		//$servicetax=round($servicetax);
		$grandtotal=round($grandtotal);
  
   ?>
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="10">____________________________________________________________________________</td>
  </tr>
  <tr>
    <td width="70">&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="remarksclass">SIGN</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="remarksclass">STAMP</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="10">____________________________________________________________________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 <!----------------------------------------------------------------------->  
  
  </div>
</div>
</body>
</html>