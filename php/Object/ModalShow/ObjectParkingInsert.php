<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$tip, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('parking', 'parking_id', 'parking_id', '', '', '停車格編號', '', 'textarea').
			  fun_ModalInsertShow('parking', 'building_id', 'parking_id', '', '', '建築編號', '', 'textarea').
			  fun_ModalInsertShow('parking', 'cus_id', 'parking_id', '', '', '房客編號', '', 'textarea').
			  fun_ModalInsertShow('parking', 'license_number', 'parking_id', '', '', '車牌', '', 'textarea').
			  fun_ModalInsertShow('parking', 'parking_location', 'parking_id', '室內.室外', '室內.室外', '', '室內', 'select').
			  fun_ModalInsertShow('parking', 'parking_type', 'parking_id', '汽車.機車', '汽車.機車', '', '汽車', 'select');
echo $str;
?>