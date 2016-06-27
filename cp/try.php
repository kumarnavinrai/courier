<html>
<head>
<title>Export to excel in php</title>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>
<style type="text/css">
.myClass
{
font-family:verdana;
font-size:11px;
}
</style>
</head>
<body>
<form action="exporttoexcel.php" method="post" 
onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
  <table id="ReportTable" width="600" cellpadding="2" cellspacing="2" class="myClass">
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Country</th>
    </tr>
    <tr>
      <td><center>
          Adeel
        </center></td>
      <td><center>
          Fakhar
        </center></td>
      <td><center>
          Pakistan
        </center></td>
    </tr>
    <tr>
      <td><center>
          Zeeshan
        </center></td>
      <td><center>
          Butter
        </center></td>
      <td><center>
          England
        </center></td>
    </tr>
    <tr>
      <td><center>
          Neil
        </center></td>
      <td><center>
          Johnson
        </center></td>
      <td><center>
          United Kingdom
        </center></td>
    </tr>
    <tr>
      <td><center>
          Diala
        </center></td>
      <td><center>
          Katherine
        </center></td>
      <td><center>
          America
        </center></td>
    </tr>
  </table>
  <table width="600px" cellpadding="2" cellspacing="2" border="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><input type="hidden" id="datatodisplay" name="datatodisplay">
        <input type="submit" value="Export to Excel">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
