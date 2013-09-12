<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test of regex</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
<?php 
/** 
 * regex for handling NL address examples
 * Kristian Madsen, kristian.madsen@sveaekonomi.se
 * 
 */

error_reporting( E_ALL );

$groups = Array();

// split address into 2 groups, matching from start/end
$pattern = "/^(?:\s)*([0-9]*[A-ZÄÅÆÖØÜßäåæöøüa-z]*\s*[A-ZÄÅÆÖØÜßäåæöøüa-z]+)(?:\s*)([0-9]*\s*[A-ZÄÅÆÖØÜßäåæöøüa-z]*[^\s])?(?:\s)*$/";
//$pattern = "/^(?:\s)*([0-9]*\p{L}*\s*\p{L}+)(?:\s*)([0-9]*\s*\p{L}*[^\s])?(?:\s)*$/";     //if unicode support

// leaves multiple spaces within addresses intact for now

$testcases = Array();

// testcases$
$testcases["Street"] = Array("Street");
$testcases["Street 10"] = Array("Street","10");
$testcases[" Street 10 "] = Array("Street","10");
$testcases["Street 10bis"] = Array("Street","10bis");
$testcases["Street 10 bis"] = Array("Street","10 bis");
$testcases["Street   10  bis"]  = Array("Street","10  bis");
$testcases["3rd street 11"] = Array("3rd street","11");
$testcases["3rd street 11bis"] = Array("3rd street","11bis");
$testcases["3rd street 11 bis"] = Array("3rd street","11 bis");
$testcases[" 3rd   street   11   bis "] = Array("3rd   street","11   bis");

// examples given by getzenned.nl
$testcases["Singelstraat 10"] = Array("Singelstraat","10");
$testcases["3e laan 12"] = Array("3e laan","12");
$testcases["Heeregracht 12bis"] = Array("Heeregracht","12bis");;
//$testcases["slagen 7e 10" not matched, should be ok though, as never seen yet

// international characters
$testcases["Önskevägen 10"] = Array("Önskevägen","10");
$testcases["Ålandshav 10å"] = Array("Ålandshav","10å");
$testcases["Åväg änna 10"] = Array("Åväg änna","10");
$testcases["ÄÅÖåäöÜü"] = Array("ÄÅÖåäöÜü");
$testcases["ÄÅÆÖØÜßäåæöøü 10"] = Array("ÄÅÆÖØÜßäåæöøü","10");

$show_all = false;

echo "<pre>";
foreach( $testcases as $given => $expected ) { 
	preg_match( $pattern, $given, $groups );
	echo( "given: \n  '" . $given ."' \nexpected: \n  ");
	foreach( $expected as $group ) {
		echo "'" . $group . "' ";
	}
	echo "\ngroups: \n  ";
	for( $i = ($show_all ?0:1); $i<sizeof($groups); $i++ ){
		echo "(" . $groups[$i] . ") ";
	}
	echo "\n\n";
}
echo "</pre>";
?>
</body>
</html>