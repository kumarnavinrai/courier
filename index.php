<?php if(isset($_POST['gobtn'])){ if($_POST['un']=="admin" and $_POST['pass']=="123456789"){ header("location:welcome.php");  }else{ $msg="Invalid Login And Password"; }  }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>| Authentication |</title>
<style type="text/css">
#wrap {
	float: left;
	height: 400px;
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
}
#maindiv {
	float: left;
	height: 350px;
	width: 900px;
	padding-top: 25px;
	padding-right: 50px;
	padding-bottom: 25px;
	padding-left: 50px;
}
#head {
	height: 40px;
	width: 880px;
	padding-top: 10px;
	padding-left: 20px;
	background-color: #033;
	font-family: Calibri;
	font-size: 24px;
	color: #FFF;
	text-decoration: none;
}
#foot {
	background-color: #999;
	float: left;
	height: 20px;
	width: 880px;
	padding-top: 5px;
	padding-left: 20px;
}
#middiv {
	float: left;
	height: 298px;
	width: 898px;
	border: 1px dotted #033;
}
#ubox {
	float: left;
	height: 200px;
	width: 400px;
	margin-top: 50px;
	margin-right: 250px;
	margin-bottom: 50px;
	margin-left: 250px;
}
#unbox {
	float: left;
	height: 25px;
	width: 400px;
	padding-top: 5px;
}
#unbox1 {
	float: left;
	height: 25px;
	width: 195px;
	text-align: right;
	padding-right: 5px;
}
#unbox2 {
	float: left;
	height: 25px;
	width: 150px;
	text-align: right;
	padding-right: 49px;
}
.lbltxt1 {
	font-family: Calibri;
	font-size: 16px;
	font-weight: bold;
	color: #333;
	text-decoration: none;
}
.txtbox11 {
	font-family: Calibri;
	font-size: 14px;
	color: #033;
	text-decoration: none;
	vertical-align: middle;
	height: 20px;
	width: 190px;
	border: 1px solid #999;
}
.btnbtn {
	font-family: Calibri;
	font-size: 14px;
	color: #FFF;
	text-decoration: none;
	background-color: #033;
	height: 20px;
	width: 150px;
	border: 1px solid #060;
}
#xxxccc {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #F00;
	text-decoration: none;
}
</style>
</head>

<body>
  
<div id="wrap">
  <div id="maindiv">
  <div id="head">Courier Billing System</div>
 
  <div id="middiv">
   <form id="form1" name="form1" method="post" action="">
    <div id="ubox">
      <div id="unbox">
        <div class="lbltxt1" id="unbox1">User1 Name:</div>
        <div id="unbox2"><input name="un" type="text" class="txtbox11" /></div>
      </div>
      <div id="unbox">
        <div class="lbltxt1" id="unbox1">Password:</div>
        <div id="unbox2"><input name="pass" type="password" class="txtbox11" /></div>
      </div>
      <div id="unbox">
        <div id="unbox1"></div>
        <div id="unbox2">
        
            <input name="gobtn" type="submit" class="btnbtn" id="gobtn" value="Go" />
         
        </div>
      </div>
      <div id="unbox">
       <span id="xxxccc"><?php if(isset($msg)){ echo $msg; } ?></span>         
            
         
        </div>
      </div>
      </form>
    </div>
 <div id="foot"></div>
  </div>
 
</div>
</div>
 
</body>
</html>