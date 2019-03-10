<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('maintain_record', 'maintain_id', 'maintain_id', '', '', '維修編號', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'room_id', 'maintain_id', '', '', '房間編號', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_date', 'maintain_id', '', '', '維修日期', '', 'date').
						  fun_ModalInsertShow('maintain_record', 'maintain_item', 'maintain_id', '', '', '維修項目', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_reason', 'maintain_id', '', '', '維修原因', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_method', 'maintain_id', '', '', '維修方法', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_amount', 'maintain_id', '', '', '維修金額', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_unit', 'maintain_id', '', '', '維修廠商/人員', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'maintain_phone', 'maintain_id', '', '', '維修廠商/人員電話', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'tracking', 'maintain_id', '', '', '後續追蹤', '', 'textarea').
						  fun_ModalInsertShow('maintain_record', 'comment', 'maintain_id', '', '', '備註', '', 'textarea');
echo $str;
?>