
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

//date("m/d/Y",strtotime($row['emp_dob']));



$a =  "17-7-2011";
$b = strtotime($a);
$c =  "18-7-2011";
$d = strtotime($a);

$b=date("d-m-y",strtotime($a));
$d=date("d-m-y",strtotime($c));

echo "*********";
echo $b;
echo "*********";
echo $d;
echo "*********";

if ($b<$d)
{
	echo "yes";
}

?>

</body>
</html>