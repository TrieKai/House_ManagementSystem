<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('bill', 'bill_id', 'bill_id', '', '', '帳單流水編號', '', 'textarea').
						  fun_ModalInsertShow('bill', 'bill_number', 'bill_id', '', '', '帳單編號', '', 'textarea').
						  fun_ModalInsertShow('bill', 'customer_number', 'bill_id', '', '', '水電號', '', 'textarea').
						  fun_ModalInsertShow('bill', 'bill_date', 'bill_id', '', '', '帳單日期', '', 'date').
						  fun_ModalInsertShow('bill', 'begin_date', 'bill_id', '', '', '起始日期', '', 'date').
						  fun_ModalInsertShow('bill', 'end_date', 'bill_id', '', '', '結算日期', '', 'date').
						  fun_ModalInsertShow('bill', 'total_day_amount', 'bill_id', '', '', '總日數', '', 'textarea').
						  fun_ModalInsertShow('bill', 'total_consumption', 'bill_id', '', '', '總度數', '', 'textarea').
						  fun_ModalInsertShow('bill', 'total_amount', 'bill_id', '', '', '金額', '', 'textarea').
						  fun_ModalInsertShow('bill', 'money_return', 'bill_id', '', '', '回收金額', '', 'textarea').
						  fun_ModalInsertShow('bill', 'average_amount', 'bill_id', '', '', '平均每度金額', '', 'textarea').
						  fun_ModalInsertShow('bill', 'average_consumption', 'bill_id', '', '', '平均度數', '', 'textarea');
echo $str;
?>