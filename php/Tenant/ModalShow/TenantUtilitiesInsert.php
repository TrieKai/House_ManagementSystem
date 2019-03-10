<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
$str = "";
$t=time();
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$trip, $select,$type)
//fun_LastIdPlusOne($TableName,$IdAttributeName,$Id)
$str = $str . fun_ModalInsertShow('cus_power_count', 'count_id', 'count_id', '', "". fun_LastIdPlusOne('cus_power_count','count_id',date("Ymd",$t))."", '流水編號', '', 'numeric').
			  fun_ModalInsertShow('cus_power_count', 'room_id', 'lease_id', '', '', '房間編號', '', 'textarea').
			  fun_ModalInsertShow('cus_power_count', 'customer_number', 'lease_id', '', '', '水/電號', '', 'textarea').
			  fun_ModalInsertShow('cus_power_count', 'input_date', 'lease_id', '', '', '紀錄日期', '', 'date').
			  fun_ModalInsertShow('cus_power_count', 'begin_day', 'lease_id', '', '', '起始日期', '', 'date').
			  fun_ModalInsertShow('cus_power_count', 'end_day', 'lease_id', '', '', '結算日期', '', 'date').
			  fun_ModalInsertShow('cus_power_count', 'begin_consumption', 'lease_id', '', '', '起始度數', '', 'textarea').
			  fun_ModalInsertShow('cus_power_count', 'end_consumption', 'lease_id', '', '', '結算度數', '', 'textarea').
			  fun_ModalInsertShow('cus_power_count', 'consumption', 'lease_id', '', '', '使用度數', '', 'textarea').
			  fun_ModalInsertShow('cus_power_count', 'amount', 'lease_id', '', '', '金額', '', 'textarea');
echo $str;
?>