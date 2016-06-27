<?php require_once("../php/classes.class.php");
$obj=new groupCustomer();
$codes=$obj->getCcode();

//$gcodes=$obj->seeGroup();

//print_r($gcodes);

if(isset($_POST['btn_sub'])){ $codesxx=implode(',',$_POST['codegroup']);  
$ans=$obj->putCcode($codesxx);    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Group Customer</title>
<style type="text/css">
#wrapper {
	float: left;
	height: auto;
	width: 950px;
}
#headwrap {
	font-family: Calibri;
	font-size: 36px;
	color: #FFF;
	text-decoration: none;
	background-color: #063;
	text-align: center;
	height: 70px;
	width: 950px;
}
#midel {
	float: left;
	height: auto;
	width: 950px;
	border: 1px solid #CCC;
}
#foot {
	float: left;
	height: 50px;
	width: 950px;
	font-family: Calibri;
	font-size: 14px;
	color: #FFF;
	text-decoration: none;
	background-color: #063;
	text-align: center;
}
.gb {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
	color: #033;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
	display: block;
}
.txtbox {
	height: auto;
	width: 450px;
	border: 1px solid #D6D6D6;
}
.btnbtnbtn {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
	background-color: #063;
	border: 1px solid #00F078;
}
</style>
</head>

<body>
<div id="wrapper">
<div id="headwrap">Group Customers</div>
<div id="midel">
<form action="" method="post" enctype="multipart/form-data">
<table width="875" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="164"><a href="<?php echo SITENAME; ?>" class="gb">Go Back</a></td>
    <td width="711"><?php if(isset($ans)){ echo $ans;  } ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><select name="codegroup[]" multiple class="txtbox">
    <?php foreach($codes as $tt): ?>
  <option value="<?php echo $tt['myline']; ?>"><?php echo $tt['myline']; ?></option>
  <?php endforeach; ?>
 
</select></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btn_sub" type="submit" class="btnbtnbtn" value="Group It" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
</tr>
  <tr>
    <td colspan="2"><iframe src="<?php echo SITENAME; ?>qtodo/btodo/customergrouptbls" height="500" width="700" frameborder="0"></iframe></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
  
</table>
</form>
</div>
<div id="foot">Courier Billing System</div>
</div>
</body>
</html>