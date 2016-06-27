<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
  <label for="try"></label>
  <select name="try" id="try">
    <option value="aaaa" selected="selected">a</option>
    <option value="bbbbb">b</option>
    <option value="cccccc">c</option>
    <option value="ddddddd">d</option>
  </select>
</form>
<input type="button" id="jj" onclick="gg()"/>

<script type="text/javascript">
function gg()
{
alert(document.getElementById("try").selectedIndex);

document.getElementById("try").selectedIndex=3;


alert(document.getElementById("try").selectedIndex);


}
</script>

</body>
</html>