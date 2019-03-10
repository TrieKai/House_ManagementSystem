<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('building', 'building_id', 'building_id', '', '', '房子編號', '', 'textarea').
			  fun_ModalInsertShow('building', 'building_location', 'building_id', '', '', '地址', '', 'textarea').
			  fun_ModalInsertShow('building', 'room_quantity', 'building_id', '', '', '套房數', '', 'textarea').
			  fun_ModalInsertShow('building', 'wait_quantity', 'building_id', '', '', '待租中套房', '', 'textarea').
			  fun_ModalInsertShow('building', 'maintain_quantity', 'building_id', '', '', '整備中套房', '', 'textarea').
			  fun_ModalInsertShow('building', 'rent_quantity', 'building_id', '', '', '已出租套房', '', 'textarea');
			  fun_ModalInsertShow('building', 'car_parking_quantity', 'building_id', '', '', '汽車停車格數', '', 'textarea').
			  fun_ModalInsertShow('building', 'car_empty_parking_quantity', 'building_id', '', '', '汽車空停車格數', '', 'textarea').
			  fun_ModalInsertShow('building', 'motocycle_parking_quantity', 'building_id', '', '', '機車停車格數', '', 'textarea').
			  fun_ModalInsertShow('building', 'motocycle_empty_parking_quantity', 'building_id', '', '', '機車空停車格數', '', 'textarea');
			  fun_ModalInsertShow('building', 'owner', 'building_id', '', '', '擁有者', '', 'textarea');
echo $str;
?>