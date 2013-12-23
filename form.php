<?php 
if( isset($_GET['number']) ) 
{
    echo "'" . $_GET['number'] . "'";
    die;
}
?>

<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test of regex</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>

<?php
$actionpath = "http://localhost/testmapp/nlregex/form.php";
echo
    '<form name="SveaAdminCancelOrder" action='. $actionpath . ' method="get">' .
        '<input name="number" />'.
        '<input type="submit" value="Submit" />' .
    '</form>';
?>
</body>
</html>