<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); require_once("dompdf_config.inc.php");
if(isset($_POST['pfd'])){  $obj=new billcourier(); list($disp,$sum,$fd,$td)=$obj->cbillprint($_POST['pfd'],$_POST['ptd']); }
?>
<?php $html='<table border="1" ><tr><td colspan="9">Prabhnoor Courier Billing System Bill </td></tr>
<tr><td colspan="9">Courier Bill Report</td></tr>
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
  '.$disp.'

<tr><td colspan="9">  
Estemated Bill is : '.$sum.' Rs Between :'.$fd.' AND :'.$td.'</td></tr>
</table>';
//echo $html;
///////////////////////////////////////////////////////////////////////////////////////
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4','landscape');
$dompdf->render();
$dompdf->stream("courierbill.pdf");
?>  