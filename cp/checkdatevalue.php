<?php require_once("php/classes.class.php");

$obj=new courierbill();

//$sql="select UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y') as ff from releasebills";
$sql="select UNIX_TIMESTAMP(STR_TO_DATE(fd,'%d-%m-%Y')) as ff from releasebills";
//$sql="select STR_TO_DATE(fd,'%d-%m-%Y') as ff from releasebills";
$res=$obj->fetch($sql);

if($res){ $rw=mysql_fetch_array($res); echo $rw['ff']; }

$rtn="01-02-2011";
$rtn=strtotime($rtn);
echo "---".$rtn."---";
?>