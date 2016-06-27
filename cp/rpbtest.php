<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
	
$fdz = "11-7-2011";
$tdz = "31-7-2011";
$ccdz = "mp";

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select * from $ccdz ORDER BY date ASC";
$result=mysql_query($query);

$tnum=mysql_num_rows($result);
//$row = mysql_fetch_array($result, MYSQL_BOTH);
//$b=date("d/m/Y",strtotime($a));

$fdy=strtotime($fdz); 
$tdy= strtotime($tdz); 
echo "<h3> THE BILL GENERATED FOR $ccdz BETWEEN DATES FROM : $fdz TO $tdz </H3>";
echo "<h3> PLEASE SCROLL DOWN FOR DETAILS </H3>";
//echo "TOTAL NUMBER OF C/N SENT BY YOU BETWEEN GIVEN DATES  :  ";
//echo $tnum;
$ambsum=0;
$amcsum=0;
echo $fdy;
echo $tdy;

	?>

  
   
    
    <p><table width="200" border="1" summary="BILL FOR GIVEN DATES">
  <caption>
    BILL FOR GIVEN DATES
  </caption>
  <tr>
    <th scope="col">CN/NO&nbsp;</th>
    <th scope="col">SPECIAL&nbsp;</th>
    <th scope="col">DESTINATION&nbsp;</th>
    <th scope="col">WEIGHT&nbsp;</th>
    <th scope="col">PARCEL OR DOCUMENT&nbsp;</th>
    <th scope="col">AMOUNT BILLED&nbsp;</th>
    <th scope="col">AMOUNT CHARGED&nbsp;</th>
    <th scope="col">DATE&nbsp;</th>
    <th scope="col">REMARKS&nbsp;</th>
  </tr>
  <?php  while($row = mysql_fetch_array($result))
  {
	  //$fdy=date("d/m/y", strtotime($fdz)); 

		$temp = $row[3];
		
		if($temp <250)
		{
			$temp = "$temp kg";
		}
		
		if($temp >=250)
		{
			$temp = "$temp g";
		}
		
	  $chro=strtotime($row[7]);
	  echo $chro;
	  if( $chro>=$fdy && $tdy>=$chro)
	  {
  ?>
  <tr>
    <td><?php echo $row[0]; ?>&nbsp;</td>
    <td><?php echo $row[1]; ?>&nbsp;</td>
    <td><?php echo $row[2]; ?>&nbsp;</td>
    <td><?php echo $temp; ?>&nbsp;</td>
    <td><?php echo $row[4]; ?>&nbsp;</td>
    <td><?php echo $row[5]; ?>&nbsp;</td>
    <td><?php echo $row[6]; ?>&nbsp;</td>
    <td><?php echo $row[7]; ?>&nbsp;</td>
    <td><?php echo $row[8]; ?>&nbsp;</td>
  </tr>
  
  <?php
	  
  $ambsum =$ambsum + $row[5];
  $amcsum= $amcsum + $row[6];
	  }
  
  
  }
   ?>
</table>
<?php

  echo "TOTAL AMOUNT FOR THESE GIVEN DATES IS :  RS ";
  echo $amcsum;
  

?>