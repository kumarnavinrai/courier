<?php require_once("../php/classes.class.php");
if(isset($_GET['a1'])){
	
	$obj=new booksRecord();
	
	$res=$obj->checkbookstart($_GET['a1']);
	
	if($res){ echo "yes"; }else{  echo "no";   }
	
}
?>