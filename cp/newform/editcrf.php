<?php require_once("../projectconstant.php"); ?>
<?php require_once("../projectconstant.php"); ?>
<?php require_once("../php/classes.class.php");
 if(isset($_POST['btn_cust_search'])){ echo "hello"; } ?>
<?php 
$obj=new newform();

list($disp1,$disp2)=$obj->getCircleandWeight();

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


$ans=$obj->incustRecordAndRates($rtnreal,$disp1,$disp2,$_POST['cn'],$_POST['cp'],$_POST['ccaa'],$_POST['ca'],$_POST['ce']);
//////////////rate insertion ends here ////////////////////

 }//isset if ends here

 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CUSTOMER EDIT FORM</title>
<link rel="stylesheet" href="../css/editcrf.css" type="text/css" />
<script src="../js/editcrf.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
function cser()
{
var tempc = document.getElementById("cucd").value;	
	
	var sitename="http://subcp1.dekhfashion.com/";

		if(tempc=="PS")
		{
		alert("PLEASE SELECT CUSTOMER");
		document.getElementById("cucd").focus();
		javascript_abort();
		}



	var url = sitename+"sercust.php?a1="+tempc;
 
   $.ajax({  
                type: "GET", url: sitename+"sercust.php?a1="+tempc, 
			         complete: function(data){  
                  //  $("#downdivforser").html(data.responseText); 
			
				document.getElementById("cn").value=data.responseText;
	            var res1 = document.getElementById("cn").value;
                abc(res1); 
				}  
            
			});  
 

  /*if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  cust1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  cust1=new ActiveXObject("Microsoft.XMLHTTP");
  }
cust1.onreadystatechange=function()
  {
  if (cust1.readyState==4 && cust1.status==200)
    {
    document.getElementById("cn").value=cust1.responseText;
	var res1 = document.getElementById("cn").value;
    abc(res1);
	
    }
  }

  
cust1.open("GET",url,true);
cust1.send();*/



//*******************************fuction brace
}

</script>
<style type="text/css">
.txtbox2 {
	font-family: Calibri;
	font-size: 12px;
	font-weight: bold;
	color: #060;
	text-decoration: none;
	border: 2px solid #E28C27;
}
.bordercl {
	border: 2px solid #11396A;
}
</style>
</head>

<body>
<div id="wrapper">
<div id="maindiv">
<div id="head">
  <a href="<?php echo $sitename; ?>"><div id="btn"></div></a>
</div>
<div id="mydivcust"> </div>

<form id="form1" name="form1" method="post" action="">
<div id="table1">
  <table width="900" height="170" border="0"  id="eratetable1">
    <tr >
    <td  ><!--/*********************for select**************/-->
      <?PHP
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

?>
      <span class="txt1">CUSTOMER CODE*      </span>
      <!--/*********************for select**************/-->
&nbsp;</td>
    <td><span class="style1">
      <select name="cucd" class="txtbox2" id="cucd">
        <option value="PS">Please Select</option>
        <?php
while($row = mysql_fetch_array($result))
{

?>
        <option value="<?php echo $row["ccode"];?>"><?php echo $row["ccode"];?></option>
        <?php
}
?>
      </select>
    </span></td>
    <td><input type="button"  name="btn_cust_search" class="btn1" onclick="cser()" value="SEARCH"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="txt1">NAME
      
        <label for="cn"></label></td>
    <td ><input name="cn" type="text" class="txtbox2" id="cn" /></td>
    <td class="txt1" >ADDRESS
      <label for="ca"></label></td>
    <td ><input name="ca" type="text" class="txtbox2" id="ca" /></td>
  </tr>
  <tr>
    <td class="txt1">PHONE
      <label for="cp"></label></td>
    <td><input name="cp" type="text" class="txtbox2" id="cp" /></td>
    <td class="txt1">EMAIL
      <label for="ce"></label></td>
    <td><input name="ce" type="text" class="txtbox2" id="ce" /></td>
  </tr>
  <tr>
    <td class="txt1">CODE
      <label for="cc"></label></td>
    <td><input name="cc" type="text" disabled="disabled" id="cc" /></td>
    <td colspan="2"><label for="tav"></label>
      <input type="button" class="btn1" id="ab" style="visibility:hidden" onclick="funavail()" value="GET CUSTOMER READY FOR EDIT" />
      <input name="tav" type="text" id="tav" style="visibility:hidden" /></td>
  </tr>
</table>
</div>
<div id="table2">
<table width="900" height="300" border="0" id="eratetable" align="center" >
  <tr >
    <td  colspan="4" class="txt2">SHIPPER RATES</td>
    </tr>
  <tr class="bordercl">
    <td class="bordercl" ><span class="txt1">250G Rs</span>
<input name="s250" type="text" class="txtbox2" id="s250" size="4" /></td>
    <td class="bordercl"><span class="txt1">500G Rs</span>
<input name="s500" type="text" class="txtbox2" id="s500" size="4" /></td>
    <td class="bordercl"><span class="txt1">1KG Rs</span>
<input name="s1kg" type="text" class="txtbox2" id="s1kg" size="4"/></td>
    <td class="bordercl"><span class="txt1">PARCEL Rs</span>
      <input name="sp1kg" type="text" class="txtbox2" id="sp1kg" size="4" />
       <span class="txt1">Per/KG</span></td>
  </tr>
  <tr >
    <td colspan="4" class="txt2">ZONE RATES</td>
    </tr>
  <tr class="bordercl">
    <td class="bordercl" ><span class="txt1">250G Rs</span>
<input name="z250" type="text" class="txtbox2" id="z250" size="4" /></td>
    <td class="bordercl"><span class="txt1">500G
      Rs</span>      <input name="z500" type="text" class="txtbox2" id="z500" size="4" /></td>
    <td class="bordercl" ><span class="txt1">1KG Rs</span>
<input name="z1kg" type="text" class="txtbox2" id="z1kg" size="4" /></td>
    <td class="bordercl" ><span class="txt1">PARCEL Rs</span>
<input name="zp1kg" type="text" class="txtbox2" id="zp1kg" size="4"/>
       <span class="txt1">Per/KG</span></td>
  </tr>
  <tr>
    <td  colspan="4" class="txt2">REST OF INDIA RATES</td>
    </tr>
  <tr class="bordercl">
    <td class="bordercl" ><span class="txt1">250GRs</span>
<input name="r250" type="text" class="txtbox2" id="r250" size="4" /></td>
    <td class="bordercl" ><span class="txt1">500G Rs</span>
<input name="r500" type="text" class="txtbox2" id="r500" size="4" /></td>
    <td class="bordercl" ><span class="txt1">1KG Rs</span>
<input name="r1kg" type="text" class="txtbox2" id="r1kg" size="4" /></td>
    <td class="bordercl" ><span class="txt1">PARCEL Rs</span>
<input name="rp1kg" type="text" class="txtbox2" id="rp1kg" size="4" />
       <span class="txt1">Per/KG</span></td>
  </tr>
  <tr >
    <td colspan="4"><input type="button" class="btn1" onclick="funadd()" value="SAVE CUSTOMER" />&nbsp;</td>
    </tr>
</table>
</div>
</form>
<div id="foot"></div>
</div>
</div>
</body>
</html>