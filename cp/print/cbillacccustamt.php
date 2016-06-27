<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once("dompdf_config.inc.php");
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['pfd'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt)=$obj->cbillcustamtprint($_POST['pfd'],$_POST['ptd'],$_POST['custcode']); 
}
$temp=$amt-$sum;
$html='<h1>PRABHNOOR COURIER BILLING SYSTEM</h1></br>';
$html.='<h1>INCOME REPORT FOR ONE CUSTOMER</h1></br>';
$html.='<table border="1" bordercolor="#000000" cellspacing="0" >
  <tr>
    <td>CUSTOMER</td>
    <td>C NO.</td>
    <td>SPECIAL</td>
    <td>DESTINATION</td>
    <td>WEIGHT</td>
    <td>P or D</td>
    <td>BILL AMT</td>
    <td>DATE</td>
    <td>NOTES</td>
  </tr>
  <TR><TD >&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD><TD>&nbsp;</TD></TR>
   '.$disp.'
<tr><td colspan="9">Estemated Bill is : '.$sum.' Rs </td></tr><tr><td colspan="9">Between :'.$fd.' AND :'.$td.' </td></tr><tr><td colspan="9"> Amount Charged :'.$amt.'Rs</td></tr><tr><td colspan="9">
Income In this Time Span : '.$temp.' Rs</td></tr></table>';
      
///////////////////////////////////////////////////////////////////////////////////////
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4','landscape');
$dompdf->render();
$dompdf->stream("incomeonecustomer.pdf");
?>