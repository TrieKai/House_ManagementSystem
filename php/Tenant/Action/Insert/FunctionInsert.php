<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

//動作更新
$resultContent = fun_Insert();
echo $resultContent;
if ($resultContent) {
	echo "新增成功";
} else {
	echo "新增失敗";
}
?>