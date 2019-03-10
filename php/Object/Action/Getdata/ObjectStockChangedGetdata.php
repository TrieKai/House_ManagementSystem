<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');

	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("equipment_change.") . '
						</tr>
					</thead>';
					
//	$classCode = $_POST['class'];
	$sqlEquipmentChange = "SELECT equipmentChange.* ,equipmentStore.equipment_name 
						   FROM `equipment_change` as equipmentChange ,`equipment` as equipmentStore 
						   WHERE equipmentChange.equipment_id = equipmentStore.equipment_id";
	$resultEquipmentChange = mysqli_query($conn, $sqlEquipmentChange);
	if (mysqli_num_rows($resultEquipmentChange) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultEquipmentChange)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('equipment_change', 'change_id', $row["change_id"], 'change_id', $row['change_id']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'equipment_id', $row['equipment_id']) . '
								<br>
								' . $row['equipment_name'] . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'building_id', $row['building_id']) . '
							</td>
							<td>
								' . fun_SelectTemplate('equipment_change', 'change_id', $row["change_id"], 'action', "採購.維修.報廢", "採購.維修.報廢", $row['action']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'reason', $row['reason']) . '
							</td>
							<td>
								' . fun_TextareaTemplate('equipment_change', 'change_id', $row["change_id"], 'equipment_quantity', $row['equipment_quantity']) . '
							</td>
							<td>
								' . fun_InputTemplate('equipment_change', 'change_id', $row["change_id"], 'date', $row['date'],'','date') . '
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