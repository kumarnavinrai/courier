<?php
ob_start();
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wallpaeprama Date</title>
</head>
<body>
<!-- THIS SCRIPT TUTORIAL GUIDE CREATED BY WALLPAPERAMA.COM -->
<h2>Todays Date is: '.date("D M d, Y G:i a").'</h2>
<p><a href="http://www.wallpaperama.com">Script created by wallpaperama.com</a><p>
</body>
</html>';
?>
<?php
$HtmlCode= ob_get_contents();
ob_end_flush();
echo '<hr>This is the value of $HtmlCode: <br><pre style="color:blue;">'.htmlentities($HtmlCode).'</pre>';
?>