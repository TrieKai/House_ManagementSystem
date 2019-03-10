<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('equipment_change', 'change_id', 'change_id', '', '', '更動編號', '', 'textarea').
			  fun_ModalInsertShow('equipment_change', 'equipment_id', 'change_id', '', '', '設備代碼', '', 'textarea').
			  fun_ModalInsertShow('equipment_change', 'building_id', 'change_id', '', '', '建築編號', '', 'textarea').
			  fun_ModalInsertShow('equipment_change', 'action', 'change_id', '採購.維修.報廢', '採購.維修.報廢', '動作', '', 'select').
			  fun_ModalInsertShow('equipment_change', 'reason', 'change_id', '', '', '原因', '', 'textarea').
			  fun_ModalInsertShow('equipment_change', 'equipment_quantity', 'change_id', '', '', '數量', '', 'textarea').
			  fun_ModalInsertShow('equipment_change', 'date', 'change_id', '', '', '日期', '', 'date');
			  
echo $str;
?>