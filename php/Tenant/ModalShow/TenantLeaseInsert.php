<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
$str = "";
$t=time();
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$trip, $select,$type)
//fun_LastIdPlusOne($TableName,$IdAttributeName,$Id)
$str = $str . fun_ModalInsertShow('lease', 'lease_id', 'lease_id', '', "". fun_LastIdPlusOne('lease','lease_id',date("Ymd",$t))."", '租約編號', '', 'numeric').
			  fun_ModalInsertShow('lease', 'cus_id', 'lease_id', '', '', '房客編號', '', 'textarea').
			  fun_ModalInsertShow('lease', 'room_id', 'lease_id', '', '', '房間編號', '', 'textarea').
			  fun_ModalInsertShow('lease', 'begin_date', 'lease_id', '', '', '起始日期', '', 'date').
			  fun_ModalInsertShow('lease', 'end_date', 'lease_id', '', '', '結束日期', '', 'date').
			  fun_ModalInsertShow('lease', 'rent', 'lease_id', '', '', '租金', '', 'textarea');
echo $str;
?>