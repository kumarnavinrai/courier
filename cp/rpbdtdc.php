<?php
define("__ROOT__",dirname(__FILE__));
require_once(__ROOT__."/projectconstant.php");
	
$fdz = $_GET['a1'];
$tdz = $_GET['b1'];
$ccdz = $_GET['c1'];

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");
		
		
		
		
		
$query1 = "select * from cdata where ccode='$ccdz'";
$result1=mysql_query($query1);
$row1 = mysql_fetch_array($result1, MYSQL_BOTH);

//$row = mysql_fetch_array($result, MYSQL_BOTH);

$customername=$row1[0];
$customeraddress=$row1[1];
$customerphone=$row1[4];
$customeremail=$row1[2];

		
		
		
		
		
		
		
		//SELECT *,STR_TO_DATE(textdate,'%Y/%m/%d') as realdate FROM table ORDER BY realdate;

$query = "select *,STR_TO_DATE(date,'%d-%m-%Y') as realdate from $ccdz ORDER BY realdate ASC";
$result=mysql_query($query);


$tnum=mysql_num_rows($result);
//$row = mysql_fetch_array($result, MYSQL_BOTH);
//$b=date("d/m/Y",strtotime($a));

$fdy=strtotime($fdz); 
$tdy=strtotime($tdz);


echo "<h4> M/s PRABHNOOR ENTERPRISES <BR/>";
echo "56a KALIA COLONY JALANDHAR<BR/>";
echo "PH . 9915965138 <BR/></H4>";
echo "<h3> THE BILL FOR   :$customername";
echo " <br/>BETWEEN DATES FROM : $fdz TO $tdz </H3>";
echo "<h3><br/>Phone - $customerphone";
echo "<br/>Address - $customeraddress";
echo "<br/>Email - $customeremail </H3>";
 
//echo "TOTAL NUMBER OF C/N SENT BY YOU BETWEEN GIVEN DATES  :  ";
//echo $tnum;
$ambsum=0;
$amcsum=0;

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


?>