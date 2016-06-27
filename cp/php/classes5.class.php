<?php  require_once('classObject.php'); require_once('classes.class.php');
/////////////////////////////////////////////////////////////////////////////////////////////////
class billscustnew{
	/////////////////////////////////////////////////
	function billscustnew(){
	
	$this->obj=new courierbill();	
		
	}
	/////////////////////////////////////////////////
	function getselfname(){
		
	$sql="SELECT * FROM customermastertbls";
	
	$res=$this->obj->fetch($sql);
	
	if($res){
		
		$rw=mysql_fetch_array($res);
		
		$rtn=array($rw['customer_name'],$rw['customer_address'],$rw['customer_phone'],$rw['customer_email']);
		 	 	 	 
	}else{
	
	echo "Tech Prob"; exit();
		
	}
	
	return $rtn;
		
	}///function brace
	
	///////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getgroup(){
$sql="SELECT * FROM customergrouptbls";

$res=$this->obj->fetch($sql); 	
	
	if($res){  
	
	while($rw=mysql_fetch_array($res)){
	
	$rtn[]=array('mygroup'=>$rw['cust_group']);	
		
	}
	
	   }else{   return false;   }
	
	return $rtn;
	
 } //function brace ends  
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getBillsData($ccode,$fromdate,$todate){
	
$objgroup=new groupCustomer();

$ftst=$objgroup->getFuandSt();

////////////////////////////////////
foreach($ftst as $gg):

$taxname=$gg['myline']['taxname'];
$fulecharges=$gg['myline']['ft'];
$servicetax=$gg['myline']['st'];
break;
endforeach;
////////////////////////////////////


//print_r($ftst);

//UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))
$sql = "SELECT *,UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) as realdate from $ccode WHERE UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) >= $fromdate AND UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) <= $todate ORDER BY realdate ASC";
//WHERE realdate >= $fromdate AND realdate <= $todate ORDER BY realdate ASC


$res=$this->obj->fetch($sql);

if($res){
	
	while($rw=mysql_fetch_array($res)){
 	///////////////////////////////////////////	 	 	 	 		
	if($fulecharges>1){
	$camt=$rw['amtc'];
	$calcamtcharged=$rw['amtc'];	
 	$amountaftertax=$calcamtcharged*$fulecharges/100;
	$fulechargescalculated=$amountaftertax;
	$amountaftertax=$amountaftertax+$camt;
	$amountaftertax=$amountaftertax*$servicetax/100;
	$servicetaxcalulated=$amountaftertax;
	$amountaftertax=$amountaftertax+$camt; 	 	
	}else{$amountaftertax=$rw['amtc']; }
	/////////////////////////////////////////////////// 	 	 		
	$rtn[]=array('mydata'=>array('cn'=>$rw['cnno'],'sp'=>$rw['special'],'des'=>$rw['destination'],'we'=>$rw['weight'],'pd'=>$rw['pord'],'amtb'=>$rw['amtb'],'amtc'=>$rw['amtc'],'dt'=>$rw['date'],'notes'=>$rw['notes'],'custname'=>$ccode,'fulecharges'=>$fulechargescalculated,'servicetax'=>$servicetaxcalulated,'amtaftertax'=>$amountaftertax));

	}
}else{ $rtn[]=array('mydata'=>array('cn'=>0,'sp'=>0,'des'=>0,'we'=>0,'pd'=>0,'amtb'=>0,'amtc'=>0,'dt'=>0,'dt'=>0)); }




return $rtn;

	
}////get bills data
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getBillsDataarray($ccode,$fromdate,$todate,$cz){
	
$objgroup=new groupCustomer();

$ftst=$objgroup->getFuandSt();



	
	$arrpassi=0;
	$group=self::getgroup();
//print_r($group);	
////////////////////////group sensing starts ///////
if($group and is_array($group)){
foreach($group as $tt):
$grouparr=explode(",",$tt['mygroup']);
//print_r($grouparr);

if(in_array($cz,$grouparr)){
	
	$groupindicator=1; 
	$groupsize=sizeof($grouparr);
	
	break;
}
endforeach;

uplabel:

if($arrpassi<$groupsize){	
$ccdz=$grouparr[$arrpassi];
////////////////////////////////////
foreach($ftst as $gg):

$dtaxname=$gg['myline']['taxname'];
$dfulecharges=$gg['myline']['ft'];
$dservicetax=$gg['myline']['st'];
break;
endforeach;
////////////////////////////////////
////////////////////////////////////
foreach($ftst as $gg):


$taxname=$gg['myline']['taxname'];

$p='/'.$taxname.'/';

if (preg_match($p,$ccdz)) {
        
		$taxname=$gg['myline']['taxname'];
		$fulecharges=$gg['myline']['ft'];
		$servicetax=$gg['myline']['st'];
		break;
     } else {
        $taxname=$dtaxname;
		$fulecharges=$dfulecharges;
		$servicetax=$dservicetax;
		 }
		 
endforeach;
////////////////////////////////////
$ccode=$ccdz;
$arrpassi++;
}else{ goto downlabel;  }


}
/////////////////////////group sensing ends here /////
	
//UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))
$sql = "SELECT *,UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) as realdate from $ccode WHERE UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) >= $fromdate AND UNIX_TIMESTAMP(STR_TO_DATE(date,'%d-%m-%Y')) <= $todate ORDER BY realdate ASC";
//WHERE realdate >= $fromdate AND realdate <= $todate ORDER BY realdate ASC

$res=$this->obj->fetch($sql);

if($res){
	
	
	while($rw=mysql_fetch_array($res)){
	////////////////////////////////////////////////////
	
	if($fulecharges>1){
	$camt=$rw['amtc'];
	$calcamtcharged=$rw['amtc'];	
 	$amountaftertax=$calcamtcharged*$fulecharges/100;
	$fulechargescalculated=$amountaftertax;
	$amountaftertax=$amountaftertax+$camt;
	$amountaftertax=$amountaftertax*$servicetax/100;
	$servicetaxcalulated=$amountaftertax;
	$amountaftertax=$amountaftertax+$camt; 	  	 	 	
	}else { $amountaftertax=$rw['amtc'];   }
	//////////////////////////////////////////////////// 		
	$rtn[]=array('mydata'=>array('cn'=>$rw['cnno'],'sp'=>$rw['special'],'des'=>$rw['destination'],'we'=>$rw['weight'],'pd'=>$rw['pord'],'amtb'=>$rw['amtb'],'amtc'=>$rw['amtc'],'dt'=>$rw['date'],'notes'=>$rw['notes'],'custname'=>$ccode,'fulecharges'=>$fulechargescalculated,'servicetax'=>$servicetaxcalulated,'amtaftertax'=>$amountaftertax));
	}
}else{ $rtn[]=array('mydata'=>array('cn'=>0,'sp'=>0,'des'=>0,'we'=>0,'pd'=>0,'amtb'=>0,'amtc'=>0,'dt'=>0,'dt'=>0)); }

goto uplabel;

downlabel:



return $rtn;


}////get bills data
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getCustData($code){
	
	$sql="SELECT * FROM cdata WHERE ccode='$code'";
	
	$res=$this->obj->fetch($sql);
	
	if($res){  
	$rw=mysql_fetch_array($res);
	
	$rtn=array($rw['cname'],$rw['cadd'],$rw['cemail'],$rw['cphone']);
	
	    }else{  echo "Tech Prob Cdata"; exit();    }
		
		return $rtn;
	
}/////function ends here 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function checkRealesebill($fd,$td,$cc){
	

	
//UNIX_TIMESTAMP(STR_TO_DATE(date, '%d-%m-%Y'))
$sql = "SELECT * from releasebills WHERE UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y')) >= $fd AND UNIX_TIMESTAMP(STR_TO_DATE(td,'%d-%m-%Y')) <= $td AND cucode='$cc'";
//WHERE realdate >= $fromdate AND realdate <= $todate ORDER BY realdate ASC	
$res=$this->obj->fetch($sql);


if($res){   return 1;  }else{   return 0;   }
	
}///function check release bill
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getBillNo(){
$sql = "SELECT MAX(id) AS billno from releasebills";

$res=$this->obj->fetch($sql);

if($res){  $rw=mysql_fetch_array($res);  return $rw['billno'];  }else{  echo "Tech Prob"; exit();   }
	
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function putBillIn($code,$fd,$td,$bill,$charge){
	
$sql="INSERT INTO releasebills (cucode,fd,td,ba,paid,billam) VALUES('$code','$fd','$td','$charge','no','$bill')";
$res=$this->obj->execute($sql);

if($res){  true;  }else{  echo "Tech Prob"; exit();   }	
	
}/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
}///end fo\\of bills cust new
?>