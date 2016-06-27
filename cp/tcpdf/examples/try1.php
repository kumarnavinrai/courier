<?php
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2010-08-08
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PRABHNOOR SOFT');
$pdf->SetTitle('REPORTS');
$pdf->SetSubject('TRYING PRINTING');
$pdf->SetKeywords('CHUNU, MUNU, GOGU, BOGU');
define("PDF_HEADER_LOGO11","image.gif");
define("PDF_HEADER_TITLE11","REPORTS");
define("PDF_HEADER_STRING11","PRABHNOOR SOFTWARE");

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO11, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE11.' 048', PDF_HEADER_STRING11);

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
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);
?>
// -----------------------------------------------------------------------------
<?php
require_once("../../php/classObject.php"); require_once("../../php/classes.class.php"); require_once('../../reports/calendar/classes/tc_calendar.php');
$obj1=new selectcust(); $cust=$obj1->selectcustnow();
if(isset($_POST['btn_cust2'])){ $obj=new billcourier(); list($disp,$sum,$fd,$td,$amt,$exp,$expenses)=$obj->cbillincomegross(); 
}
?>
<?php
// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------


// -----------------------------------------------------------------------------



// -----------------------------------------------------------------------------

// Table with rowspans and THEAD


// -----------------------------------------------------------------------------

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">table  now</th>
 </tr>
 <tr>
  <td>aaaa</td>
  <td>bbbb</td>
  <td>ccccc</td>
 </tr>
 <tr>
  <td>dddd</td>
  <td>eeee</td>
  <td>fffff</td>
 </tr>
 <tr>
  <td>ggggg</td>
  <td>hhhhh</td>
  <td>iiiii</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")



// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
