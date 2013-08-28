<?php 
error_reporting( E_ALL );

$groups = Array();

$pattern = "/(?:\s)*([0-9]*[A-Za-z]*\s*[A-Za-z]+)\s+([0-9]*\s*[A-Za-z]*[^\s])(?:\s)*$/";

$testcases = Array();
$testcases["Street 10"] = Array("Street","10");
$testcases[" Street 10 "] = Array("Street","10");
$testcases["Street 10bis"] = Array("Street","10bis");
$testcases["Street 10 bis"] = Array("Street","10 bis");
$testcases["Street   10  bis"]  = Array("Street","10  bis");
$testcases["3rd street 11"] = Array("3rd street","11");
$testcases["3rd street 11bis"] = Array("3rd street","11bis");
$testcases["3rd street 11 bis"] = Array("3rd street","11 bis");
$testcases[" 3rd   street   11   bis "] = Array("3rd   street","11   bis");

$testcases["Singelstraat 10"] = Array("Singelstraat","10");
$testcases["3e laan 12"] = Array("3e laan","12");
$testcases["Heeregracht 12bis"] = Array("Heeregracht","12bis");;
//$testcases["slagen 7e 10";

echo "<pre>";
foreach( $testcases as $given => $expected ) { 
	preg_match( $pattern, $given, $groups );
	echo( "given: '" . $given ."' \nexpected: \n  ");
	foreach( $expected as $group ) {
		echo "'" . $group . "' ";
	}
	echo "\ngroups:   ";
	for( $i=1; $i<sizeof($groups); $i++ ){
		echo "(" . $groups[$i] . ")";
	}
	echo "\n\n";
}
echo "</pre>";
?>