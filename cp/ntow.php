<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
/** Serialized Array of big names, thousand, million, etc
* @package NumberToText */
define("N2T_BIG", serialize(array('thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'unvigintillion', 'duovigintillion', 'trevigintillion', 'quattuorvigintillion', 'quinvigintillion', 'sexvigintillion', 'septenvigintillion', 'octovigintillion', 'novemvigintillion', 'trigintillion', 'untrigintillion', 'duotrigintillion', 'tretrigintillion', 'quattuortrigintillion', 'quintrigintillion', 'sextrigintillion', 'septentrigintillion', 'octotrigintillion', 'novemtrigintillion')));
/** Serialized Array of medium names, twenty, thirty, etc
* @package NumberToText */
define("N2T_MEDIUM", serialize(array(2=>'twenty', 3=>'thirty', 4=>'fourty', 5=>'fifty', 6=>'sixty', 7=>'seventy', 8=>'eighty', 9=>'ninety')));
/** Serialized Array of small names, zero, one, etc.. up to eighteen, nineteen
* @package NumberToText */
define("N2T_SMALL", serialize(array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen')));
/** Word for "dollars"
* @package NumberToText */
define("N2T_DOLLARS", "dollars");
/** Word for one "dollar"
* @package NumberToText */
define("N2T_DOLLARS_ONE", "dollar");
/** Word for "cents"
* @package NumberToText */
define("N2T_CENTS", "cents");
/** Word for one "cent"
* @package NumberToText */
define("N2T_CENTS_ONE", "cent");
/** Word for "and"
* @package NumberToText */
define("N2T_AND", "and");
/** Word for "negative"
* @package NumberToText */
define("N2T_NEGATIVE", "negative");

/** Number to text converter. Converts a number into a textual description, such as
* “one hundred thousand and twenty-five”.
*
* Now supports _any_ size number, and negative numbers. To pass numbers > 2 ^32, you must
* pass them as a string, as PHP only has 32-bit integers.
*
* @author Greg MacLelan
* @version 1.1
* @param int $number The number to convert
* @param bool $currency True to convert as a dollar amount
* @param bool $capatalize True to capatalize every word (except “and”)
* @param bool $and True to use “and” (ie. “one hundred AND six”)
* @return The textual description of the number, as a string.
* @package NumberToText
*/
/** Changelog:
* 2007-01-11: Fixed bug with invalid array references, trim() output
*/
function NumberToText($number, $currency = false, $capatalize = false, $and = true) {
$big = unserialize(N2T_BIG);
$small = unserialize(N2T_SMALL);

// get rid of leading 0′s
/*
while ($number{0} == 0) {
$number = substr($number,1);
}
*/

$text = "";

//$negative = ($number count($big) – 1) {
// ran out of names for numbers this big, call recursively
$text = NumberToText($int, false, false, $and)." ".$big[$section-1]." ".$text;
$int = 0;
} 
else {
// we can handle it

$convert = substr($int, -3); // grab the last 3 digits
$int = substr($int, 0, -1 * strlen($convert));

if ($convert > 0) {
// we have something here, put it in
$text = trim(n2t_convertthree($convert, $and, ($int > 0)).(isset($big[$section-1]) ? ‘ ‘.$big[$section-1].’ ‘ : ”).$text);
}
}

$section++;
} while ($int > 0);

// conversion for decimal part:

if ($currency && floor($number)) {
// add ” dollars”
$text .= ” “.($int_o == 1 ? N2T_DOLLARS_ONE : N2T_DOLLARS)." ";
}

if ($decimal && $currency) {
// if we have any cents, add those
if ($int_o > 0) {
$text .= ” “.N2T_AND.” “;
}

$cents = substr($decimal,0,2); // (0.)2342 -> 23
$decimal = substr($decimal,2); // (0.)2345.. -> 45..

$text .= n2t_convertthree($cents, false, true); // explicitly show “and” if there was an $int
}

if ($decimal) {
// any remaining decimals (whether or not $currency is set)
$text .= ” point”;
for ($i = 0; $i one thousand AND one)
* @return The textual description of the number, as a string
* @package NumberToText
*/
function n2t_convertthree($number, $and, $preceding) {
$small = unserialize(N2T_SMALL);
$medium = unserialize(N2T_MEDIUM);

$text = “”;

if ($hundreds = floor($number / 100)) {
// we have 100′s place
$text .= $small[$hundreds].” hundred “;
}
$tens = $number % 100;
if ($tens) {
// we still have values
if ($and && ($hundreds || $preceding)) {
$text .= ” “.N2T_AND.” “;
}

if ($tens < 20) {
$text .= $small[$tens];
} else {
$text .= $medium[floor($tens/10)];
if ($ones = $tens % 10) {
$text .= “-”.$small[$ones];
}
}
}

return $text;
}

$num = 10000000000;
echo $num.’—-’.numbertotext($num, 1, 1, ”)
?>


</>
</html>