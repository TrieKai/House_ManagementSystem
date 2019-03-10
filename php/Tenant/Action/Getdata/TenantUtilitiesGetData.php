<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";

	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("cus_power_count.count_id") . '
							' . fun_GetAttributes("cus_power_count.room_id") . '
							' . fun_GetAttributes("cus_power_count.customer_number") . '
							' . fun_GetAttributes("power_number.type") . '
							' . fun_GetAttributes("cus_power_count.input_date") . '
							' . fun_GetAttributes("cus_power_count.begin_day") . '
							' . fun_GetAttributes("cus_power_count.end_day") . '
							' . fun_GetAttributes("cus_power_count.begin_consumption") . '
							' . fun_GetAttributes("cus_power_count.end_consumption") . '
							' . fun_GetAttributes("cus_power_count.consumption") . '
							' . fun_GetAttributes("cus_power_count.amount") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlCusPowerCount = "SELECT cus_power_count.*,power_number.type,power_number.consumption_price 
						 FROM `power_number` as power_number, `cus_power_count` as cus_power_count 
						 WHERE power_number.customer_number = cus_power_count.customer_number";
	$resultCusPowerCount = mysqli_query($conn, $sqlCusPowerCount);
	if (mysqli_num_rows($resultCusPowerCount) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultCusPowerCount)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('cus_power_count', 'count_id', $row["count_id"], 'count_id', $row['count_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], 'room_id', $row['room_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], 'customer_number', $row['customer_number']) . '
							</td>
							<td>
								' . $row['type'] . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], 'input_date', $row['input_date']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], '	begin_day', $row['begin_day']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], '	end_day', $row['end_day']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], '	begin_consumption', $row['begin_consumption']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], '	end_consumption', $row['end_consumption']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], '	consumption', $row['consumption']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('cus_power_count', 'count_id', $row["count_id"], 'amount', $row['amount']) . '
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