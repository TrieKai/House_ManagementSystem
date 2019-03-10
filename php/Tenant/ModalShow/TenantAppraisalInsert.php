<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
$str = "";
$t=time();
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$trip, $select,$type)
//fun_LastIdPlusOne($TableName,$IdAttributeName,$Id)
$str = $str . fun_ModalInsertShow('score', 'cus_scale_id', 'cus_scale_id', '', "". fun_LastIdPlusOne('score', 'cus_scale_id', date("Ymd",$t)) ."", '評分表編號', '', 'numeric').
			  fun_ModalInsertShow('score', 'cus_id', 'cus_scale_id', '', '', '房客編號', '', 'textarea');
echo $str;
?>