<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('equipment', 'equipment_id', 'equipment_id', '', '', '設備代號', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'building_id', 'equipment_id', '', '', '建築編號', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'equipment_name', 'equipment_id', '', '', '設備名稱', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'manufacturers', 'equipment_id', '', '', '設備廠商', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'equipment_type', 'equipment_id', '', '', '設備規格', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'equipment_price', 'equipment_id', '', '', '設備單價', '', 'textarea').
			  fun_ModalInsertShow('equipment', 'equipment_quantity', 'equipment_id', '', '', '設備數量', '', 'textarea');
echo $str;
?>