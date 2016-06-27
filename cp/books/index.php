<?php require_once("../php/classes.class.php"); 
if(isset($_POST['btnsub'])){

$obj=new booksRecord();

$ans=$obj->inputBookRecord($_POST['datecopy'],$_POST['startcnnoname'],$_POST['endcnnoname'],$_POST['name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['reson'],$_POST['comment']);	
	
	}
if(isset($_GET['ans'])){ $ans=$_GET['ans'];  }	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Books Record</title>
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
$(document).ready(function(){
	//////////////////////////////////
	/////////////////////////////
	/////////////////////////////////////
$("#startcnno").blur(function(){
	/////////////////////////////////
////////////////////////ajax starts here //////
	var abc=$("#startcnno").val();
	   /////////////////////////////////////////////////
	   $.ajax({  
              type: "GET", url: 'checkcns.php?a1='+abc, 
			         complete: function(data){  
                    var response=data.responseText;
					$("#sncheckid").val(response);
				

					 

					
				}  
            
			});  
		
			////////////////////////////////////////////

	
	
	
	///////////////////////ajax ends here//////////////////////////

////////////////////////////
});
////////////////////////////////////
//////////////////////////////
/////////////////////
//////////////////////////////////
	/////////////////////////////
	/////////////////////////////////////
$("#endcnno").blur(function(){
	//////////////////////////////
////////////////////////ajax starts here //////
	var abc=$("#endcnno").val();
	   /////////////////////////////////////////////////
	   $.ajax({  
              type: "GET", url: 'checkcne.php?a1='+abc, 
			         complete: function(data){  
                    var response=data.responseText;
					 $("#encheckid").val(response);
				
					
				}  
            
			});  
		
			////////////////////////////////////////////

	
	

/////////////////////////////
});
////////////////////////////////////
//////////////////////////////
/////////////////////
});
</script>
<script type="text/javascript">
function validate(){

var d=$("#datepicker").val();
var scn=$("#startcnno").val();
var ecn=$("#endcnno").val();
var name=$("#nameid").val();
var add=$("#addressid").val();
var phone=$("#phoneid").val();
var email=$("#emailid").val();
var reason=$("#reasonid").val();
var comment=$("#commentid").val();
var startcncheck=$("#sncheckid").val();
var endcncheck=$("#encheckid").val();


if(startcncheck=="no"){
	
alert("Stock not present for this CN");
$("#startcnno").focus();	
return false;
	
}


if(endcncheck=="no"){
	
alert("Stock not present for this CN");
$("#endcnno").focus();		
return false;
	
}


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

if(name==""){
alert("Enter Name");
$("#nameid").focus();	
return false;
}

if(phone==""){
alert("Enter Phone");
$("#phoneid").focus();	
return false;
}

if(email==""){
alert("Enter Email");
$("#emailid").focus();	
return false;
}




var dc=/^[0-9_.-]+$/; 

var dce=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

  

    if (dc.test(phone))

        {

        true;

        }

        else

        {

        alert("Not a valid Phone number ");
        $("#phoneid").focus(); 
        return false;
        }
		
		

  if (dce.test(email))

        {

        true;

        }

        else

        {

        alert("Not a valid Email... ");
        $("#emailid").focus(); 
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
    <div id="head">C/N Books Record</div>
    <div id="line2">
      <div id="line2lbl"> <a href="../">Go Back To Main</a></div>
      <div class="bk" id="line2txt"><?php if(isset($ans)){ echo $ans;   } ?></div>
    </div>
    <div id="line1">
    <div id="ddivtxttxt">Date:</div>
<div id="dtxt">
        <div class="demo"><input type="text" name="datecopy" class="txtboxes" readonly="readonly" id="datepicker"></div>
        <div style="display: none;" class="demo-description">
          
  </div>
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Start C/N Number of Book</div>
      <div id="line2txt">
        
        <input name="startcnnoname" type="text" class="txtboxes" id="startcnno" value="<?php if(isset($_GET['sn'])){  echo $_GET['sn'];  } ?>" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Last C/N Number of Book</div>
      <div id="line2txt">
        
        <input name="endcnnoname" type="text" class="txtboxes" id="endcnno" value="<?php if(isset($_GET['ln'])){  echo $_GET['ln'];  } ?>" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Name of the person</div>
      <div id="line2txt">
        
        <input name="name" type="text" class="txtboxes" id="nameid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Address of the person</div>
      <div id="line2txt">
        
        <input name="address" type="text" class="txtboxes" id="addressid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Phone Number</div>
      <div id="line2txt">
        
        <input name="phone" type="text" class="txtboxes" id="phoneid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Email</div>
      <div id="line2txt">
        
        <input name="email" type="text" class="txtboxes" id="emailid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Reson for issue of the Book</div>
      <div id="line2txt">
        
        <input name="reson" type="text" class="txtboxes" id="reasonid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl">Comments or Notes</div>
      <div id="line2txt">
        
        <input name="comment" type="text" class="txtboxes" id="commentid" />
      </div>
    </div>
    <div id="line2">
      <div id="line2lbl"><input type="text" name="sncheckname" id="sncheckid" style="visibility:hidden" /><input type="text" name="encheckname" id="encheckid" style="visibility:hidden" />Action</div>
      <div id="line2txt">
        <input name="btnsub" type="submit" class="btncss" id="btnsub" value="Issue"  />
      </div>
    </div>
    <div id="bookdetail">
    <iframe src="<?php echo SITENAME."qtodo/btodo/bookrecordtbls"; ?>" height="918" width="918" frameborder="0"></iframe>
    
    </div>
  </div>
  </form>
</div>
</body>
</html>