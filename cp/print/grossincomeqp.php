<?php
require_once("dompdf_config.inc.php");
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once('../reports/calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['pfd'])&& isset($_POST['ptd'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$exp,$expenses)=$obj->cbillincomegrossprint($_POST['pfd'],$_POST['ptd']); } 

$temp=$amt-$sum+$exp;
////////////////////////////////////////////////////////////////////////////////////////////////
$html='<h1>PRABHNOOR COURIER BILLING SYSTEM</h1></br>';
$html.='<h1>GROSS INCOME REPORT</h1>';
$html.='<table width="710" bordercolor="#000000" border="1" cellspacing="0" >
    <tr>
      <td width="406">
    <table width="407">
    <tr><td><font color="#666666">Customer Name</font></td><td width="97"><font color="#666666">Amount Billed</font></td><td width="112"><font color="#666666">Amount Charged</font></td></tr>
	  '.$disp.'
    </table>
    </td>
   <td >
    <table>
    <tr><td colspan="3"><font color="#666666">Expense Details</font></td></tr>
    <tr><td ><font color="#666666">Sno.</font></td><td ><font color="#666666">Expense Type:</font></td><td ><font color="#666666">Amount:</font></td><td ><font color="#666666">Date:</font></td></tr>
       '.$expenses.'  
    </table>
    </td>
    </tr>
   <tr><td>Total Amount Charged
    '.$amt.' 
</td></tr>
<tr><td>
Estemated Bill is :<font color="#063">
  Rs
     '.$sum.' 
</font>
</td></tr>
<tr><td>
Expenses : <font color="#063">Rs
    '.$exp.'
</font>
</td></tr>
<tr><td>
Gross Income  : <font color="#063">Rs
   '.$temp.'
</font>
</td></tr>
 </table>
';
///////////////////////////////////////////////////////////////////////////////////////
echo $html;

?>