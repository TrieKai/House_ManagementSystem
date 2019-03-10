<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

//動作更新
$resultContent = fun_Delete();

if ($resultContent) {
	echo $resultContent["id"];
	echo "刪除成功";
} else {
	echo "刪除失敗";
}
?>