<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";

	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("lease.lease_id") . '
							' . fun_GetAttributes("lease.cus_id") . '
							' . fun_GetAttributes("customer.cus_name") . '
							' . fun_GetAttributes("lease.room_id") . '
							' . fun_GetAttributes("lease.begin_date") . '
							' . fun_GetAttributes("lease.end_date") . '
							' . fun_GetAttributes("lease.rent") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlLease = "SELECT lease.* ,customer.cus_name
				 FROM `lease`as lease, `customer` as customer
				 WHERE lease.cus_id = customer.cus_id";
	$resultLease = mysqli_query($conn, $sqlLease);
	if (mysqli_num_rows($resultLease) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultLease)) {
			$str = $str . '<tr>
								<td>
								' . fun_LableCheckboxTemplate('lease', 'lease_id', $row["lease_id"], 'lease_id', $row['lease_id']) . '
								</td>
								<td>
								' . fun_TextareaTemplate('lease', 'lease_id', $row["lease_id"], 'cus_id', $row['cus_id']) . '
								</td>
								<td>
								' . fun_TextareaTemplate('customer', 'cus_id', $row["cus_id"], 'cus_name', $row['cus_name']) . '
								</td>
								<td>
								' . fun_TextareaTemplate('lease', 'lease_id', $row["lease_id"], 'room_id', $row['room_id']) . '
								</td>
								<td>
								' . fun_InputTemplate('lease', 'lease_id', $row["lease_id"], 'begin_date', $row['begin_date'],'','date') . '
								</td>
								<td>
								' . fun_InputTemplate('lease', 'lease_id', $row["lease_id"], 'end_date', $row['end_date'],'','date') . '
								</td>
								<td>
								' . fun_TextareaTemplate('lease', 'lease_id', $row["lease_id"], 'rent', $row['rent']) . '
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