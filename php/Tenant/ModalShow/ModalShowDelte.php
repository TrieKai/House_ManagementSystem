<?php
include ('../../function.php');

header('Content-Type: text/html; charset=utf-8');

//動作更新
$resultContent = fun_Delete();

if ($resultContent) {
//	echo $resultContent;
	echo $resultContent["id"];
	echo "<span style=\"color:red;\">請確認是否刪除</span>";
} else {
	echo "<span style=\"color:red;\">編號抓取失敗</span>";
}