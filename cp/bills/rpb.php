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
<!---------------------------------------------------------------------->
  <table width="595" border="0" cellspacing="0" cellpadding="0" style="page-break-after:auto" >
  <tr>
    <td colspan="4"><img src="bills/image/logo75.png" height="75" width="150" /></td>
    <td width="52">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="3" class="bill">Bill</td>
  </tr>
  <tr>
    <td width="68">&nbsp;</td>
    <td width="6">&nbsp;</td>
    <td width="137">&nbsp;</td>
    <td width="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="datecls">Date</td>
    <td colspan="3" class="datecls11"><?php echo date('d-m-Y'); ?></td>
  </tr>
  <tr>
    <td colspan="4" class="companyname"><?php echo "M/s $custdatax[0]"; ?></td>
    <td>&nbsp;</td>
    <td colspan="2" class="datecls">Bill No</td>
    <td colspan="3" class="datecls11">Temp</td>
  </tr>
  <tr>
    <td colspan="5" class="companyaddress"><?php echo $custdatax[1]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td width="39">&nbsp;</td>
    <td width="98">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="14">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyaddress">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $custdatax[3]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $custdatax[2]; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="boillto">Bill To:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" class="customercompanyname"><?php echo $customername; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyaddress"><?php echo $customeraddress; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyaddress">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo  $customerphone; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" class="companyphone"><?php echo $customeremail; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="8">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="billfrom">Bill from </td>
    <td colspan="2" class="datecls"><?php echo $fdz; ?></td>
    <td class="billfrom">Bill to</td>
    <td colspan="3" class="datecls"><?php echo $tdz; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="titlecls">CN/NO</td>
    <td class="titlecls">DESTINATION</td>
    <td class="titlecls">WEIGHT</td>
    <td class="titlecls">AMOUNT</td>
    <td width="85" class="titlecls">DATE</td>
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
  <?php foreach($cdataforall as $gg): ?>
  <tr>
    <td colspan="2" class="cclassforata"><?php echo $gg['mydata']['cn']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['des']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['we']; ?></td>
    <td class="cclassforata"><?php echo $gg['mydata']['amtc']; ?></td>
    <td colspan="2" class="cclassforata"><?php echo $gg['mydata']['dt']; ?></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="clssubtot">SUBTOTAL</td>
    <td colspan="2" class="cclassforata"><?php echo $subtotal.".00"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" class="clssubtot">FUEL</td>
    <td colspan="2" rowspan="2" class="cclassforata"><?php echo $fulecharge; ?></td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="clssubtot">SURCHARGE</td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
    <td colspan="2" class="clssubtot">SERVICE </td>
    <td colspan="2" rowspan="2" class="cclassforata"><?php echo $servicetax; ?></td>
    <td rowspan="2">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="clssubtot">TAX</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" class="clssubtot">GRAND TOTAL</td>
    <td colspan="2" class="cclassforata"><?php echo $grandtotal.".00"; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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