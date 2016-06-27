<?php
require_once("dompdf_config.inc.php");
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); 
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['fdp'])&& isset($_POST['tdp'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt)=$obj->cbillincomeprint($_POST['fdp'],$_POST['tdp']); 
}
$temp=$amt-$sum;
?>
<?php $html='	<table width="698" border="1" align="center" cellpadding="2" cellspacing="0" ID="table2" bordercolor="#666666" >
  <TBODY>
  <tr><td colspan="9" ><font face="Calibri" size="+1">COURIER BILLING SYSTEM powred by Prabhnoor Software</font></td></tr>
  <tr><td colspan="9" ><font face="Calibri" size="+1">INCOME REPORT ACCORDING TO THE CUSTOMER</font></td></tr>
  <tr>
    <td >CUSTOMER</td>
    <td >C NO.</td>
    <td >DESTINATION</td>
    <td >WEIGHT</td>
    <td >P or D</td>
    <td >BILL AMT</td>
    <td >AMOUNT</td>
    <td >DATE</td>
    <td >NOTES</td>
    
  </tr>
  <TR><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD></TR>
 '.$disp.'
  <tr><td colspan="9" >
Estemated Bill is : '.$sum.' </td></tr><tr><td colspan="9">Rs Between : '.$fd.' AND : '.$td.' </td></tr><tr><td colspan="9" > Amount Charged : '.$amt.' Rs -   </td></tr><tr><td colspan="9">   Income: .'.$temp.' Rs </td></tr></table>';
///////////////////////////////////////////////////////////////////////////////////////
echo $html;

?>