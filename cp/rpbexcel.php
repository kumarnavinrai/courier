<?php
require_once("projectconstant.php");
 header("Content-type: application/octet-stream");
     
  
      # replace excelfile.xls with whatever you want the filename to default to
  
      header("Content-Disposition: attachment; filename=excelile.xls");
  
      header("Pragma: no-cache");
  
      header("Expires: 0");	
	
$fdz = $_POST["fde1"];
$tdz = $_POST["tde1"];
$ccdz = $_POST["cde1"];

//echo $fdz;
//echo $tdz;
//echo $ccdz;

//exit();

$fdx=strtotime($fdz); 
$tdx=strtotime($tdz);


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

//*************************query to check dates accounted or not 

$query10="select fd,td from releasebill where cucode='$ccdz'";
$result10=mysql_query($query10);
 while($row10 = mysql_fetch_array($result10))
  {

$fdy=strtotime($row10[0]); 
$tdy=strtotime($row10[1]);
  
  
  }

//*************************query to check dates accounted



$queryinsert="select max(billno) from releasebill";


$resultinsert=mysql_query($queryinsert);




$rowinsert=mysql_fetch_array($resultinsert);

$billno=$rowinsert[0];

$billno = $billno + 1;

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

	

  
   
    
   echo " <p><table width='200' border='1' summary='BILL FOR GIVEN DATES'>";
  echo "<caption>";
  echo "  BILL FOR GIVEN DATES";
  echo "</caption>";
  echo "<tr>";
    echo "<th scope='col'>CN/NO</th>";
    
    echo "<th scope='col'>DESTINATION</th>";
    echo "<th scope='col'>WEIGHT</th>";
    echo "<th scope='col'>PARCEL OR DOC</th>";
    
    echo "<th scope='col'>AMOUNT</th>";
    echo "<th scope='col'>DATE</th>";
    echo "<th scope='col'>REMARKS</th>";
  echo "</tr>";
    while($row = mysql_fetch_array($result))
  {
	  //$fdy=date("d/m/y", strtotime($fdz));
	  $temp = $row[3];
		
		if($temp <250)
		{
			$temp = "$temp ";
		}
		
		if($temp >=250)
		{
			$temp = "$temp ";
		}
		 

	  $chro=strtotime($row[7]);
	  
	  if( $chro>=$fdy && $tdy>=$chro)
	  {
  
  echo "<tr>";
    echo "<td>";
	echo $row[0]; 
	echo "</td>";
    
	
    echo "<td>";
	echo $row[2];
	echo "</td>";
    echo "<td>";
	echo $temp;
	echo "</td>";
    echo "<td>";
	echo $row[4];
	echo "</td>";
    
    echo "<td>";
	echo $row[6]; 
	echo "</td>";
    echo "<td>";
	echo $row[7];
	echo "</td>";
    echo "<td>";
	echo $row[8];
	echo "</td>";
  echo "</tr>";
  
  
	  
  $ambsum =$ambsum + $row[5];
  $amcsum= $amcsum + $row[6];
	  }
  
  
  }
  $pd="no";
  //************************************
  
$sql="select * from releasebill where cucode='".$ccdz."'";
$res=mysql_query($sql);
if($res){ $rw=mysql_fetch_array($res); $fromdx=strtotime($fdz); $todx=strtotime($tdz); 

$fdt=strtotime($rw[2]); $tdt=strtotime($rw[3]);
if($fromdx>=$fdt and $todx<=$tdt){ echo "<h1><b>Bills for entered dates are alredy released</b></h1>"; exit(); 
}
		while($rw=mysql_fetch_array($res)){
		$fromdx=strtotime($fdz); $todx=strtotime($tdz); $fdt=strtotime($rw[2]); $tdt=strtotime($rw[3]);
		if($fromdx>=$fdt and $todx<=$tdt){ echo "<h1><b>Bills for entered dates are alredy released</b></h1>"; exit; 
		}
		}

  }

$query = "insert into releasebill (billno,cucode,fd,td,ba,paid,billam) values ('$billno','$ccdz','$fdz','$tdz','$amcsum','$pd','$ambsum')";
$result=mysql_query($query);


if(! $result )
{
  die('Could not be Accounted: ' . mysql_error());
}
echo "Accounted\n";

//******************************************************


  
echo "</table>";


  echo "<h3> TOTAL AMOUNT FOR THESE GIVEN DATES IS :  RS ";
  echo $amcsum;
    $samtc = (string)$amcsum;
  
?>

<?php

$nwords = array(  "", "one", "two", "three", "four", "five", "six", 
	      	  "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", 
	      	  "fourteen", "fifteen", "sixteen", "seventeen", "eightteen", 
	     	  "nineteen", "twenty", 30 => "thirty", 40 => "fourty",
                     50 => "fifty", 60 => "sixty", 70 => "seventy", 80 => "eigthy",
                     90 => "ninety" );

function number_to_words ($x)
{
     global $nwords;
     if(!is_numeric($x))
     {
         $w = '#';
     }else if(fmod($x, 1) != 0)
     {
         $w = '#';
     }else{
         if($x < 0)
         {
             $w = 'minus ';
             $x = -$x;
         }else{
             $w = '';
         }
         if($x < 21)
         {
             $w .= $nwords[$x];
         }else if($x < 100)
         {
             $w .= $nwords[10 * floor($x/10)];
             $r = fmod($x, 10);
             if($r > 0)
             {
                 $w .= ' '. $nwords[$r];
             }
         } else if($x < 1000)
         {
		
             	$w .= $nwords[floor($x/100)] .' hundred';
             $r = fmod($x, 100);
             if($r > 0)
             {
                 $w .= ' '. number_to_words($r);
             }
         } else if($x < 1000000)
         {
         	$w .= number_to_words(floor($x/1000)) .' thousand';
             $r = fmod($x, 1000);
             if($r > 0)
             {
                 $w .= ' ';
                 if($r < 100)
                 {
                     $w .= ' ';
                 }
                 $w .= number_to_words($r);
             }
         } else {
             $w .= number_to_words(floor($x/1000000)) .' million';
             $r = fmod($x, 1000000);
             if($r > 0)
             {
                 $w .= ' ';
                 if($r < 100)
                 {
                     $word .= ' ';
                 }
                 $w .= number_to_words($r);
             }
         }
     }
     return $w;
}

$rr=$samtc;
echo "<br/>";
echo strtoupper(number_to_words($rr));
echo " Rupees Only";
echo "<br/><br/>";
//  echo number_to_words($samtc);
  echo "</h3>";
  echo "<br/><br/><br/><br/>";
    echo "STAMP";
  echo "<br/><br/>";
  echo "SIGN";


// demonstration

/*if(isset($_POST['num']))
{
     echo '
      '.htmlspecialchars($_POST['num']).' = '.number_to_words($_POST['num']).'<p>
     <a href="'.$_SERVER['PHP_SELF'].'">try again</a>';
}else{
     echo '
     <form method="post" action="'.$_SERVER['PHP_SELF'].'">
         <input type="text" name="num">
         <input type="submit" value="spell number">
     </form>';
}*/

?>

<?php
     //header("Content-type: application/octet-stream");
     
  
      # replace excelfile.xls with whatever you want the filename to default to
  
      //header("Content-Disposition: attachment; filename=excelile.xls");
  
      //header("Pragma: no-cache");
  
      //header("Expires: 0");
  

?>