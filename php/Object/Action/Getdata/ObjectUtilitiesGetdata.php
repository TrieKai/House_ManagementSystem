<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("bill.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlCustomer = "SELECT * 
					FROM `bill` 
					WHERE 1";
	$resultCustomer = mysqli_query($conn, $sqlCustomer);
	if (mysqli_num_rows($resultCustomer) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultCustomer)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('bill', 'bill_id', $row["bill_id"], 'bill_id', $row['bill_id']) . '
							</td>
							<td>
							' . $row['bill_number'] . '	
							</td>
							<td>
							' . $row['customer_number'] . '	
							</td>
							<td>
								' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'bill_date', $row['bill_date']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'begin_date', $row['begin_date']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('bill', 'bill_id', $row["bill_id"], 'end_date', $row['end_date']) . '
							</td>
							<td>
							' . $row['total_day_amount'] . '	
							</td>
							<td>
							' . $row['total_consumption'] . '	
							</td>
							<td>
							' . $row['total_amount'] . '	
							</td>
							<td>
							' . $row['money_return'] . '	
							</td>
							<td>
							' . $row['average_amount'] . '	
							</td>
							<td>
							' . $row['average_consumption'] . '	
							</td>
						</tr>';
		}
		$str = $str . '</tbody>';
	} else {
		$str = "no data in database";
	}
	return $str;
}
?>