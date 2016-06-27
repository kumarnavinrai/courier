<?php require_once("../php/classes.class.php"); 

$obj=new booksRecord();
$stp=0;
list($issue,$tot)=$obj->StockStatusReport();


//print_r($issue);
foreach($tot as $tt):

$stp=$tt['myline']['total'];

endforeach;

//print_r($tot);

if(isset($_GET['ans'])){ $ans=$_GET['ans'];  }	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock Record Report</title>
<style type="text/css">
#wrap {
	float: left;
	height: auto;
	width: 940px;
	margin-right: auto;
	margin-left: auto;
}
#mydiv {
	float: left;
	height: auto;
	width: 920px;
	margin-top: 25px;
	margin-right: 10px;
	margin-bottom: 25px;
	margin-left: 10px;
	background-color: #F8F8F8;
}
#head {
	background-color: #336;
	float: left;
	height: 40px;
	width: 645px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 36px;
	color: #FFF;
	text-decoration: none;
	text-align: left;
	vertical-align: middle;
	display: block;
	padding-top: 2px;
	padding-left: 275px;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="jsd/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jsd/js/jquery-ui-1.8.21.custom.min.js"></script>
<script>
	$(function() {  
		
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker("option", "dateFormat", "dd-mm-yy");
		
	});
	</script>
    <script>
	/*$(function() {
		$( "#datepicker" ).datepicker();
		$( "#format" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
		});
	});*/
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
	width: 800px;
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
	width: 800px;
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
function validate(){

var d=$("#datepicker").val();
var scn=$("#startcnno").val();
var ecn=$("#endcnno").val();

var comment=$("#commentid").val();



if(d==""){
alert("Enter Date");
$("#datepicker").focus();	
return false;
}


if(scn==""){
alert("Enter Start Number");
$("#startcnno").focus();	
return false;
}

if(ecn==""){
alert("Enter End Number");
$("#endcnno").focus();	
return false;
}


return true;	
	
}
</script>
</head>

<body>
<div id="wrap">
<form action="" name="form1" method="post" onsubmit="return validate()" > 
  <div id="mydiv">
    <div id="head">C/N Books Stock Status Report</div>
    <div id="line2">
      <div id="line2lbl"> <a href="../">Go Back To Main</a></div>
      <div class="bk" id="line2txt"><?php if(isset($ans)){ echo $ans;   } ?></div>
    </div>
    <div id="line1">
      <div id="dtxt">
        <div style="display: none;" class="demo-description">
    
  </div>
    </div>
    </div>
    <div id="line2">
      <div id="line2txt"><table width="754" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="170">&nbsp;</td>
    <td width="207" class="ui-widget">Stock Present</td>
    <td width="52">:</td>
    <td width="290" class="ui-state-focus">Total <?php if(isset($stp)){  echo $stp;  } ?> Books in Stock</td>
    <td width="35">&nbsp;</td>
  </tr>
</table>
</div>
    </div>
    <div id="line2">
      <div id="line2txt"></div>
    </div>
    <div id="line2">
      <div id="line2txt"></div>
    </div>
    <div id="line2">
      <div id="line2txt"></div>
</div>
    <div id="line2">
      <div id="line2txt"></div>
    </div>
    <div id="bookdetail"></div>
  </div>
  </form>
</div>
</body>
</html>