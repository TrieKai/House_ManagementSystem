<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";

	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("customer.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlCustomer = "SELECT * 
					FROM `customer` 
					WHERE 1";
	$resultCustomer = mysqli_query($conn, $sqlCustomer);
	if (mysqli_num_rows($resultCustomer) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultCustomer)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('customer', 'cus_id', $row["cus_id"], 'cus_id', $row['cus_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_name', $row['cus_name']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'nationality', $row['nationality']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'identity_number', $row['identity_number']) . '
							</td>
							<td>
							' . fun_InputTemplate('customer', 'cus_id', $row["cus_id"], 'birth_date', $row['birth_date'],'','date') . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'permanent_address', $row['permanent_address']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_phone', $row['cus_phone']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'profession', $row['profession']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'work_place', $row['work_place']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'emergency_people', $row['emergency_people']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'emergency_phone', $row['emergency_phone']) . '
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