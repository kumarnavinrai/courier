<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
   
       
   
      <?php
   
       
   
       
   
      echo "<table cellspacing='4' cellpadding='4' border=1 align=center>";
   
      echo"<tr>";
   
      echo"<td>Day</td>";
   
      echo"<td>Time</td>";
   
      echo"<td>Unit</td>";
  
      echo"<td>Lecturer</td>";
  
      echo"</tr>";
  
       
  
      echo"</table>";
  
       
  
       
  
       
  
       
      header("Content-type: application/octet-stream");
  
       
  
      # replace excelfile.xls with whatever you want the filename to default to
  
      header("Content-Disposition: attachment; filename=excelfile.xls");
  
      header("Pragma: no-cache");
  
      header("Expires: 0");
  
       
  
       
  
      ?>
      </p>
  
      </body>
  
      </html>

</body>
</html>