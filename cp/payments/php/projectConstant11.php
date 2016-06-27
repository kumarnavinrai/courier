<?php 
//==========================================Database Connection==========================================
define("DB_HOST","localhost");
define("DB_USER","affi4121_cpusr");
define("DB_PSWD","nikku27sep");
define("DB_NAME","affi4121_cp");
define("SITENAME","http://cp.affinis.in/cp/");
//=========================================CONSTANTS=====================================================
define("__DIRNAME__",DIRNAME(__FILE__));
//========================================VALIDATIONS====================================================
define("VALID_EMAIL","/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9])+(\.[a-zA-Z0-9_-]+)+$/");
define("VALID_MOBILE","/^([0-9]{1})([0-9]{1})([0-9]{8})$/");
define("VALID_PHONE","/^([0-9]{1})([0-9]{1})([0-9]{8})$/");
define("VALID_INT","/^\d*\.{0,1}\d+$/");
//=======================================Email settings===========
define("EMAIL1","kumarnavinrai@hotmail.com");
//=======================================Messages=====================
define("TECH_MSG",'<font color="red"><b>Error :</b> Technical problem please contact Admin or try again later.</font>');
define("EMT_MSG","<b>Error :</b> Please specify");
define("RCD_NOT_AVAIL",'<span style="color:#F00;text-align:center;">Recored not available try again later.</span>');
?>