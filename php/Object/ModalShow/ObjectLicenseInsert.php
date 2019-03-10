<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value, $select,$type)
$str = "";
$t=time();
$str = $str . fun_ModalInsertShow('license', 'license_number', 'license_number', '', '', '車牌', '', 'textarea').
			  fun_ModalInsertShow('license', 'cus_id', 'license_number', '', '', '房客編號', '', 'textarea').
			  fun_ModalInsertShow('license','license_type','license_number', "汽車.機車", "汽車.機車",'', "汽車",'select').
			  fun_ModalInsertShow('license', 'manufacturers', 'license_number', '', '', '車種', '', 'textarea').
			  fun_ModalInsertShow('license', 'type', 'license_number', '', '', '車型', '', 'textarea').
			  fun_ModalInsertShow('license', 'color', 'license_number', '', '', '顏色', '', 'textarea');
echo $str;
?>