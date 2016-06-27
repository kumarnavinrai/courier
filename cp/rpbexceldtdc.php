<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");	
	
$fdz = $_POST["fde1"];
$tdz = $_POST["tde1"];
$ccdz = $_POST["cde1"];

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");


$query1 = "select * from cdata where ccode='$ccdz'";
$result1=mysql_query($query1);
$row1 = mysql_fetch_array($result1);

$customername=$row1[0];
$customeraddress=$row1[1];
$customerphone=$row1[4];
$customeremail=$row1[2];






$query = "select *,STR_TO_DATE(date,'%d-%m-%Y') as realdate from $ccdz ORDER BY realdate ASC";
//$query = "select * from $ccdz ORDER BY date ASC";
$result=mysql_query($query);

$tnum=mysql_num_rows($result);
//$row = mysql_fetch_array($result, MYSQL_BOTH);
//$b=date("d/m/Y",strtotime($a));

$fdy=strtotime($fdz); 
$tdy=strtotime($tdz); 

echo "<h4> M/s PRABHNOOR ENTERPRISES <BR/>";
echo "56a KALIA COLONY JALANDHAR<BR/>";
echo "PH . 9915965138 <BR/></H4>";
echo "<h3> THE BILL FOR  :$customername";
echo " <br/>BETWEEN DATES FROM : $fdz TO $tdz </H3>";
echo "<h3><br/>Phone - $customerphone";
echo "<br/>Address - $customeraddress";
echo "<br/>Email - $customeremail </H3>";


//echo "TOTAL NUMBER OF C/N SENT BY YOU BETWEEN GIVEN DATES  :  ";
//echo $tnum;
$ambsum=0;
$amcsum=0;

	

  
   
    
   ECHO " <p><table width='200' border='1' summary='BILL FOR GIVEN DATES'>";
  ECHO "<caption>";
  ECHO "  BILL FOR GIVEN DATES";
  ECHO "</caption>";
  ECHO "<tr>";
    ECHO "<th scope='col'>CN/NO</th>";
    ECHO "<th scope='col'>SPECIAL</th>";
    ECHO "<th scope='col'>DESTINATION</th>";
    ECHO "<th scope='col'>WEIGHT</th>";
    ECHO "<th scope='col'>PARCEL OR DOCUMENT</th>";
    ECHO "<th scope='col'>AMOUNT BILLED</th>";
    ECHO "<th scope='col'>AMOUNT CHARGED</th>";
    ECHO "<th scope='col'>DATE</th>";
    ECHO "<th scope='col'>REMARKS</th>";
  ECHO "</tr>";
    while($row = mysql_fetch_array($result))
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
	  
	  if( $chro>=$fdy && $tdy>=$chro)
	  {
  
  ECHO "<tr>";
    ECHO "<td>";
	echo $row[0]; 
	ECHO "</td>";
    ECHO "<td>";
	echo $row[1]; 
	ECHO "</td>";
	
    ECHO "<td>";
	echo $row[2];
	ECHO "</td>";
    ECHO "<td>";
	echo $temp;
	ECHO "</td>";
    ECHO "<td>";
	echo $row[4];
	ECHO "</td>";
    ECHO "<td>";
	echo $row[5];
	ECHO "</td>";
    ECHO "<td>";
	echo $row[6]; 
	ECHO "</td>";
    ECHO "<td>";
	echo $row[7];
	ECHO "</td>";
    ECHO "<td>";
	echo $row[8];
	ECHO "</td>";
  ECHO "</tr>";
  
  
	  
  $ambsum =$ambsum + $row[5];
  $amcsum= $amcsum + $row[6];
	  }
  
  
  }
  
ECHO "</table>";


  echo "<h3>TOTAL AMOUNT OF BILL (APPROX)<BR/>";
  echo "THESE GIVEN DATES IS :  RS  $ambsum ";
  echo "</h3>";
  echo "<h3>TOTAL AMOUNT FOR THESE GIVEN DATES IS :  RS  $amcsum<br/>";
  echo "</h3>";
  $profit=$amcsum-$ambsum;
  echo "PROFIT FOR THESE GIVEN DATES IS    :   $profit";
  echo "<br/><br/><br/><br/>";
  echo "STAMP";
  echo "<br/><br/>";
  echo "SIGN";

     header("Content-type: application/octet-stream");
     
  
      # replace excelfile.xls with whatever you want the filename to default to
  
      header("Content-Disposition: attachment; filename=excelile.xls");
  
      header("Pragma: no-cache");
  
      header("Expires: 0");
  

?>