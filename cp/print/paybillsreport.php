<?php
require_once("../php/classObject.php"); require_once("../php/classes.class.php"); 
if(isset($_POST['pfd'])){  $obj=new billandpayments(); $disp=$obj->paybillsreportprint($_POST['pfd'],$_POST['ptd']);  }
?>
<?php $html='<table width="auto" border="1" align="center" cellpadding="10" cellspacing="0" ID="table2" bordercolor="#666666" >
  <tr>
    <th class="txthead" scope="col">BILL NO</th>
    <th class="txthead" scope="col">CUSTOMER</th>
    <th class="txthead" scope="col">FROM</th>
    <th class="txthead" scope="col">TO</th>
    <th class="txthead" scope="col">BILL</th>
    <th class="txthead" scope="col">PAID</th>
    <th class="txthead" scope="col">AMOUNT</th>
    </tr>
  <TR><TD colspan="7" class="txtr">&nbsp;</TD>
    </TR>
 '.$disp.'
  </table>';
echo $html;
?>