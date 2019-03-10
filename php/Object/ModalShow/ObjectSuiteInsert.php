<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('room', 'room_id', 'room_id', '', '', '套房編號', '', 'textarea').
			  fun_ModalInsertShow('room', 'building_id', 'room_id', '', '', '建築編號', '', 'textarea').
			  fun_ModalInsertShow('room', 'surface', 'room_id', '', '', '坪數', '', 'textarea').
			  fun_ModalInsertShow('room', 'rent_two_years', 'room_id', '', '', '套房租金(兩年)', '', 'textarea').
			  fun_ModalInsertShow('room', 'rent_one_year', 'room_id', '', '', '套房租金(一年)', '', 'textarea').
			  fun_ModalInsertShow('room', 'rent_half_year', 'room_id', '', '', '套房租金(半年)', '', 'textarea').
			  fun_ModalInsertShow('room', 'rent_three_months', 'room_id', '', '', '套房租金(三個月以下)', '', 'textarea').
			  fun_ModalInsertShow('room', 'room_status', 'room_id', '待租中.整備中.已出租', '待租中.整備中.已出租', '套房狀態', '', 'select').
			  fun_ModalInsertShow('room', 'comment', 'room_id', '', '', '備註', '', 'textarea');
			  
echo $str;
?>