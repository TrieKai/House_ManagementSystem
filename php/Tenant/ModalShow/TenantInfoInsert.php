<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
$str = "";
$t=time();
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$trip, $select,$type)
//fun_LastIdPlusOne($TableName,$IdAttributeName,$Id)
$str = $str . fun_ModalInsertShow('customer', 'cus_id', 'cus_id', '', "". fun_LastIdPlusOne('customer','cus_id',date("Ymd",$t))."", '2016013001', '', 'numeric').
						  fun_ModalInsertShow('customer', 'cus_name', 'cus_id', '', '', '王大明', '', 'textarea').
						  fun_ModalInsertShow('customer', 'nationality', 'cus_id', '', '', '台灣', '', 'textarea').
						  fun_ModalInsertShow('customer', 'identity_number', 'cus_id', '', '', 'A123456789', '', 'textarea').
						  fun_ModalInsertShow('customer', 'birth_date', 'cus_id', '', '', 'today', '', 'date').
						  fun_ModalInsertShow('customer', 'permanent_address', 'cus_id', '', '', 'XX縣XX區XXXXXX', '', 'textarea').
						  fun_ModalInsertShow('customer', 'cus_phone', 'cus_id', '', '', '09XXXXXXX', '', 'textarea').
						  fun_ModalInsertShow('customer', 'profession', 'cus_id', '', '', '工程師', '', 'textarea').
						  fun_ModalInsertShow('customer', 'work_place', 'cus_id', '', '', '美光', '', 'textarea').
						  fun_ModalInsertShow('customer', 'emergency_people', 'cus_id', '', '', '王添財', '', 'textarea').
						  fun_ModalInsertShow('customer', 'emergency_phone', 'cus_id', '', '', '09XXXXXXX', '', 'textarea');
echo $str;
?>