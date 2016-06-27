<?php
ob_start('ob_gzhandler');
require_once"projectConstant.php";
class courierbill{
function courierbill()
{
	$con=mysql_connect(DB_HOST,DB_USER,DB_PSWD)  or die("Could Not Connect To The Datebase" . mysql_error());
	     mysql_select_db(DB_NAME,$con)           or die("Could Not Select The Datebase"     . mysql_error());
}
function fetch($sql)
{
   $rs=mysql_query($sql) or die($this->showError(mysql_error(),$sql));
   if(mysql_num_rows($rs)>0)
	 {
	  return $rs;
	 }
   else
	{
	 return false;
    }
  }
function execute($sql)
{
   $rs=mysql_query($sql) or die($this->showError(mysql_error(),$sql));
   if(mysql_affected_rows())
	 {
	  return true;
	 }
   else
     {
	  return false;
	 }
   }
function showError($sqlError,$sql)
 {
  $errorMsg="
	        <div class='diverror'>
			<div class='dismsg'>SQL :" .$sql."</div>
			<div class='dismsg'>ERROR :" .$sqlError."</div>
			</div>
			";
 echo $errorMsg;
  }  
}
?>