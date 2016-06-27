<?php require_once("../projectconstant.php"); ?>
<?php require_once("../php/classes.class.php");
$obj=new newform();

$msg="Pic Customer for Edit";

list($disp1,$disp2)=$obj->getCircleandWeight();
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['scedit'])){  


$id=$_POST['custidforedit'];




//$sql="UPDATE cdata SET cname='$customername',cemail='$customeremail',cphone='$customerphone',cadd='$customeradd' WHERE id=$id";

$ans=$obj->custDataUpdate($_POST['cn'],$_POST['ce'],$_POST['cp'],$_POST['ca'],$id);

if($ans){ $msg="SuccessFully Updated"; }


$w=sizeof($disp1); $c=sizeof($disp2);  


 foreach($disp2 as $rr): 
    
     
      foreach($disp1 as $yy): 
     
      $name=strtolower($rr['myline']['circle']).strtolower($yy['myline']['weight'])."txt";
      $name = str_replace(' ','',$name);  
	  $v=$_POST["$name"];
	  
		 $rtn1[]=$v; 
		 
	  endforeach; 
	 
	  
	  $circlex=strtolower($rr['myline']['circle']);
	  $circlex = str_replace(' ','',$circlex);
	  $rtnreal[]=array($circlex=>$rtn1);
      $rtn1=array();
	 
	  endforeach; 



foreach($rtnreal as $ff):
foreach($ff as $key=>$ratex):


$arrsize=sizeof($ratex);

if($arrsize==1){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==2){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==3){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==4){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==5){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==6){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==7){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==8){
	
	
	$ratex[$arrsize]=0;
	$arrsize=$arrsize+1;
}
if($arrsize==9){
	
	
	$ratex[$arrsize]=0;
	
}

$id=$_POST['custidforedit'];





$ans=$obj->custRateDataUpdate($ratex,$key,$id);

if($ans){ $msg="Success Fully Updated"; }
////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
endforeach;
endforeach;
//$ans=$obj->EditcustRecordAndRates($rtnreal,$disp1,$disp2,$_POST['cn'],$_POST['cp'],$_POST['ccaa'],$_POST['ca'],$_POST['ce']);
//////////////rate insertion ends here ////////////////////


   }//////echo "Edit Mode";
//////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////

/////////////////customer insertion starts here /////////////////////////////
if(isset($_POST['sc'])){   

//echo "------";
//echo $_POST['cn'];
//echo "------";
//echo $_POST['cp'];
//echo "------";
//echo $_POST['ccaa'];
//echo "------";
//echo $_POST['tav'];
//echo "------";
//echo $_POST['ca'];
//echo "------";
//echo $_POST['ce'];
//echo "------";


}
///////////////customer insertion ends here ////////////////////////////// 



////////////////rate insertion starts ///////////////////////

if(isset($_POST['sc'])){ $w=sizeof($disp1); $c=sizeof($disp2);  


 foreach($disp2 as $rr): 
    
      //echo $rr['myline']['circle']; 
      foreach($disp1 as $yy): 
      //echo $yy['myline']['weight']; 
      $name=strtolower($rr['myline']['circle']).strtolower($yy['myline']['weight'])."txt";
      $name = str_replace(' ','',$name);  
	  $v=$_POST["$name"];
	  
		 $rtn1[]=array($name=>$v); 
		 
	  endforeach; 
	 
	  
	  $circlex=strtolower($rr['myline']['circle']);
	  $circlex = str_replace(' ','',$circlex);
	  $rtnreal[]=array($circlex=>$rtn1);
     //echo "----";
	    $rtn1=array();
	  //echo $circlex;
	   //echo "----";
	  endforeach; 
 //print_r($rtnreal);
//////////////////////////////////

//echo "------";
//echo $_POST['cn'];
//echo "------";
//echo $_POST['cp'];
//echo "------";
//echo $_POST['ccaa'];
//echo "------";
//echo $_POST['tav'];
//echo "------";
//echo $_POST['ca'];
//echo "------";
//echo $_POST['ce'];
//echo "------";



////////////////////////////////////////////


//$ans=$obj->incustRecordAndRates($rtnreal,$disp1,$disp2,$_POST['cn'],$_POST['cp'],$_POST['ccaa'],$_POST['ca'],$_POST['ce']);
//////////////rate insertion ends here ////////////////////

 }//isset if ends here
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
if(isset($_POST['btn_cust_search'])){

	$rtn=$obj->picCustomerDataForEditing($_POST['cucd']);
	

	
	$dispr=$obj->picCustomerRatesForEditing($_POST['cucd']);
	
	//print_r($dispr);
	
}
//////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUSTOMER REGISTRATION FORM</title>
<link href="../css/custadd.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/custadd.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
function validate(){

var custname=document.getElementById("cn").value;
var custphone=document.getElementById("cp").value;
var custcode=document.getElementById("cc").value;
////var codeavail=document.getElementById("tav").value;
var custadd=document.getElementById("ca").value;
var custemail=document.getElementById("ce").value;

if(custname==""){   alert("Please Enter Customer Name"); document.getElementById("cn").focus();

return false;   }

if(custadd==""){   alert("Please Enter Customer Address"); document.getElementById("ca").focus();

return false;   }

if(custcode==""){   alert("Please Enter Customer Code"); document.getElementById("cc").focus();

return false;   }

/*if(custphone==""){   alert("Please Enter Customer Phone"); document.getElementById("cp").focus();

return false;   }*/

//if(codeavail==""){   alert("Please Check Code Availability"); document.getElementById("tav").focus();

//return false;   } 


/*if(custemail==""){   alert("Please Enter Customer Email"); document.getElementById("ce").focus();

return false;   }
*/
/////////////////////////////////////////////////////////

/*if(codeavail!="Available"){   alert("Please Change Code"); document.getElementById("tav").focus();

return false;   }


 var dc=/^[0-9(\s)]+$/; 
	
	if (dc.test(custphone))
		{
		true;
		}
		else
		{
		alert("Please Enter Customer Phone in Digits Only"); 
		document.getElementById("cp").focus();
		return false;
		}*/

////////////////////////////////////////////////////////////////



var dc=/^[-_.a-z0-9]+@(([-_a-z0-9]+\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/
	
	/*if (dc.test(custemail))
		{
		true;
		}
		else
		{
		alert("Only enter valid email address ");
		document.getElementById("ce").focus();
		return false;
		}*/

var csize=<?php echo sizeof($disp1); ?>;
var tsize=<?php echo sizeof($disp2); ?>;

var range=csize*tsize+7-1;
var i=1;


/////////////////////////////////
for(i=6;i<range;i++){ 
//////////////////////////////////////////
  
var a=document.forms[1].elements[i].value;

if(a==""){
	
	    alert("Please Enter Rate"); 
		document.forms[1].elements[i].focus();
		return false;
}

 var dc=/^[0-9(\s)]+$/; 
	
	if (dc.test(a))
		{
		true;
		}
		else
		{
		alert("Please Enter valid rate"); 
		document.forms[1].elements[i].focus();
		return false;
		}


}/////for loop ends here

//////////////////////////////////////////////////////////////////
	return true;
	
}
</script>
<script type="text/javascript">
function removeSpaces(xx){
var aa=document.getElementById('cc').value	
document.getElementById('cc').value=removeSpaces1(aa);
}

function removeSpaces1(string) {
 return string.split(' ').join('');
}
</script>
<style type="text/css">
#wrapper #main #cdiv {
	float: left;
	height: auto;
	width: 900px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	background-color: #FFEAEA;
}
#wrapper #main #cdiv #formhead {
	float: left;
	height: 25px;
	width: 650px;
	padding-top: 3px;
	padding-right: 50px;
	padding-bottom: 3px;
	padding-left: 200px;
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #CE4E7E;
	text-decoration: none;
}
#wrapper #main #cdiv #form1 #table1div {
	float: left;
	height: 120px;
	width: 900px;
}
#wrapper #main #cdiv #form1 #table2div {
	float: left;
	height: auto;
	width: 900px;
	border: 1px solid #EC8DD7;
}
.txtlbl {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #CE4E7E;
	text-decoration: none;
	text-align: center;
}
.txtlbl1 {
	font-family: Calibri;
	font-size: 18px;
	font-weight: bold;
	color: #FFB693;
	text-decoration: none;
	text-align: center;
}
.txtbox1 {
	border: 1px solid #CE4E7E;
	text-align: center;
	font-family: Calibri;
	font-size: 12px;
	color: #400000;
	text-decoration: none;
}
.btn1 {
	background-color: #900;
	border: 2px solid #066;
	text-align: center;
	font-family: Calibri;
	color: #FFF;
}
.table1 {
	border: 3px solid #033;
}
.tbl1 {
	border: 3px solid #FFF;
}
#wrapper #main #head #goback {
	float: left;
	height: 15px;
	width: 250px;
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #000;
	margin-top: 10px;
	margin-left: 50px;
}
.txtlbl2 {
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #CD573D;
	text-decoration: none;
	text-align: center;
}
</style>
</head>

<body onload="fload()">

<div id="wrapper">
<div id="main">
<div id="head">
  <a href="<?php echo $sitename; ?>"><div id="goback">GO BACK TO MAIN MENU</div></a>
</div>
<div id="mydivcust"><?php if(isset($msg)){  echo $msg;    } ?> </div>
<div id="cdiv"> 
<div id="formhead">
<form name="form2" action="" method="post">
<table width="auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>SELECT CUSTOMER</td>
    <td>&nbsp;</td>
    <td>
     <?php
define("__ROOT__",dirname(__FILE__));
require_once("../projectconstant.php");

$username = "$serveruser";
$password = "$serverpass";
$hostname = "$servername";	
$dbh = mysql_connect($hostname, $username, $password) 
		or die("Unable to connect to MySQL");
$selected = mysql_select_db($serverdatabase,$dbh) 
		or die("Could not select customer data");

$query = "select ccode,id from cdata ORDER BY id ASC";
$result=mysql_query($query);

?><select name="cucd" class="txtbox1" id="cucd">
<option value="PS">Please Select</option>
<?php
while($row = mysql_fetch_array($result))
{

?><option value="<?php echo $row["id"];?>"><?php echo $row["ccode"];?></option><?php
} ?></select>
    &nbsp;</td>
    <td><input type="submit" name="btn_cust_search" id="btncustsearch" value="Go" />&nbsp;</td>
  </tr>
</table>
</form>
</div>
<form id="form1" name="form1" method="post" action="">
<div id="table1div">
  <table width="900" border="0">
    <tr>
      <td width="119" class="txtlbl">NAME
        
        <label for="cn"></label></td>
      <td width="274"><input name="cn" type="text" class="txtbox1" id="cn" onfocus="color1()" onkeyup="fenter1(event)" value="<?php if(isset($rtn[0])){  echo $rtn[0];   } ?>" /></td>
      <td width="163" class="txtlbl">ADDRESS
        <label for="ca"></label></td>
      <td width="231"><input name="ca" type="text" class="txtbox1" id="ca" onfocus="color2()" onkeyup="fenter2(event)" value="<?php if(isset($rtn[1])){  echo $rtn[1];   } ?>" /></td>
      </tr>
    <tr>
      <td class="txtlbl">PHONE
        <label for="cp"></label></td>
      <td><input name="cp" type="text" class="txtbox1" id="cp" onfocus="color3()" onkeyup="fenter3(event)" value="<?php if(isset($rtn[4])){  echo $rtn[4];   } ?>" /></td>
      <td class="txtlbl">EMAIL
        <label for="ce"></label></td>
      <td><input name="ce" type="text" class="txtbox1" id="ce" onfocus="color4()" onkeyup="fenter4(event)" value="<?php if(isset($rtn[2])){  echo $rtn[2];   } ?>" /></td>
      </tr>
    <tr>
      <td class="txtlbl">CODE
        <label for="cc"></label></td>
      <td><input name="ccaa" type="text" class="txtbox1" id="cc" onfocus="color5()" onkeyup="fenter5(event)"  onblur="removeSpaces(1);" readonly="readonly" value="<?php if(isset($rtn[3])){  echo $rtn[3];   } ?>" /></td>
      <td><label for="tav"></label>
        <!--<input type="button" class="btn1" id="ab" onclick="funavail()" value="CHECK AVAILABILITY"/>--></td>
      <td><input name="tav" type="text" disabled="disabled" id="tav" readonly="readonly" style="visibility:hidden" /></td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      </tr>
  </table>
</div>
<div id="table2div">
  <table width="900" border="0"  id="ratetable">
  <?php foreach($disp2 as $rr): ?>
    <tr class="table1">
      <td height="40" colspan="4" class="txtlbl2"><?php echo $rr['myline']['circle']; ?></td>
      </tr>
       <tr class="tbl1">
       <?php foreach($disp1 as $yy): ?>
      <td width="184" height="37" class="txtlbl1"><?php echo $yy['myline']['weight']; ?>
       <?php $name=strtolower($rr['myline']['circle']).strtolower($yy['myline']['weight'])."txt";
	   $name1=strtolower($rr['myline']['circle']).strtolower($yy['myline']['weight']);
	   $nameid=strtolower($rr['myline']['circle']).strtolower($yy['myline']['weight']);
	   $name = str_replace(' ','',$name);
	   $name1 = str_replace(' ','',$name1);
	   $nameid = str_replace(' ','',$nameid);
	    ?>
        <?php 
		if(isset($dispr) and is_array($dispr)){
		foreach($dispr as $hh):
		
		$zonereal=$name1;
		  
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
		}?>
<input name="<?php echo $name; ?>" type="text" class="txtbox1"  onfocus="color6()" onkeyup="fenter6(event)" size="4"  value="<?php if(isset($rate)){  echo $rate;   } ?>"  />
        RS</td>
      <?php endforeach; ?>
      </tr>
      <?php endforeach; ?>
      <tr class="table1">
      <td colspan="4"><input name="scedit" type="submit" class="btn1" id="sc"  onkeyup="fenter18(event)" onclick="return validate()" value="SAVE CUSTOMER" />&nbsp;&nbsp;<input type="text" name="custidforedit" id="custidforeditid" value="<?php if(isset($rtn[5])){ echo $rtn[5];     } ?>" style="visibility:hidden" />  </td>
      </tr>
      </table>
</div>
<!--------
<div id="table2div">
  <table width="900" border="0"  id="ratetable">
    <tr class="table1">
      <td height="40" colspan="4" class="txtlbl2">SHIPPER RATES</td>
      </tr>
    <tr class="tbl1">
      <td width="184" height="37" class="txtlbl1">250G
        <label for="s250"></label>
        <input name="s250" type="text" class="txtbox1" id="s250" onfocus="color6()" onkeyup="fenter6(event)" size="4" />
        RS</td>
      <td width="184" class="txtlbl1">500G
        <label for="s500"></label>
        <input name="s500" type="text" class="txtbox1" id="s500" onfocus="color7()" onkeyup="fenter7(event)" size="4" />
        RS</td>
      <td width="180" class="txtlbl1">1KG
        <label for="s1kg"></label>
        <input name="s1kg" type="text" class="txtbox1" id="s1kg" onfocus="color8()" onkeyup="fenter8(event)" size="4" />
        RS</td>
      <td width="265" class="txtlbl1">PARCEL
        <input name="sp1kg" type="text" class="txtbox1" id="sp1kg" onfocus="color9()"  onkeyup="fenter9(event)" size="4" />
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td height="38" colspan="4" class="txtlbl2">ZONE RATES</td>
      </tr>
    <tr class="tbl1">
      <td height="40" class="txtlbl1">250G
        <label for="z250"></label>
        <input name="z250" type="text" class="txtbox1" id="z250" onfocus="color10()" onkeyup="fenter10(event)" size="4" />
        RS</td>
      <td class="txtlbl1">500G
        <label for="z500"></label>
        <input name="z500" type="text" class="txtbox1" id="z500" onfocus="color11()" onkeyup="fenter11(event)" size="4" />
        RS</td>
      <td class="txtlbl1">1KG
        <label for="z1kg"></label>
        <input name="z1kg" type="text" class="txtbox1" id="z1kg" onfocus="color12()" onkeyup="fenter12(event)" size="4" />
        RS</td>
      <td class="txtlbl1">PARCEL
        <label for="zp1kg"></label>
        <input name="zp1kg" type="text" class="txtbox1" id="zp1kg" onfocus="color13()" onkeyup="fenter13(event)"  size="4"/>
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td height="42" colspan="4" class="txtlbl2">REST OF INDIA RATES</td>
      </tr>
    <tr class="tbl1">
      <td height="47" class="txtlbl1">250G
        <label for="r250"></label>
        <input name="r250" type="text" class="txtbox1" id="r250" onfocus="color14()" onkeyup="fenter14(event)" size="4" />
        RS</td>
      <td class="txtlbl1">500G
        <label for="r500"></label>
        <input name="r500" type="text" class="txtbox1" id="r500" onfocus="color15()" onkeyup="fenter15(event)" size="4" />
        RS</td>
      <td class="txtlbl1">1KG
        <label for="r1kg"></label>
        <input name="r1kg" type="text" class="txtbox1" id="r1kg" onfocus="color16()" onkeyup="fenter16(event)" size="4" />
        RS</td>
      <td class="txtlbl1">PARCEL
        <label for="rp1kg"></label>
        <input name="rp1kg" type="text" class="txtbox1" id="rp1kg" onfocus="color17()" onkeyup="fenter17(event)" size="4" />
        RS PER/KG</td>
      </tr>
    <tr class="table1">
      <td colspan="4"><input name="sc" type="button" class="btn1" id="sc" onclick="funadd()" onkeyup="fenter18(event)" value="SAVE CUSTOMER" />&nbsp;</td>
      </tr>
  </table>
</div>------>
</form>
</div>
<div id="footer"></div>
</div>
</div>
<div id="statusid" style="visibility:hidden" >sdfsfs</div>
</body>
</html>