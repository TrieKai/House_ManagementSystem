<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("equipment.") . '
						</tr>
					</thead>';

//	$classCode = $_POST['class'];
	$sqlEquipmentStore = "SELECT * 
						  FROM `equipment` 
						  WHERE 1";
	$resultEquipmentStore = mysqli_query($conn, $sqlEquipmentStore);
	if (mysqli_num_rows($resultEquipmentStore) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultEquipmentStore)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_id', $row['equipment_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'building_id', $row['building_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_name', $row['equipment_name']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'manufacturers', $row['manufacturers']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_type', $row['equipment_type']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_price', $row['equipment_price']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment', 'equipment_id', $row["equipment_id"], 'equipment_quantity', $row['equipment_quantity']) . '
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