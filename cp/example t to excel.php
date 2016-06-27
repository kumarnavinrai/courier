<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
02	<html xmlns="http://www.w3.org/1999/xhtml">
03	<head>
04	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
05	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
06	<title>BAND Function</title>
07	</head>
08	<style type="text/css">
09	    body {
10	        font-family:Verdana, Arial, Helvetica, sans-serif;
11	        font-size:12px;
12	        margin:0px;
13	        padding:0px;
14	    }
15	    #atd td{
16	        padding:3px;
17	        font-weight:bold;
18	    }
19	    #avg_col{
20	        background-color:#CCFFCC;
21	    }
22	    #ctbl, #ctbl td{
23	        padding:5px;
24	        border: 1px solid black;
25	        border-collapse:collapse;
26	    }
27	</style>
28	<html>
29	<body>
30	<?
31	         
32	             
33	            $table .= '<table border="0" cellpadding="0" cellspacing="0" id="ctbl"><tr><td>';
34	            $table .= '<tr id="atd">';
35	            $table .= '<td rowspan="2" style="background-color:#000099;color:#FFFFFF;">Time</td>';
36	            $table .= '<td colspan="4" style="background-color:#FFFF33">TN</td>';
37	            $table .= '<td colspan="4" style="background-color:#FFFF33">CN</td>';
38	            $table .= '<td rowspan="2" style="background-color:#000099;color:#FFFFFF;padding:0px 5px 0px 5px;">Band<br>Level</td>';
39	            $table .= '</tr>';
40	            $table .= '<tr id="atd">';
41	            $table .= '<td style="background-color:#FFFCCC">OFFERED</td>';
42	            $table .= '<td style="background-color:#FFFCCC">BAND</td>';
43	            $table .= '<td style="background-color:#FFFCCC">RUN TIME</td>';
44	            $table .= '<td style="background-color:#FFFCCC">Abandoned</td>';
45	            $table .= '<td style="background-color:#FFCC99">OFFERED</td>';
46	            $table .= '<td style="background-color:#FFCC99">BAND</td>';
47	            $table .= '<td style="background-color:#FFCC99">RUN TIME</td>';
48	            $table .= '<td style="background-color:#FFCC99">Abandoned</td>';
49	            $table .= '</tr>';
50	            $table .= '<tr>';
51	            $table .= $display;
52	            $table .= '</td></tr></table>';
53	         
54	 
55	        header("Content-type: application/x-msdownload");
56	        # replace excelfile.xls with whatever you want the filename to default to
57	        header("Content-Disposition: attachment; filename=$fn.xls");
58	        header("Pragma: no-cache");
59	        header("Expires: 0");
60	        echo $table;
61	?>
62	</body>
63	</html>