<?php
define("__ROOT__",dirname(__FILE__));
require_once("../projectconstant.php");
require_once("../php/classes.class.php");
require_once("../php/classes5.class.php");

header("Content-type: application/octet-stream");
 # replace excelfile.xls with whatever you want the filename to default to
header("Content-Disposition: attachment; filename=excelile.xls");
header("Pragma: no-cache");
header("Expires: 0");	


	
$fdz = $_GET['a1'];
$tdz = $_GET['b1'];
$ccdz = $_GET['c1'];

$totalamotofbillaftergroupornotgroup=0;
$groupfinished="no";
$fdy=strtotime($fdz); 
$tdy=strtotime($tdz);

$countertogivepagebreak=1;
$obj=new billscustnew();


$rw=$obj->checkRealesebill($fdy,$tdy,$ccdz);



if($rw==1){ echo "<h1>Bill already released </h1>"; exit(); }



$custdatax=$obj->getselfname();

$group=$obj->getgroup();

$billno=$obj->getBillNo();

if($group and is_array($group)){
foreach($group as $tt):
$grouparr=explode(",",$tt['mygroup']);
/////////////////////////////////////////////////////
if(in_array($ccdz,$grouparr)){
foreach($grouparr as $nn):

$rw=$obj->checkRealesebill($fdy,$tdy,$nn);
if($rw==1){ echo "<h1>Bill already released </h1>"; exit(); }
endforeach;
}
/////////////////////////////////////////////////////

if(in_array($ccdz,$grouparr)){
    
	$cdataforall=$obj->getBillsDataarray($grouparr,$fdy,$tdy,$ccdz);	
	$groupindicator=1; 
	break;
}
endforeach;
}


//////////////////////////goto label starts///////////////////////////////////
if($groupindicator!=1){

$rw=$obj->checkRealesebill($fdy,$tdy,$ccdz);
if($rw==1){ echo "Bill already released "; exit(); }

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
<style type="text/css">
.companyname {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
	color: #333;
	text-decoration: none;
}
.companyaddress {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #666;
	text-decoration: none;
}
.companyphone {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #ADADAD;
	text-decoration: none;
	text-align: left;
}
.bill {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 36px;
	color: #000;
	text-decoration: none;
	text-align: center;
}
.datecls {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #333;
	text-decoration: none;
	text-align: left;
}
.datecls11 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #666;
	text-decoration: none;
	text-align: left;
}
.bo\illto {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #FFF;
	text-decoration: none;
	background-color: #666;
}
.customercompanyname {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #666;
	text-decoration: none;
}
.billfrom {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFF;
	text-decoration: none;
	background-color: #666;
}
.titlecls {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: 900;
	color: #333;
	text-decoration: none;
	background-color: #EEE;
}
.cclassforata {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 13px;
	color: #000;
	text-decoration: none;
	padding-left: 5px;
	text-align: left;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #D6D6D6;
}
.remarksclass {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #000;
	text-decoration: none;
	text-align: left;
}
.clssubtot {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bolder;
	color: #000;
	text-decoration: none;
}

.pdrem {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #000;
	text-decoration: none;
	text-align: left;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #D6D6D6;
}
.fortotalsclscls {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 13px;
	color: #000;
	text-decoration: none;
	text-align: left;
	padding-left: 5px;
}
</style> 
<!---------------------------------------------------------------------->
  <table width="595" border="0" cellspacing="0" cellpadding="0" style="page-break-after:auto" >
  <tr>
    <td colspan="4">&nbsp;</td>
    <td width="86">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3" class="bill">Bill</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="146">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="datecls">Date</td>
    <td colspan="3" class="datecls11"><?php echo date('d-m-Y'); ?></td>
  </tr>
  <tr>
    <td colspan="4" class="companyname"><?php echo "M/s $custdatax[0]"; ?></td>
    <td>&nbsp;</td>
    <td colspan="2" class="datecls">Bill No</td>
    <td colspan="3" class="datecls11"><?php echo $billno+1; ?></td>
  </tr>
  <tr>
    <td colspan="5" class="companyaddress"><?php echo $custdatax[1]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td width="41">&nbsp;</td>
    <td width="104">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyaddress">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $custdatax[3]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $custdatax[2]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="72">&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" class="boillto">Bill To:</td>
    <td colspan="5">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="8" class="customercompanyname"><?php echo $customername; ?></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyaddress"><?php echo $customeraddress; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyaddress">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo  $customerphone; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $customeremail; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td class="billfrom">Bill from </td>
    <td colspan="2" class="datecls"><?php echo $fdz; ?></td>
    <td class="billfrom">Bill to</td>
    <td colspan="3" class="datecls"><?php echo $tdz; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="titlecls">CN/NO</td>
    <td class="titlecls">DESTINATION</td>
    <td class="titlecls">WEIGHT</td>
    <td class="titlecls">AMOUNT</td>
    <td width="72" class="titlecls">DATE</td>
    <td colspan="2" class="titlecls">P/D</td>
    <td colspan="3" class="titlecls">REMARKS</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <!--------------------------------------------------------------------->
  <?php $billamount=0; foreach($cdataforall as $gg): ?>
  <tr>
    <td colspan="2" class="cclassforata"><?php echo $gg['mydata']['cn']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['des']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['we']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['amtc']; ?></td>
    <td colspan="2" class="cclassforata"><?php echo $gg['mydata']['dt']; ?></td>
    <td class="pdrem"><?php if($gg['mydata']['pd']=="document"){ echo "D"; }else{ echo "P";   } ?></td>
    <td colspan="3" class="pdrem"><?php echo "Special ".$gg['mydata']['sp']." ".$gg['mydata']['notes']; ?></td>
  </tr>
  
  <?php $billamount=$billamount+$gg['mydata']['amtb']; endforeach; ?>
  <!---------------------------------------------------------------------->
  <!---------------------------------------------------------------------->
  <?php $subtotal=0; $fulecharge=0; $servicetax=0; $grandtotal=0; ?>
  <?php foreach($cdataforall as $gg): ?>
  <?php $subtotal+=$gg['mydata']['amtc'];
        $fulecharge+=$gg['mydata']['fulecharges'];
		$servicetax+=$gg['mydata']['servicetax'];;                        ?>  
  <?php endforeach; $grandtotal=$subtotal+$fulecharge+$servicetax; $billamount=$billamount+$fulecharge+$servicetax; 
  
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
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="clssubtot">SUBTOTAL</td>
    <td colspan="4" class="fortotalsclscls"><?php echo $subtotal.".00"; ?></td>
    </tr>
  <tr>
    <td colspan="2" rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" class="clssubtot">FUEL</td>
    <td colspan="4" rowspan="2" class="fortotalsclscls"><?php echo $fulecharge; ?></td>
    </tr>
  <tr>
    <td colspan="2" class="clssubtot">SURCHARGE</td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" class="clssubtot">SERVICE </td>
    <td colspan="4" rowspan="2" class="fortotalsclscls"><?php echo $servicetax; ?></td>
    </tr>
  <tr>
    <td colspan="2" class="clssubtot">TAX</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="clssubtot">GRAND TOTAL</td>
    <td colspan="4" class="fortotalsclscls"><?php echo $grandtotal.".00"; ?></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <!------------------------------------------------------------------->
  <?php
  $amcsum=ceil($grandtotal);
  $samtc = (string)$amcsum;
/////////////////////////////////////////
$fdz = $_GET['a1'];
$tdz = $_GET['b1'];
$ccdz = $_GET['c1'];
$grandtotal;
$billamount;
$r=$obj->putBillIn($ccdz,$fdz,$tdz,$billamount,$grandtotal);

///////////////////////////////////////////////
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
  <tr>
    <td>&nbsp;</td>
    <td colspan="9" class="remarksclass"><?php echo $sgrandtotal." RUPEES ONLY"; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9" class="remarksclass">MAKE ALL CHECKS PAYABLE TO <?php echo "M/s $custdatax[0]"; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9" class="remarksclass">THANK YOU FOR YOUR BUSINESS !</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9" class="remarksclass">PLS DO NOT HESITATE TO CONTACT US ON <?php echo $custdatax[3]; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11">____________________________________________________________________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="remarksclass">SIGN</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="remarksclass">STAMP</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11">____________________________________________________________________________</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="9">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
 <!----------------------------------------------------------------------->  