<?php
//引用function
include ('../../function.php');
$classCode = $_POST['class'];
$str = "";
$t=time();
//fun_ModalInsertShow($TableName,$AttributeName,$IdAttributeName, $item, $value,$trip, $select,$type)
//fun_LastIdPlusOne($TableName,$IdAttributeName,$Id)
$str = $str . fun_ModalInsertShow('invoice_record', 'invoice_id', 'invoice_id', '', '', '發票編號', '', 'textarea').
			  fun_ModalInsertShow('invoice_record', 'cus_id', 'invoice_id', '', '', '客戶編號', '', 'textarea').
			  fun_ModalInsertShow('invoice_record', 'invoice_type', 'invoice_id', '二聯.三聯', '二聯.三聯', '發票種類', '', 'select').
			  fun_ModalInsertShow('invoice_record', 'amount', 'invoice_id', '', '', '金額', '', 'textarea').
			  fun_ModalInsertShow('invoice_record', 'date', 'invoice_id', '', '', '日期', '', 'date').
			  fun_ModalInsertShow('invoice_record', 'comment', 'invoice_id', '', '', '備註', '', 'textarea');
echo $str;
?>