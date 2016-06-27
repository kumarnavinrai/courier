<?php require_once("../projectconstant.php"); ?>
<?php require_once("../php/classes.class.php"); ?>
<?php $obj=new newform();
list($wrtn,$crtn)=$obj->getCircleandWeight();
$ccode=$obj->picCustCode();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COURIER BILLING SYSTEM</title>
<script language="javascript" type="text/javascript" src="../datetimepicker.js">
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript" src="jsd/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jsd/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript">

	$(function() {  
		
		$( "#da" ).datepicker();
		$( "#da" ).datepicker("option", "dateFormat", "dd-mm-yy");
		
	});
	
</script>
<link type="text/css" href="jsd/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
<style type="text/css">
			/*demo page css*/
			/*body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}*/
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
#line1 {
	float: left;
	height: 35px;
	width: 920px;
	background-color: #E6E6E6;
	margin-top: 20px;
}
#dtxt {
	float: left;
	height: 27px;
	width: 400px;
	text-align: left;
	padding-top: 6px;
	padding-left: 10px;
}
#ddivtxttxt {
	float: left;
	height: 25px;
	width: 400px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #036;
	text-decoration: none;
	text-align: right;
	padding-top: 5px;
	padding-right: 10px;
}
#line2 {
	float: left;
	height: 35px;
	width: 920px;
	margin-top: 10px;
	background-color: #E6E6E6;
}
#line2lbl {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #036;
	text-decoration: none;
	text-align: right;
	float: left;
	height: 22px;
	width: 400px;
	padding-top: 5px;
	padding-right: 10px;
}
#line2txt {
	float: left;
	height: 27px;
	width: 400px;
	text-align: left;
	padding-top: 5px;
	padding-left: 10px;
}
.btncss {
	color: #E6E6E6;
	background-color: #036;
	border: 1px solid #E5E5E5;
	height: auto;
	width: 150px;
}
.txtboxes {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #336;
	text-decoration: none;
	height: auto;
	width: 300px;
	border: 1px solid #B0B0B0;
}
#line2lbl a {
	color: #036;
	text-decoration: none;
}
#line2lbl a:hover {
	text-decoration: underline;
}
#bookdetail {
	float: left;
	height: auto;
	width: 920px;
	margin-top: 10px;
	background-color: #E6E6E6;
}
.bk {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #F00;
	text-decoration: none;
	text-align: center;
}
</style>

<script type="text/javascript">
//////////////////////////////////
$(document).ready(function(){
	////////////social search starts here///////////////////////
$("#des").keyup(function(){
	///////////////////////////////////////////////////
var abc = document.getElementById("des").value;
var m = document.getElementById("mind").value;

var sitename="http://127.0.0.1/welcome14/cp/";

 var url = sitename+"sercity.php?a1="+abc;


	/////////////////////////ajax starts here //////
	
	   /////////////////////////////////////////////////
	   $.ajax({  
              type: "GET", url: sitename+'sercity.php?a1='+abc, 
			         complete: function(data){  
                    $("#resultforjquerydiv").html(data.responseText); 
					var c=$("#resultforjquerydiv").html();
	
				    document.getElementById("sctext").value=c; 
					
				}  
            
			});  
		
			////////////////////////////////////////////

	
	
	
	///////////////////////ajax ends here//////////////////////////
});  //
});
////////////////////////////////
</script>
<link rel="stylesheet" href="../css/cef1.css" type="text/css"/>
<script type="text/javascript" src="../js/cef1.js" language="javascript"></script>
<style type="text/css">
#wrapper #maindiv #head #message {
	font-family: Calibri;
	font-size: 24px;
	font-weight: bold;
	color: #C8B79D;
	text-decoration: none;
	float: left;
	height: 30px;
	width: 880px;
	margin-top: 10px;
	margin-left: 20px;
	text-align: left;
}
#wrapper #maindiv #head #gtb {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
	float: left;
	height: 20px;
	width: 200px;
	padding-left: 700px;
	margin-top: 5px;
}
</style>
</head>

<body onload="first()" >
<div id="wrapper">
<div id="maindiv">
<div id="head">
  <div id="message">COURIER ENTRY</div>
  <div id="gtbgtbgtb"><a href="<?php echo $sitename; ?>" class="gtbsite">GO BACK TO MAIN SITE</a></div>
</div>

<div id="mydiverr"></div>
<form id="abc" name="abc" action="" >
<div id="table1">
<table width="" height="" id="maintable" >
<tr>
  <td>
  <div id="table2">
  <table width="900" height="438" id="maintable2" >
    <tr >
      <td colspan="5" >
       <div id="htxt1"><input name="zonestatename" type="text" class="txtup" id="zonestate" readonly="readonly" /></div><div id="htxt2"><input name="zonedistname" type="text" class="txtup" id="zonedis8" readonly="readonly" /></div> <div id="htxt3"><input name="zonecityname" type="text" class="txtup" id="zonecity" readonly="readonly" /></div><div id="htxt4"><input name="pincode" type="text" class="txtup" id="pincode" readonly="readonly" /></div></td>
      </tr>
    <tr class="tbborder" >
      <td width="294" height="44"><div class="lblall" id="lbl1">COURIER NO</div>
        <div id="txt1"><input name="cunoname" type="text" class="txtall" id="cuno" tabindex="1" onfocus="color1()" onkeyup="displayunicode11(event)" value=""    /></div></td>
      <td colspan="4"><div class="lblall" id="lbl2">SPECIAL</div>
        <div id="txt2"><select name="spename" class="forselboxcls" id="spe" tabindex="2" onfocus="color2()"  onchange="chspe()" onkeypress="displayunicode12(event)"  >
          <option>yes</option>
          <option selected="selected">no</option>
        </select></div></td>
      </tr>
    <tr >
      <td height="45"><div class="lblall" id="lbl3">DESTINATION</div>
        <div id="txt3"><input name="desname" type="text" class="txtall" id="des" tabindex="3"  onfocus="color3()"  onkeyup="displayunicode(event)" /></div></td>
      <td width="224" ><div id="txt4"><input name="sctext1" disabled="disabled" class="txtall" id="sctext"  /></div>
      </td>
      <td colspan="3" >&nbsp;</td>
      </tr>
    <tr >
      <td><div class="lblall" id="lbl5">ZONE</div>
        <div id="txt5"><select name="zonename" class="forselboxcls" id="zone" onfocus="timepass()" onkeyup="displayunicode13(event)"  >
          <?php foreach($crtn as $ee): ?>
          <option value="<?php echo $ee["myline"]["circle"]; ?>" ><?php echo $ee["myline"]["circle"]; ?></option>
          <?php endforeach; ?>
        </select>  </div>    </td>
      <td><div class="lblall" id="lbl6">WEIGHT</div></td>
      <td width="139">
<div id="txt6">
<select name="weightname" class="forselboxcls" id="weight" onfocus="color4()"  onchange="selch()" onkeyup="displayunicode14(event)" >
<?php foreach($wrtn as $uu): ?>     
<option value="<?php echo $uu["myline"]["weight"]; ?>"><?php echo $uu["myline"]["weight"];   ?></option>
<?php endforeach; ?>
</select></div>
      </td>
      <td colspan="2"><div id="txt7">
  <input name="parcelweight" type="text" id="parcelweightid" value="0" onfocus="color5()" onkeyup="displayunicode15(event)" size="5" /> <input name="p1kgtn" type="text" id="p1kgt" value="0" onfocus="color5()" onkeyup="displayunicode15(event)" size="5" style="visibility:hidden" /></div>
        <div class="lblall" id="lbl7">KG</div></td>
      </tr>
    <tr>
      <td height="45"><div class="lblall" id="lbl8">PARCEL or DOC</div> 
        <div id="txt8"><select name="pordname" class="forselboxcls" id="pord" onfocus="color6()" onkeyup="displayunicode16(event)" >
          <option value="parcel">Parcel</option>
          <option value="document" selected="selected">Document</option>
        </select></div></td>
      <td><div class="lblall" id="lbl9">CUST CODE</div></td>
      <td><div id="txt9">
        <select name="cucdname" class="forselboxcls" id="cucd" onfocus="color7()" onkeyup="displayunicode17(event)" >
           <option value="PS">Please Select</option>
<?php  foreach($ccode as $rr):       	?>
<option value="<?php echo $rr["myline"]["cid"];   ?>"><?php echo $rr["myline"]["custcode"];   ?></option>
<?php  endforeach;   ?>
        </select>
      </div>
      </td>
      <td width="74">&nbsp;</td>
      <td width="145">&nbsp;</td>
    </tr>
    <tr >
      <td ><div class="lblall" id="lbl10">DATE</div>
        <div id="txt10"><input name="daname" type="text" class="forselboxcls" id="da"  onkeyup="displayunicode18(event)"   /></div>      </td>
      <td><div class="lblall" id="lbl11"><!--<a href="javascript:NewCal('da','ddmmyyyy')" id="imgdh" onfocus="color8()" onclick="displayunicode18(event)"  ><img src="../cal.gif" id="imgd" border="0" alt="Pick a date"/></a>--></div></td>
      <td><div class="lblall" id="lbl12">DD-MM-YYYY</div></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td height="45"><!--/*********************for select**************/-->
        
        <!--/*********************for select**************/-->
        <!--
    <span class="style1">CUSTOMER CODE*
      <select name="cucd" id="cucd"  >
        <option value="PS">PLEASE SELECT</option>
        <option value="mp">MP</option>
        <option value="jr">JR</option>
        <option value="jma">JMA</option>
        <option value="britania">BRITANIA</option>
        <option value="everfresh">EVERFRESH</option>
        <option value="nddb">NDDB</option>
        <option value="vm">VM</option>
</select>
    </span>
    
    
    --><div class="lblall" id="lbl13">AMOUNT BILL</div>
        <div id="txt13"><input name="ambname" type="text" class="txtall" id="amb" onfocus="color11()" onkeyup="displayunicode21(event)" value="0" /></div>      </td>
      <td colspan="3"><div class="lblall" id="lbl14">AMOUNT CHARGED</div>
        <div id="txt14"><input name="amcname" type="text" class="txtall" id="amc"  onfocus="color12()" onkeyup="displayunicode22(event)" value="0" /></div>      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="89" ><div id="divlbltxt15">
        <div class="lblall" id="lbl15">NOTES</div>
        <div id="txtarea1"><textarea name="notename" onfocus="color9()" id="note" cols="45" rows="2" onkeyup="displayunicode19(event)" >empty</textarea></div>
      </div></td>
      <td></td>
      <td colspan="2"><div id="btndiv"><input name="SUBname" type="button" class="btn" id="SUB" onfocus="color10()" onclick="adde()" value="ADD TO BILL"     /></div></td>
      <td>&nbsp;</td>
    </tr>
    </table><!--main table 2 -->&nbsp;</div></td>
</tr>
</table><!--main table1-->
</div>
  <div id="sertb"></div>
   <div id="htxt">
    <input name="mind" type="text" disabled="disabled" id="mind" value="0" readonly="readonly" />
    <label for="tind"></label>
    <input name="tind" type="text" disabled="disabled" id="tind" value="0" readonly="readonly" />
    <label for="qind"></label>
    <input name="qind" type="text" disabled="disabled" id="qind" value="0" readonly="readonly" />
    <label for="tempp1kgt"></label>
    <input name="tempp1kgt" type="text" disabled="disabled" id="tempp1kgt" value="0" readonly="readonly" />
    </div>
    
</form>

</div><!--maindiv-->
</div><!--wrapper-->
<div id="resultforjquerydiv" style="visibility:hidden"></div>
<div id="resultforaddtobill" ></div>
</body>
</html>
