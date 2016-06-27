<?php require_once("../php/classes.class.php");
$obj=new newform();
$dispcity=$obj->selectCity();
$dispstate=$obj->selectState();
$dispzone=$obj->selectZones();

if(isset($_POST['btn_sub'])){  $sstate=implode(",",$_POST['state']); $ccity=implode(",",$_POST['city']);  $res=$obj->insertZonesAssociation($_POST['zone'],$ccity, $sstate); echo $res;   }

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zone City Association</title>
<style type="text/css">
#wrapper {
	float: left;
	height: 700px;
	width: 950px;
}
#headwrap {
	font-family: Calibri;
	font-size: 14px;
	color: #FFF;
	text-decoration: none;
	background-color: #063;
	text-align: center;
	height: 70px;
	width: 950px;
}
#midel {
	float: left;
	height: 400px;
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
</style>
</head>

<body>
<div id="wrapper">
<div id="headwrap">Zone city Association</div>
<div id="midel">
<form action="" method="post" enctype="multipart/form-data">
<table width="875" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><select name="city[]" multiple>
    <?php foreach($dispcity as $tt): ?>
  <option value="<?php echo $tt['myline']['city']; ?>"><?php echo $tt['myline']['city']; ?></option>
  <?php endforeach; ?>
 
</select></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><select name="state[]" multiple>
 <?php foreach($dispstate as $tt): ?>
  <option value="<?php echo $tt['myline']['state']; ?>"><?php echo $tt['myline']['state']; ?></option>
  <?php endforeach; ?>
  
</select></td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
<tr>
  <td>&nbsp;</td>
    <td><select name="zone">
    
  <?php foreach($dispzone as $tt): ?>
  <option value="<?php echo $tt['myline']['circle']; ?>"><?php echo $tt['myline']['circle']; ?></option>
  <?php endforeach; ?>
  
</select></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    <td><input name="btn_sub" type="submit" /></td>
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