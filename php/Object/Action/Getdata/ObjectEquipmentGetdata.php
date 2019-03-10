<?php
function fun_getdata($conn) {

	header('Content-Type: text/html; charset=utf-8');
	
	$str = "";
	$str = $str . '<thead>
						<tr>
							' . fun_GetAttributes("room_equipment.room_id") . '
							' . fun_GetAttributes("room_equipment.equipment_id") . '
							' . fun_GetAttributes("room_equipment.equipment_quantity") . '
						</tr>
					</thead>';
	
//	$classCode = $_POST['class'];
	$sqlRoomEquipment = "SELECT roomEquipment.*,equipment.equipment_name 
						 FROM `room_equipment` as roomEquipment , `equipment` as equipment 
						 WHERE roomEquipment.equipment_id = equipment.equipment_id";
	$resultRoomEquipment = mysqli_query($conn, $sqlRoomEquipment);
	if (mysqli_num_rows($resultRoomEquipment) > 0) {
		$str = $str . '<tbody id="TbodyInfo">';
		while ($row = mysqli_fetch_assoc($resultRoomEquipment)) {
			$str = $str . '<tr>
							<td>
							' . fun_LableCheckboxTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'room_id', $row['room_id']) . '
							</td>
							<td>
							' . fun_TextareaTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'equipment_id', $row['equipment_id']) . '
								<br>
								' . $row["equipment_name"] . '
							</td>
							<td>
							' . fun_TextareaTemplate('room_equipment', 'roomEqu_id', $row["roomEqu_id"], 'equipment_quantity', $row['equipment_quantity']) . '
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