<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  
      <script type="text/javascript">
	  var a=12;
	 
	 var b= DigitsToWords(a);
  
  alert(b);
      var SingleDigits = new Array("Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen");
  
      var DoubleDigits = new Array("Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety");
  
       
  
      function DigitsToWords(Digits)
  
      {
  
     
	  alert(Digits);
	          var Words = "";
  
              var St;
  
              if (Digits > 999)
  
              {
  
                      return "The number exceeds 999.";
  
              }
  
              if (Digits == 0)
  
              {
  
                      return SingleDigits[0];
  
              }
  
              for (var i = 9; i >= 1; i--)
  
              {
  
                      if (Digits >= i * 100)
  
                      {
  
                              Words += SingleDigits[i];
  
                              St = 1;
  
                              Words += " hundred";
  
                              if (Digits != i * 100) Words += " and ";
  
                              {
  
                                      Digits -= i*100;
  
                              }
  
                              i=0;
  
                      }
  
              }
  
             
  
              for (var i = 9; i >= 2; i--)
  
              {
  
                      if (Digits >= i * 10)
  
                      {
  
                              Words += (St?DoubleDigits[i-2].toLowerCase():DoubleDigits[i-2]);
  
                              St = 1;
  
                              if (Digits != i * 10) Words += "-";
  
                              {
  
                                      Digits -= i*10;
  
                              }
  
                              i=0;
  
                      }
  
              }
  
             
  
              for (var i = 1; i < 20; i++)
  
              {
  
                      if (Digits == i)
  
                      {
  
                              Words += (St?SingleDigits[i].toLowerCase():SingleDigits[i]);
  
                      }
  
              }
  
              return Words;
  
      }
  
       
  
      alert("Are you over " + DigitsToWords(21) + "?");
  
      </script>
</body>
</html>