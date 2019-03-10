<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$tip, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('power_number', 'customer_number', 'customer_number', '', '', '水/電號', '', 'textarea').
			  fun_ModalInsertShow('power_number', 'building_id', 'customer_number', '', '', '建築編號', '', 'textarea').
			  fun_ModalInsertShow('power_number', 'type', 'customer_number', '水錶.電錶', '水錶.電錶', '種類', '', 'select').
			  fun_ModalInsertShow('power_number', 'consumption_price', 'customer_number', '', '', '', '每度單價', 'textarea');
echo $str;
?>