<?php
include ('../function.php');
include ('Action/Getdata/ObjectLicenseGetdata.php');
$conn = fun_connect2db();
header('Content-Type: text/html; charset=utf-8');
echo fun_getdata($conn);
?>