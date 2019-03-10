<?php
include ('../../../function.php');

header('Content-Type: text/html; charset=utf-8');

//連接資料庫
$conn = fun_connect2db();
$sql=fun_Search();
//echo $resultContent;

$str = "";
$str = $str . '<thead>
					<tr>
						' . fun_GetAttributes("invoice_record.invoice_id") . '
						' . fun_GetAttributes("invoice_record.cus_id") . '
						' . fun_GetAttributes("customer.cus_name") . '
						' . fun_GetAttributes("customer.identity_number") . '
						' . fun_GetAttributes("invoice_record.invoice_type") . '
						' . fun_GetAttributes("invoice_record.amount") . '
						' . fun_GetAttributes("invoice_record.date") . '
						' . fun_GetAttributes("invoice_record.comment") . '
					</tr>
				</thead>';
				
if ($sql==""){
	$sqlInvoice = "SELECT invoice.* ,customer.cus_name,customer.identity_number
				   FROM `invoice_record` as invoice,`customer` as customer 
				   WHERE invoice.cus_id = customer.cus_id";
}else{
	$sqlInvoice = "SELECT invoice.* ,customer.cus_name,customer.identity_number
				   FROM `invoice_record` as invoice,`customer` as customer 
				   WHERE invoice.cus_id = customer.cus_id AND ".$sql;
}
				
$resultContent = mysqli_query($conn, $sqlInvoice);
if (mysqli_num_rows($resultContent) > 0) {
	$str = $str . '<tbody id="TbodyInfo">';
	while ($row = mysqli_fetch_assoc($resultContent)) {
		$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'invoice_id', $row['invoice_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'cus_id', $row['cus_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_name', $row['cus_name']) . '
							</td>
							<td>
							' . $row['identity_number'] . '
							</td>
							<td>
							' . fun_TextareaTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'invoice_type', $row['invoice_type']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'amount', $row['amount']) . '
							</td>
							<td>
							' . fun_InputTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'date', $row['date'],'','date') . '
							</td>
							<td>
							' . fun_TextareaTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'comment', $row['comment']) . '
							</td>
						</tr>';
		//id="TableName.AttributeName.IdAttributeName.Id"
	}
	$str = $str . '</tbody>';
} else {
	$str = "<span style=\"color:red;\">資料庫查無此資料!!! <br> 請重新搜尋或重新整理</span>";
}
echo $str;
?>