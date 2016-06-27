<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
$file =  "http://localhost/CP/ftnames.txt";//Path to your *.txt file
$contents = file($file);
$string = implode($contents);
echo $string; 
?>

<input type="text" id="tf" name="tf" value="<?php echo $string; ?>" />

<script type="text/javascript">
        
		var whatever = document.getElementById("tf").value;
           
filltext5(whatever);




function filltext5(str)
{

var len = str.length;
var textboxcall=0;
var string="";
var index;
//index = str.indexOf("*");
var x = 0;
var id=0;
var h=15;
 
for(x=0;x<=len;x++)
{

var check = str.charAt(x);
												
		
						if(check == ",")
							{
							
							
							
							
							
							//alert(id);
							//alert(string);
							
							if(id==0)
							{
							alert(id);
							alert(string);
							
							}		
							
							if(id==13)
							{
							alert(id);
							alert(string);
							
							}		
							
							
							if(id==14)
							{
							alert(id);
							alert(string);
							}		
							
							if(id==28)
							{
							alert(id);
							alert(string);
							
							}
							
							
							if(id==41)
							{
							alert(id);
							alert(string);
							
							}		
							
							
							if(id==42)
							{
							alert(id);
							alert(string);
							//id=0;
							}		
							
							if(id==58)
							{
							alert(id);
							alert(string);
							//id=0;
							}
							
							if(id==88)
							{
							alert(id);
							alert(string);
							//id=0;
							}
							
							
							
							
							string="";
							id=id+1;
							
							}
							
							
						


							if(check != "," )
							{
							string += check;
							}

}


}

//*******************************function fill text 5 end



</script>

</body>
</html>