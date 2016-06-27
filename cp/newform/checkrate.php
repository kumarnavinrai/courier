<?php
require_once("../php/classes.class.php");

$objin=new courierbill();  

$special=$_GET['special'];

//echo $special;

$indicator=0;

$obj=new newform();

$disp=$obj->checkZone();

//print_r($disp);
//exit();
foreach($disp as $tt):

//echo $tt['myline']['zone'];
//echo $tt['myline']['state'];
//echo $tt['myline']['city'];
//echo "<br>";

$zone=$tt['myline']['zone'];
$state=explode(",",$tt['myline']['state']);
$city=explode(",",$tt['myline']['city']);

//print_r($city);
//print_r($state);

$cinputdes=$_GET['des'];
$statesystem=$_GET['zonestate'];


if(in_array($cinputdes,$city)){ $indicator=1; break;     }
if(in_array($statesystem,$state)){ $indicator=1; break;     }

endforeach;

if($indicator==0){
$zone=$_GET['custzone'];	
}
	
	
$zone=strtolower($zone);
$zone = str_replace(' ','',$zone);  	
$id=$_GET['customercode'];

$weightwwww=$_GET['weight'];
$weightwwww=strtolower($weightwwww);
$weightwwww = str_replace(' ','',$weightwwww);  	


$zonereal=$zone.$weightwwww;
//echo $_GET['weight'];



$ans=$obj->picRatesWithZone($zone,$id);



///////////////////////////////////////////////////////////////////
foreach($ans as $hh):




if($zonereal==$hh['myline']['f1']){ $rate=$hh['myline']['r1']; 
}elseif($zonereal==$hh['myline']['f2']){ $rate=$hh['myline']['r2']; 
}elseif($zonereal==$hh['myline']['f3']){ $rate=$hh['myline']['r3']; 
}elseif($zonereal==$hh['myline']['f4']){ $rate=$hh['myline']['r4']; 
}elseif($zonereal==$hh['myline']['f5']){ $rate=$hh['myline']['r5']; 
}elseif($zonereal==$hh['myline']['f6']){ $rate=$hh['myline']['r6']; 
}elseif($zonereal==$hh['myline']['f7']){ $rate=$hh['myline']['r7']; 
}elseif($zonereal==$hh['myline']['f8']){ $rate=$hh['myline']['r8']; 
}elseif($zonereal==$hh['myline']['f9']){ $rate=$hh['myline']['r9']; 
}elseif($zonereal==$hh['myline']['f10']){ $rate=$hh['myline']['r10']; 
}


endforeach;

$ansbill=$obj->BillRatesWithZone($zone);

//print_r($ansbill);
foreach($ansbill as $hh):



if($zonereal==$hh['myline']['f1']){ $billrate=$hh['myline']['r1']; 
}elseif($zonereal==$hh['myline']['f2']){ $billrate=$hh['myline']['r2']; 
}elseif($zonereal==$hh['myline']['f3']){ $billrate=$hh['myline']['r3']; 
}elseif($zonereal==$hh['myline']['f4']){ $billrate=$hh['myline']['r4']; 
}elseif($zonereal==$hh['myline']['f5']){ $billrate=$hh['myline']['r5']; 
}elseif($zonereal==$hh['myline']['f6']){ $billrate=$hh['myline']['r6']; 
}elseif($zonereal==$hh['myline']['f7']){ $billrate=$hh['myline']['r7']; 
}elseif($zonereal==$hh['myline']['f8']){ $billrate=$hh['myline']['r8']; 
}elseif($zonereal==$hh['myline']['f9']){ $billrate=$hh['myline']['r9']; 
}elseif($zonereal==$hh['myline']['f10']){ $billrate=$hh['myline']['r10']; 
}


endforeach;

$ccodeid=$_GET['customercode'];


/*echo "-----------";
echo $rate;
echo "-----------";

echo "-----------";
echo $zonereal;
echo "-----------";

echo "-----------";
echo $billrate;
echo "-----------";
exit();*/
//echo $ccodeid;
////////////////////////////////////////////////////////////
$ccode=$obj->picCustomerCode($ccodeid);

//echo $ccode;



$zonecityx=$_GET['zonecity'];

$zonedistx=$_GET['zonedist'];

$zonestatex=$_GET['zonestate'];

$destinationx=$_GET['des'];

$weightx=$_GET['weight'];

$weightxreserve=$_GET['weight'];

$cnnox=$_GET['cnno'];

$specialx=$_GET['special'];

$parcelweightx=$_GET['parcelweight'];

$parcelordocumentx=$_GET['parcelordocument'];

$customercodex=$_GET['customercode'];

$datevalx=$_GET['dateval'];

$amountofbillx=$_GET['amountofbill'];

$chargedamountfromcustx=$_GET['chargedamountfromcust'];

$notesfromcustx=$_GET['notesfromcust'];
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
//PICKING WEIGHT FOR PARCEL AND AND ADDNL 500 GRAMS
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
$addsomegram=0;
//list($addsomegram,$psa)=$obj->picAddnlWeight();

list($picparcelweight,$psaparcel)=$obj->picParcelWeight();



/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////


if($specialx=='no'){
/////////////////////////////////////////////////////////////
/////////////////////////additional if starts here //////////////////////
if($weightx==$addsomegram){
	
$weightx=strtolower($weightx);
$weightxwithaddtag = str_replace(' ','',$weightx); 
$weightx = str_replace(' ','',$weightx);  	
$weightx=substr($weightx,3,6);

//echo "---";	 echo $weightx; echo "---"; echo $zone; echo "---";	echo "Add Nl 500 gram"; 
$picaddfixrate=$zone.$weightx;
//echo "---"; echo $customercodex; echo "---";
//echo $picaddfixrate; echo "---";
$picaddfixratewithaddtag=$zone.$weightxwithaddtag;
$fixratewithaddrtagrate=$obj->picAddnlWeightFixRate($zone,$customercodex,$picaddfixratewithaddtag);
 $fixrate=$obj->picAddnlWeightFixRate($zone,$customercodex,$picaddfixrate);
$fixratebillwithaddrtagrate=$obj->picAddnlWeightFixRateBill($zone,$customercodex,$picaddfixratewithaddtag);
 
 $fixratebill=$obj->picAddnlWeightFixRateBill($zone,$customercodex,$picaddfixrate);
 //echo "-amount charged fix--"; echo $fixrate; echo "---";
 //echo "-amount charged add--"; echo $rate; echo "---";
 //echo "-amount charged bill--"; echo $billrate; echo "---";
 //echo "-parcel weight x--"; echo $parcelweightx; echo "---";
//////////////////////////////////////////////////////////////////////////////////////////////
 if($parcelweightx=="" or $parcelweightx==0 ){ echo "Enter Weight of Consignment ::"; exit(); 
 }elseif($parcelweightx!="" or $parcelweightx!=0 ){  
 
 $weightinputbyuser=$parcelweightx."kg";
 $weightingrams=$parcelweightx * 1000;
 
 $weightingrams=$weightingrams/500;
 
 $weightingrams=floor($weightingrams);
 
  $fixrate=$fixratewithaddrtagrate * $weightingrams+$fixrate;

  //echo "-amount charged fix calc--"; echo $fixrate; echo "---";

 $addrate=$fixrate;
 //echo "-amount charged fix calc--"; echo $fixrate; echo "---";
  //echo "-amount billed fix--";   echo $fixratebill; echo "---";
 $fixratebill=$fixratebillwithaddrtagrate * $weightingrams+$fixratebill;
  //echo "-amount billed fix cacl--";   echo $fixratebill; echo "---";
 
 $addbill=$fixratebill;
 $notesfromcustx.="-Rate-".$weightxreserve."-Applied-";
 
 
 ///////////////////////////////////////////////////////
  //echo "-amount billed fix cacl--";   echo $fixratebill; echo "---";
$sql="INSERT INTO $ccode (cnno,special,destination,weight,pord,amtb,amtc,date,notes) VALUES('$cnnox','$specialx','$destinationx','$weightinputbyuser','$parcelordocumentx','$addbill','$addrate','$datevalx','$notesfromcustx')";

$res=$objin->execute($sql);

if($res){ echo $cnnox." _ Rate: _ ".$addrate." _ Bill: _ ".$addbill." _ Weight: _ ".$weightinputbyuser." _ Date: _ ".$datevalx." _ Success";   exit(); }else{  echo "Tech Prob"; exit();   }
 
  //echo $sql;
      }//inner of ends here
 
 //////////////////////////////////////////////////////////////////////
 exit();
 
	 }////add 500g if ends here

/////////////////////////additional if ends here //////////////////////

//////////////////////////parcel if starts here /////////////////////////////////////

if($weightx==$picparcelweight){
	
//echo "-----";	echo  $picparcelweight;  echo "-----";
//echo "-----";	echo  $psaparcel;   echo "-----";

 if($parcelweightx=="" or $parcelweightx==0 ){ echo "Enter Weight of Consignment ::"; exit(); 
 }elseif($parcelweightx!="" or $parcelweightx!=0 ){  
//echo "-----";	echo  $parcelweightx;   echo "-----";
$parcelweightx=floor($parcelweightx);
$parcelweightx=$parcelweightx+1;
$billrate=$billrate * $parcelweightx;
$rate=$rate * $parcelweightx;
$weightx=$parcelweightx." kg";
$parcelordocumentx="parcel";


$sql="INSERT INTO $ccode (cnno,special,destination,weight,pord,amtb,amtc,date,notes) VALUES('$cnnox','$specialx','$destinationx','$weightx','$parcelordocumentx','$billrate','$rate','$datevalx','$notesfromcustx')";
//echo $sql;
$res=$objin->execute($sql);

if($res){ echo $cnnox." _ Rate: _ ".$rate." _ Bill: _ ".$billrate." _ Weight: _ ".$weightx." _ Date: _ ".$datevalx." _ Success";   exit(); }else{  echo "Tech Prob"; exit();   }

////////////////////////////////////////////////
 }//inner if ends here
	exit();
}////parcel if ends here

//////////////////////////parcel if ends here ///////////////////////////////////////

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

//////////important do not delete /////////////////////

$sql="INSERT INTO $ccode (cnno,special,destination,weight,pord,amtb,amtc,date,notes) VALUES('$cnnox','$specialx','$destinationx','$weightx','$parcelordocumentx','$billrate','$rate','$datevalx','$notesfromcustx')";

//echo $sql;
$res=$objin->execute($sql);

if($res){ echo $cnnox." _ Rate: _ ".$rate." _ Bill: _ ".$billrate." _ Weight: _ ".$weightx." _ Date: _ ".$datevalx." _ Success";   exit(); }else{  echo "Tech Prob"; exit();   }

//////////important do not delete /////////////////////
/////////////////////////////////////////////////////////////
}elseif($specialx=='yes'){

$sql="INSERT INTO $ccode (cnno,special,destination,weight,pord,amtb,amtc,date,notes) VALUES('$cnnox','$specialx','$destinationx','$weightx','$parcelordocumentx','$amountofbillx','$chargedamountfromcustx','$datevalx','$notesfromcustx')";
	
//echo $sql;

$res=$objin->execute($sql);

if($res){ echo $cnnox." _ Rate: _ ".$chargedamountfromcustx." _ Bill: _ ".$amountofbillx." _ Weight: _ ".$weightx." _ Date: _ ".$datevalx." _ Success";   exit(); }else{  echo "Tech Prob"; exit();   }
exit();
	
}



 

?>