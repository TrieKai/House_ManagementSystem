<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

$classCode = $_POST['class'];
//動作更新
$resultContent = fun_Update('Object\Action\Getdata\ObjectMaintainGetdata.php');

if ($resultContent) {
} else {
	echo "update failed";
}
?>