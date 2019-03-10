<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("power_number.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlPowerNumber = "SELECT * 
					FROM `power_number` 
					WHERE 1";
	$sqlPowerNumber = mysqli_query($conn, $sqlPowerNumber);
	if (mysqli_num_rows($sqlPowerNumber) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($sqlPowerNumber)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('power_number', 'customer_number', $row["customer_number"], 'customer_number', $row['customer_number']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('power_number', 'customer_number', $row["customer_number"], 'building_id', $row['building_id']) . '
							</td>
							<td>
								' . fun_SelectTemplate('power_number', 'customer_number', $row["customer_number"], 'type', "水錶.電錶", "水錶.電錶", $row['type']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('power_number', 'customer_number', $row["customer_number"], 'consumption_price', $row['consumption_price']) . '
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