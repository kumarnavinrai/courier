<?php
require('../../fpdf17/fpdf.php');
?>
<?php
require_once("../../php/classObject.php"); require_once("../../php/classes.class.php"); require_once('../../reports/calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['pfd'])&& isset($_POST['ptd'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$exp,$expenses)=$obj->cbillincomegrossprint($_POST['pfd'],$_POST['ptd']); } 

$temp=$amt-$sum+$exp;
////////////////////////////////////////////////////////////////////////////////////////////////
?>
<?php
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$temp);
$pdf->Output();
?>