<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('room_equipment', 'room_id', 'roomEqu_id', '', '', '套房編號', '', 'textarea').
						  fun_ModalInsertShow('room_equipment', 'equipment_id', 'roomEqu_id', '', '', '設備編號', '', 'textarea').
						  fun_ModalInsertShow('room_equipment', 'equipment_quantity', 'roomEqu_id', '', '', '數量', '', 'textarea');
echo $str;
?>