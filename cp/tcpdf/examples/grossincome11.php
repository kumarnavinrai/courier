<?php
require_once("../../php/classObject.php"); require_once("../../php/classes.class.php"); require_once('../../reports/calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['pfd'])&& isset($_POST['ptd'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$exp,$expenses)=$obj->cbillincomegrossprint($_POST['pfd'],$_POST['ptd']); } 


////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
//============================================================+
// File name   : example_021.php
// Begin       : 2008-03-04
// Last Update : 2010-08-08
//
// Description : Example 021 for TCPDF class
//               WriteHTML text flow
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML text flow.
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 021');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '   <table width="710" bordercolor="#000000" cellspacing="0" cellpadding="10">
    <tr>
      <td width="406">
    <table width="407">
    <tr><td width="148"><font color="#666666">Bills and Charges Details :</font></td></tr>
    <tr><td><font color="#666666">Customer Name</font></td><td width="97"><font color="#666666">Amount Billed</font></td><td width="112"><font color="#666666">Amount Charged</font></td></tr>
	<?php if(isset($disp)){ echo $disp; } ?>
    </table>
    </td>
    <td colspan="8"></td>
    <td >
    <table>
    <tr><td colspan="3"><font color="#666666">Expense Details</font></td></tr>
    <tr><td ><font color="#666666">Sno.</font></td><td ><font color="#666666">Expense Type:</font></td><td ><font color="#666666">Amount:</font></td><td ><font color="#666666">Date:</font></td></tr>
    <?php if(isset($expenses)){ echo $expenses; } ?>
    </table>
    </td>
    </tr>
    </table>
  <?php if(isset($amt)){ echo $amt; } ?>
</font>
<div id="d3">Estemated Bill is :</div><div id="d333"><font color="#063">
  Rs
    <?php if(isset($sum)){ echo $sum; } ?>
</font></div>
<div id="d4">Expenses : </div><div id="d444"><font color="#063">Rs
  <?php if(isset($exp)){ echo $exp; } ?>
</font></div>
<div id="d5"> Gross Income  : </div><div id="d555"><font color="#063">Rs
  <?php if(isset($sum) && isset($amt)){  echo $amt-$sum+$exp; } ?>
</font></div>
';

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_021.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>

 
  
    
 