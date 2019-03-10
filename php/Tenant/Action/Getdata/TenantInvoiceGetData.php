<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

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

//	$classCode = $_POST['class'];
	$sqlInvoiceRecord = "SELECT invoice.* ,customer.cus_name,customer.identity_number
						 FROM `invoice_record` as invoice,`customer` as customer 
						 WHERE invoice.cus_id = customer.cus_id";
	$resultInvoiceRecord = mysqli_query($conn, $sqlInvoiceRecord);
	if (mysqli_num_rows($resultInvoiceRecord) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultInvoiceRecord)) {
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
								' . fun_SelectTemplate('invoice_record', 'invoice_id', $row["invoice_id"], 'invoice_type', "二聯.三聯", "二聯.三聯", $row['invoice_type']) . '
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
		$str = "no data in database";
	}
	return $str;
}
?>